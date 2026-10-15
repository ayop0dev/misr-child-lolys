# Misr Child (Loly's) Changelog

## Unreleased

- **Art Direction Redesign: "Mostly Imagery, Very Little Text"**:
  - **First Screen / Hero**: Completely image-forward first screen. On phones (390×844), the real Full Kit 18-mini set dominates the viewport (1:1 aspect ratio, `order: -1`) with no badges blocking the image, zero paragraph fluff, and a single, confident CTA ("Explore The Kits").
  - **Removed Redundant Mood Banners**: Eliminated the redundant 3-banner promo section that repeated the kit boxes. The visitor now glides immediately from the hero into the morning chapter.
  - **Verified Brand Box Media**: Connected the true illustrated boxes from the WordPress media library: Kit 75 (Strawberry Sticks, Attachment ID 206), Kit 76 (Vanilla Vibes, Attachment ID 78), Kit 73 (Naughty Nights, Attachment ID 165), and Kit 74 (Full Kit, Attachment ID 80).
  - **Sensory Editorial Fragrance Flight (Minis Presentation)**:
    - On mobile (<=47.99rem): Horizontal swipeable tasting flight (`overflow-x: auto; scroll-snap-type: x mandatory`), displaying 2.3 minis at once with the next card peeking. Visitors swipe through all 6 bottles smoothly in ~220px of vertical height rather than 750px of vertical scrolling.
    - On desktop (>=64rem): 6-column horizontal tasting tray (`repeat(6, minmax(0, 1fr))`), showing the complete fragrance flight side-by-side with zero vertical scrolling.
    - Cleaned all visual clutter: hidden loud sale badges, empty ratings, taxonomy, and summaries. Bottle surrounded by ingredients is centered and prominent, with title, price (`<ins>` / `<del>`), and compact "+ Add to cart" pill button.
  - **Seamless Light-to-Dark Color & Mood Atmosphere**:
    - Morning (Strawberry Sticks): Crisp daylight fading into soft berry blush (`#FFFFFF` to `#FFF5F8`).
    - Afternoon (Vanilla Vibes): Gentle transition into warm ivory, cream and golden amber (`#FAF4EB` to `#F8F1E5`).
    - Night (Naughty Nights): Dramatic shift into velvet obsidian and deep crimson (`#2A1429` to `#140C1A`).
    - Dawn Finale (Loly's Full Kit): Light breaks back in with soft rose and pearl (`#2A1429` to `#FFF3F6` to `#FFFDFB`).
  - **Radical Text Reduction**:
    - Cut copy by ~70%. Eliminated redundant scent chip tags that repeated the product names shown right below.
    - Kept only confirmed promises: free shipping on Full Kit only, 1-3 days delivery, COD & Vodafone Cash, 10 ml minis, long-lasting, French oils made in Egypt, cruelty-free, and "up to 12 hours" only for Naughty Nights.
  - **Compressed Reassurance Ribbon**: Merged verbose "Shop with Ease" and "Why Minis" card blocks into an ultra-lean 4-pill horizontal reassurance strip with zero paragraph text.
  - **Documentation & AI Prompts**: Synchronized `assets/images/PROMPTS.md` and `README.md` with all verified attachment IDs, dimensions, and AI prompts.

## 1.0.0

- Initial release of the Loly's Glam store layer on top of Egstore theme 1.3.8.
- Homepage storytelling composition: "A day in three moods" (Morning Strawberry Sticks -> Afternoon Vanilla Vibes -> Midnight Naughty Nights -> Full Kit Finale).
- Integration with the new `story` theme section featuring collage media, chip notes, and embedded category product collections.
- Real illustrated product box photography from media library for Hero split and Full Kit finale (`Lolys-Full-Kit.webp`, Attachment ID 80).
- Free shipping rule strictly for Loly's Full Kit (product 74), confirmed by store owner.
- Brand design tokens in `assets/store.css`: raspberry pink `#D82B6B`, vanilla cream `#FCF9F3`, midnight plum `#140E18`, soft rounded cards, and 3x2 product card layout.
- Strictly verified store promises: delivery in 1-3 business days, cash on delivery / Vodafone Cash, 10 ml minis, long-lasting formulation made in Egypt with French fragrance oils, cruelty-free.
- Committed idempotent catalog setup script (`scripts/setup-catalog.sh`) for categories and Sugar Rush hiding.
- High-performance WebP photography under strict size budgets (hero <= 150 KB, others <= 80 KB) with no human faces, foreign brand bottles, or text.
- AI generation prompt book in `assets/images/PROMPTS.md`.
