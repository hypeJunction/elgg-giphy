<?php

namespace hypeJunction\Giphy;

use ElggMenuItem;

/**
 * @access private
 */
class Menus {

	/**
	 * Setup embed menu
	 *
	 * @param string         $hook   "register"
	 * @param string         $type   "menu:embed"
	 * @param ElggMenuItem[] $return Menu
	 * @param array          $params Hook params
	 *
	 * @return ElggMenuItem[]
	 */
	public static function setupEmbedMenu($hook, $type, $return, $params) {
		$return[] = ElggMenuItem::factory([
			'name' => 'giphy',
			'text' => elgg_echo('giphy:embed'),
			'priority' => 300,
			'data' => [
				'view' => 'embed/tab/giphy',
			],
		]);

		return $return;
	}

}
