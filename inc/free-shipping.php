<?php
/**
 * Free shipping rule strictly for Loly's Full Kit (product 74).
 *
 * Confirmed by store owner: free shipping is granted ONLY when Loly's Full Kit
 * (product 74, 18 minis) is in the cart. Individual discovery kits (73, 75, 76)
 * have standard shipping.
 *
 * @package MisrChildLolys
 */

declare(strict_types=1);

defined('ABSPATH') || exit;

add_filter(
	'woocommerce_package_rates',
	static function (array $rates, array $package): array {
		if (is_admin() && !defined('DOING_AJAX')) {
			return $rates;
		}

		$target_ids = [74];

		$has_target = false;
		if (function_exists('WC') && WC()->cart) {
			foreach (WC()->cart->get_cart() as $item) {
				$pid = !empty($item['variation_id']) ? $item['variation_id'] : $item['product_id'];
				$ids_to_check = array_filter([(int) $pid, (int) wp_get_post_parent_id($pid)]);
				if (array_intersect($ids_to_check, $target_ids)) {
					$has_target = true;
					break;
				}
			}
		}

		if (!$has_target) {
			return $rates;
		}

		foreach ($rates as $rate_id => $rate) {
			$rates[$rate_id]->cost = 0;
			if (isset($rates[$rate_id]->taxes) && is_array($rates[$rate_id]->taxes)) {
				$rates[$rate_id]->taxes = array_fill(0, count($rates[$rate_id]->taxes), 0);
			}
			if (isset($rates[$rate_id]->label)) {
				$rates[$rate_id]->label = __('Free shipping', 'woocommerce');
			}
		}

		return $rates;
	},
	100,
	2
);
