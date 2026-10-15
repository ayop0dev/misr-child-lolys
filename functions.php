<?php
/**
 * Misr Child (Loly's): the store layer for Loly's Glam (lolys.test / lolys.otour.store).
 *
 * Only this store's identity lives here: the homepage composition
 * (config/pages/home.php replaces the parent's) and brand styling through the
 * parent theme's tokens. Behaviour belongs in the Egstore theme or the
 * egstore-commerce plugin; settings live in the Customizer.
 *
 * @package MisrChildLolys
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

// Discovery kits free-shipping rule (products 73, 74, 75, 76).
require_once __DIR__ . '/inc/free-shipping.php';

add_action(
	'wp_enqueue_scripts',
	static function (): void {
		$path = get_stylesheet_directory() . '/assets/store.css';

		wp_enqueue_style(
			'misr-child-lolys',
			get_stylesheet_directory_uri() . '/assets/store.css',
			['egstore-core'],
			(string) filemtime($path)
		);
	},
	20
);
