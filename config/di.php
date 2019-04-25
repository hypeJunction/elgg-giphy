<?php

return [
	'giphy.client' => \DI\create(\GPH\Api\DefaultApi::class),

	'giphy' => \DI\create(\hypeJunction\Giphy\Client::class)
		->constructor(
			\DI\get('giphy.client'),
			\DI\get('plugins')
		),
];