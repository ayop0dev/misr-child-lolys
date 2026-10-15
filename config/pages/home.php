<?php
/**
 * Loly's Glam homepage composition (replaces the Egstore theme's home.php).
 *
 * Art Direction & Visual Concept: "The Visual Daybook"
 * Mood Progression: Morning Daylight -> Golden Afternoon -> Midnight Noir -> Dawn Finale
 *
 * Principles:
 *   - MOSTLY IMAGERY AND VERY LITTLE TEXT: lets the bottles, ingredients and packaging shine.
 *   - One designed continuous scroll from morning to night.
 *   - No redundant banners or duplicate chips.
 *   - True product box attachments: Kit 74 (80), Kit 75 (206), Kit 76 (78), Kit 73 (165).
 *   - Strictly confirmed promises only: free shipping exclusively on Kit 74, 1-3 days delivery,
 *     COD & Vodafone Cash, 10 ml minis, long-lasting, French oils made in Egypt, cruelty-free,
 *     "up to 12 hours" only on Naughty Nights.
 *
 * @package MisrChildLolys
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

$shopUrl = function_exists('wc_get_page_permalink') ? wc_get_page_permalink('shop') : home_url('/');
$productUrl = static fn (int $id): string => (string) (get_permalink($id) ?: home_url('/?p=' . $id));
$imgBase = get_stylesheet_directory_uri() . '/assets/images/';

// Verified featured image attachment IDs:
// Kit 74: 80 (Lolys-Full-Kit.webp)
// Kit 75: 206 (Strawberry Sticks illustrated box)
// Kit 76: 78 (Vanilla Vibes illustrated box with tray)
// Kit 73: 165 (Naughty Nights illustrated box)
$fullKitImageId = 80;
$strawberryBoxId = 206;
$vanillaBoxId = 78;
$naughtyBoxId = 165;

return [
	[
		'section' => 'hero',
		'config'  => [
			'layout'                 => 'split',
			'eyebrow'                => '10 ml Perfume Oils · Made in Egypt',
			'eyebrow_style'          => 'pill',
			'eyebrow_icon'           => 'star',
			'title'                  => 'Scents That Bring You Compliments',
			'title_highlight'        => 'Three Moods. Eighteen Minis.',
			'description'            => '', // Purposely empty: first screen is imagery-first
			'mobile_align'           => 'center',
			'image'                  => $fullKitImageId,
			'image_alt'              => "Loly's Glam miniature perfume oils collection",
			'action_label'           => 'Explore The Kits',
			'action_url'             => '#strawberry-sticks',
			'secondary_action_label' => '',
			'secondary_action_url'   => '',
			'stats'                  => [],
			'badges'                 => [], // No badges cluttering the visual
		],
	],
	[
		'section' => 'story',
		'config'  => [
			'id'                     => 'strawberry-sticks',
			'layout'                 => 'start',
			'media_layout'           => 'mosaic',
			'image'                  => $strawberryBoxId,
			'image_alt'              => 'Strawberry Sticks Discovery Kit illustrated box',
			'image_width'            => 900,
			'image_height'           => 1200,
			'secondary_image'        => $imgBase . 'strawberry-sticks-main.webp',
			'secondary_image_alt'    => 'Lush fresh strawberries in bright morning natural light',
			'secondary_image_width'  => 800,
			'secondary_image_height' => 800,
			'tertiary_image'         => $imgBase . 'strawberry-sticks-accent.webp',
			'tertiary_image_alt'     => 'Sweet ripe red cherries macro detail',
			'tertiary_image_width'   => 500,
			'tertiary_image_height'  => 500,
			'eyebrow'                => 'Morning · Fresh & Playful',
			'eyebrow_style'          => 'pill',
			'eyebrow_icon'           => 'heart',
			'title'                  => 'Strawberry Sticks',
			'title_highlight'        => '650 EGP',
			'description'            => 'Playful, juicy berries and candy florals for sunny mornings.',
			'notes'                  => [],
			'action_label'           => 'Get Strawberry Sticks — 650 EGP',
			'action_url'             => $productUrl(75),
			'products'               => [
				'id'     => 'strawberry-sticks-minis',
				'title'  => '',
				'source' => [
					'type'     => 'latest',
					'limit'    => 6,
					'category' => 'strawberry-sticks',
				],
			],
		],
	],
	[
		'section' => 'story',
		'config'  => [
			'id'                     => 'vanilla-vibes',
			'layout'                 => 'end',
			'media_layout'           => 'mosaic',
			'image'                  => $vanillaBoxId,
			'image_alt'              => 'Vanilla Vibes Discovery Kit illustrated box and minis on tray',
			'image_width'            => 900,
			'image_height'           => 1200,
			'secondary_image'        => 321,
			'secondary_image_alt'    => 'Rich vanilla bean gelato scoop with natural vanilla flecks',
			'secondary_image_width'  => 800,
			'secondary_image_height' => 800,
			'tertiary_image'         => 322,
			'tertiary_image_alt'     => 'Soft powdery white florals in warm gentle light',
			'tertiary_image_width'   => 500,
			'tertiary_image_height'  => 500,
			'eyebrow'                => 'Afternoon · Warm & Cozy',
			'eyebrow_style'          => 'pill',
			'eyebrow_icon'           => 'leaf',
			'title'                  => 'Vanilla Vibes',
			'title_highlight'        => '650 EGP',
			'description'            => 'Soft creamy vanilla, powdery florals and warm golden amber.',
			'notes'                  => [],
			'action_label'           => 'Get Vanilla Vibes — 650 EGP',
			'action_url'             => $productUrl(76),
			'products'               => [
				'id'     => 'vanilla-vibes-minis',
				'title'  => '',
				'source' => [
					'type'     => 'latest',
					'limit'    => 6,
					'category' => 'vanilla-vibes',
				],
			],
		],
	],
	[
		'section' => 'story',
		'config'  => [
			'id'                     => 'naughty-nights',
			'layout'                 => 'start',
			'media_layout'           => 'mosaic',
			'image'                  => $naughtyBoxId,
			'image_alt'              => 'Naughty Nights Discovery Kit illustrated box',
			'image_width'            => 900,
			'image_height'           => 1200,
			'secondary_image'        => $imgBase . 'naughty-nights-main.webp',
			'secondary_image_alt'    => 'Two dark cherries on slate in dramatic chiaroscuro lighting',
			'secondary_image_width'  => 800,
			'secondary_image_height' => 800,
			'tertiary_image'         => $imgBase . 'naughty-nights-accent.webp',
			'tertiary_image_alt'     => 'Macro detail of glossy ripe blackberries in deep rim lighting',
			'tertiary_image_width'   => 500,
			'tertiary_image_height'  => 500,
			'eyebrow'                => 'Night · Up to 12 Hours',
			'eyebrow_style'          => 'pill',
			'eyebrow_icon'           => 'zap',
			'title'                  => 'Naughty Nights',
			'title_highlight'        => 'The Best Seller · 650 EGP',
			'description'            => 'Fruity warmth over deep woods and vanilla. Lasts up to 12 hours.',
			'notes'                  => [],
			'action_label'           => 'Get Naughty Nights — 650 EGP',
			'action_url'             => $productUrl(73),
			'products'               => [
				'id'     => 'naughty-nights-minis',
				'title'  => '',
				'source' => [
					'type'     => 'latest',
					'limit'    => 6,
					'category' => 'naughty-nights',
				],
			],
		],
	],
	[
		'section' => 'story',
		'config'  => [
			'id'              => 'full-kit',
			'layout'          => 'end',
			'media_layout'    => 'single',
			'image'           => $fullKitImageId,
			'image_alt'       => "Loly's Glam Full Kit 18 mini perfume oils discovery collection",
			'image_width'     => 900,
			'image_height'    => 1200,
			'eyebrow'         => 'The Complete Wardrobe · 18 Minis',
			'eyebrow_style'   => 'pill',
			'eyebrow_icon'    => 'star',
			'title'           => "Loly's Full Kit",
			'title_highlight' => '1,650 EGP · Free Shipping',
			'description'     => 'All three discovery kits. 18 luxury 10 ml minis. Free shipping included.',
			'notes'           => [],
			'action_label'    => 'Get the Full Kit — 1,650 EGP',
			'action_url'      => $productUrl(74),
		],
	],
	[
		'section' => 'features',
		'config'  => [
			'id'     => 'trust-promises',
			'layout' => 'inline',
			'title'  => '',
			'items'  => [
				[
					'icon'  => 'truck',
					'title' => 'Free Shipping',
					'text'  => 'On Full Kit',
				],
				[
					'icon'  => 'banknote',
					'title' => 'Cash on Delivery',
					'text'  => '& Vodafone Cash',
				],
				[
					'icon'  => 'zap',
					'title' => '1–3 Days Delivery',
					'text'  => 'Doorstep Egypt',
				],
				[
					'icon'  => 'shield-check',
					'title' => 'French Fragrance Oils',
					'text'  => 'Made in Egypt · Cruelty-Free',
				],
			],
		],
	],
];
