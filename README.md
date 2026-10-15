# Misr Child (Loly's): Store Layer for Loly's Glam

Store layer (child theme of Egstore) for **Loly's Glam** (`lolys.test` / `lolys.otour.store`).

## Brand & Store Overview
- **Brand**: Loly's Glam — *"Scents that bring you compliments"*
- **Products**: Pocket-sized 10 ml miniature perfume oils, formulated in Egypt using imported French fragrance oils. Long-lasting, cruelty-free, portable luxury.
- **DNA Concept**: A day told in three fragrance moods, light to dark:
  - **Fresh & Playful**: *Strawberry Sticks* (Kit 75, 650 EGP) — Playful, juicy berries, candy florals, sunny days and brunch dates.
  - **Warm & Cozy**: *Vanilla Vibes* (Kit 76, 650 EGP) — Cozy, creamy vanilla, powdery florals, soft amber and musk.
  - **Bold & Mysterious**: *Naughty Nights* (Kit 73, 650 EGP, Best Seller) — Bold, mysterious, fruity warmth over deep woods and vanilla, up to 12 hours wear.
  - **Finale**: *Loly's Full Kit* (Kit 74, 1,650 EGP) — All three moods, 18 minis total, free express shipping.

## Confirmed Promises
Only these confirmed facts and promises are stated on the storefront:
1. **Cash on Delivery & Vodafone Cash**: Safe payment upon delivery or via Vodafone Cash mobile wallet.
2. **Delivery in 1–3 Business Days**: Direct delivery across Egypt within 1 to 3 business days.
3. **Free Shipping strictly on Loly's Full Kit**: Free shipping is automatically applied whenever the cart contains Loly's Full Kit (product 74). Single discovery kits have standard shipping.
4. **10 ml Minis**: Travel-sized, pocket-friendly, long-lasting formulation, made in Egypt with imported French fragrance oils, cruelty-free.
5. **Night Kit Longevity**: "Up to 12 hours" wear claim is exclusive to Naughty Nights.
6. **Catalog Cleanliness**: Product 197 (*Sugar Rush*) is hidden from catalog and search.

## Theme Architecture & Files
| File / Directory | Purpose |
|---|---|
| `config/pages/home.php` | Homepage composition: Image-dominant hero (featuring real Full Kit box set, zero fluff paragraphs, single CTA), 3 chapter story sections with 3-image mosaic layout and embedded fragrance tasting flights, Full Kit wardrobe finale, and ultra-compressed trust reassurance ribbon. |
| `assets/store.css` | Brand design tokens (raspberry pink `#D82B6B`, creamy vanilla `#FAF4EB`, midnight velvet `#140C1A`), scoped to `body.home`. Sets section palette tokens (`--eg-story-*`), mosaic media frames, typography (weights 400 & 700 only, zero fake italics), 6-column desktop fragrance tray, mobile horizontal swipeable tasting flight, mobile-first hero ordering, and seamless day-to-night gradient transitions. |
| `inc/free-shipping.php` | WooCommerce shipping filter ensuring free shipping whenever the cart contains Loly's Full Kit (product 74). |
| `functions.php` | Enqueues `assets/store.css` after `egstore-core` and requires `inc/free-shipping.php`. |
| `scripts/setup-catalog.sh` | Committed idempotent WP-CLI catalog setup script. |
| `assets/images/` | High-quality WebP stock photos cropped and optimized for ingredient and mood slots. Real box and ingredient shots are loaded directly from the WordPress media library. |
| `assets/images/PROMPTS.md` | Detailed AI generation briefs for all image slots so the owner can replace stock assets with bespoke generated imagery. |

## How to Run `scripts/setup-catalog.sh`
The catalog setup script is fully idempotent and safe to run multiple times:

```bash
# On local environment:
bash misr-child-lolys/scripts/setup-catalog.sh

# Or with custom WordPress path (e.g. on live production):
bash misr-child-lolys/scripts/setup-catalog.sh --path=/var/www/html
```

It performs:
- Creates `strawberry-sticks`, `vanilla-vibes`, and `naughty-nights` product categories if not already existing.
- Assigns each kit and its 6 individual minis to their respective category while preserving existing terms.
- Sets Sugar Rush (product 197) catalog visibility to `hidden`.

## Image Assets & Credits

### Real Product & Brand Ingredient Media (WordPress Media Library)
- **Hero & Full Kit Finale**: Loly's Full Kit 3-Box Set (`Lolys-Full-Kit.webp`, Attachment ID 80, 900×1200 px). Shows the real illustrated boxes for Strawberry Sticks, Vanilla Vibes, and Naughty Nights.
- **Strawberry Sticks Box**: Attachment ID 206 (`ChatGPT-Image-Nov-3-2025-01_30_47-PM-1.png`, 900×1200 px). Shows the playful illustrated box standing upright.
- **Vanilla Vibes Box**: Attachment ID 78 (`Vanilla-Vibes.webp`, 900×1200 px). Shows the creamy vanilla illustrated box and 6 minis on an organic ceramic tray.
- **Naughty Nights Box**: Attachment ID 165 (`Gemini_Generated_Image_6bjx3b6bjx3b6bjx.png`, 900×1200 px). Shows the midnight dark fruit illustrated box standing upright.
- **Vanilla Vibes Gourmet Gelato**: Attachment ID 321 (`2151988812-new.webp`, 800×800 px). Real authentic gourmet vanilla bean gelato scoop with dark vanilla bean flecks and golden cream.
- **Vanilla Vibes White Florals**: Attachment ID 322 (`2148060380-new.webp`, 500×500 px). Soft powdery white floral petals in warm gentle daylight.
- All real brand assets are loaded directly via WordPress responsive image helpers (`wp_get_attachment_image()`) without copying into the child theme.

### Ingredient Mood Photos (Unsplash License — Commercial Use Allowed)
- `strawberry-sticks-main.webp` (800×800, 76.2 KB): Photo by **Massimo Adami** on [Unsplash](https://unsplash.com/photos/strawberries) (`photo-1464965911861-746a04b4bca6`). Alt: *Lush fresh strawberries in bright natural light*.
- `strawberry-sticks-accent.webp` (500×500, 7.4 KB): Photo by **Joanna Kosinska** on [Unsplash](https://unsplash.com/photos/red-cherries) (`photo-1528821128474-27f963b062bf`). Alt: *Sweet ripe red berries and cherry splash detail*.
- `naughty-nights-main.webp` (800×800, 8.2 KB): Photo by **Dhanya Purohit** on [Unsplash](https://unsplash.com/photos/two-cherries-on-a-dark-surface-with-a-black-background) (`photo-1632222867609-94cd3a82a074`). Alt: *Two dark ripe cherries on black slate in dramatic chiaroscuro night lighting*.
- `naughty-nights-accent.webp` (500×500, 45.3 KB): Photo on [Unsplash](https://images.unsplash.com/photo-1774710304329-a0f8326781a0) (`photo-1774710304329-a0f8326781a0`). Alt: *Macro detail of glossy ripe blackberries in deep dark rim lighting*.
