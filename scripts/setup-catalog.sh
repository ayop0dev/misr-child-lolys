#!/usr/bin/env bash
# ==============================================================================
# setup-catalog.sh
#
# Idempotent catalog setup for Loly's Glam (English / LTR):
#   1. Creates product categories if missing:
#      - Strawberry Sticks (strawberry-sticks)
#      - Vanilla Vibes (vanilla-vibes)
#      - Naughty Nights (naughty-nights)
#   2. Assigns each kit and its 6 minis to the respective category (keeps existing categories)
#   3. Sets Sugar Rush (product 197) catalog visibility to hidden
#
# Safe to run multiple times. Prints all actions and status.
# ==============================================================================

set -euo pipefail

# Ensure MySQL is in PATH on Windows environments if present
if [ -d "D:/laragon/bin/mysql/mysql-8.4.3-winx64/bin" ]; then
    export PATH="D:/laragon/bin/mysql/mysql-8.4.3-winx64/bin:$PATH"
fi

# Detect WP-CLI command
if command -v wp >/dev/null 2>&1; then
    WP_CMD="wp"
elif [ -f "/d/wp-cli/wp-cli.phar" ]; then
    WP_CMD="php /d/wp-cli/wp-cli.phar"
elif [ -f "D:/wp-cli/wp.bat" ]; then
    WP_CMD="D:/wp-cli/wp.bat"
else
    WP_CMD="wp"
fi

# Parse --path argument or fallback to local path / current directory
WP_PATH=""
for arg in "$@"; do
    case "$arg" in
        --path=*)
            WP_PATH="${arg#*=}"
            ;;
    esac
done

if [ -z "$WP_PATH" ]; then
    if [ -d "D:/Projects/WordPress/Lolys" ]; then
        WP_PATH="D:/Projects/WordPress/Lolys"
    elif [ -f "wp-config.php" ]; then
        WP_PATH="."
    elif [ -f "../wp-config.php" ]; then
        WP_PATH=".."
    fi
fi

WP_ARGS=()
if [ -n "$WP_PATH" ]; then
    WP_ARGS+=(--path="$WP_PATH")
fi

echo "=========================================================="
echo "Starting catalog setup for Loly's Glam"
echo "Target WordPress path: ${WP_PATH:-current directory}"
echo "=========================================================="

ensure_category() {
    local name="$1"
    local slug="$2"

    if $WP_CMD "${WP_ARGS[@]}" term get product_cat "$slug" --by=slug >/dev/null 2>&1; then
        echo "[EXISTS] Category '$name' (slug: $slug) already exists."
    else
        $WP_CMD "${WP_ARGS[@]}" term create product_cat "$name" --slug="$slug"
        echo "[CREATED] Category '$name' (slug: $slug)."
    fi
}

assign_product() {
    local product_id="$1"
    local cat_slug="$2"

    # Check if category already assigned to product
    local current_terms
    current_terms=$($WP_CMD "${WP_ARGS[@]}" post term list "$product_id" product_cat --field=slug 2>/dev/null || echo "")

    if echo "$current_terms" | grep -qw "$cat_slug"; then
        echo "[UNCHANGED] Product $product_id is already in category '$cat_slug'."
    else
        $WP_CMD "${WP_ARGS[@]}" post term add "$product_id" product_cat "$cat_slug" --by=slug >/dev/null
        echo "[ASSIGNED] Product $product_id added to category '$cat_slug'."
    fi
}

echo ""
echo "--- Step 1: Ensuring product categories exist ---"
ensure_category "Strawberry Sticks" "strawberry-sticks"
ensure_category "Vanilla Vibes" "vanilla-vibes"
ensure_category "Naughty Nights" "naughty-nights"

echo ""
echo "--- Step 2: Assigning products to categories ---"
# Strawberry Sticks: kit 75 + minis: 191, 192, 194, 193, 196, 195
echo "Strawberry Sticks products:"
for pid in 75 191 192 194 193 196 195; do
    assign_product "$pid" "strawberry-sticks"
done

# Vanilla Vibes: kit 76 + minis: 188, 189, 190, 187, 185, 186
echo ""
echo "Vanilla Vibes products:"
for pid in 76 188 189 190 187 185 186; do
    assign_product "$pid" "vanilla-vibes"
done

# Naughty Nights: kit 73 + minis: 183, 182, 177, 178, 184, 180
echo ""
echo "Naughty Nights products:"
for pid in 73 183 182 177 178 184 180; do
    assign_product "$pid" "naughty-nights"
done

echo ""
echo "--- Step 3: Setting Sugar Rush (197) catalog visibility to hidden ---"
SUGAR_RUSH_ID=197
CURRENT_VISIBILITY=$($WP_CMD "${WP_ARGS[@]}" eval '$p = wc_get_product(197); echo $p ? $p->get_catalog_visibility() : "not_found";')

if [ "$CURRENT_VISIBILITY" = "hidden" ]; then
    echo "[UNCHANGED] Sugar Rush ($SUGAR_RUSH_ID) catalog visibility is already hidden."
else
    $WP_CMD "${WP_ARGS[@]}" eval '$p = wc_get_product(197); if ($p) { $p->set_catalog_visibility("hidden"); $p->save(); }'
    echo "[UPDATED] Sugar Rush ($SUGAR_RUSH_ID) catalog visibility set to hidden (was: $CURRENT_VISIBILITY)."
fi

echo ""
echo "=========================================================="
echo "Catalog setup completed successfully."
echo "=========================================================="
