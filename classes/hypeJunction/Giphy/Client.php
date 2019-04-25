<?php

namespace hypeJunction\Giphy;

use Elgg\Database\Plugins;
use GPH\Api\DefaultApi;
use GPH\Model\Gif;

/**
 * @property-read string $api_key
 * @property-read string $rating
 */
class Client {
	const LIMIT = 20;

	/**
	 * @var DefaultApi
	 */
	protected $sdk;

	/**
	 * @var Plugins
	 */
	protected $plugins;

	/**
	 * {@inheritdoc}
	 */
	public function __get($name) {
		switch ($name) {
			case 'api_key' :
			case 'rating' :
				return $this->plugins->getSetting($name, 'elgg-giphy');
		}
	}

	/**
	 * Constructor
	 *
	 * @param DefaultApi $sdk Giphy SDK
	 */
	public function __construct(DefaultApi $sdk, Plugins $plugins) {
		$this->sdk = $sdk;
		$this->plugins = $plugins;
	}

	/**
	 * Search for Gifs
	 *
	 * @param string $q       Query string
	 * @param array  $options Query options
	 *
	 * @option int    $limit
	 * @option int    $offset
	 * @option string $lang
	 *
	 * @return Gif[]
	 */
	public function search($q, array $options = []) {
		try {
			$results = $this->sdk->gifsSearchGet(
				$this->api_key,
				$q,
				elgg_extract('limit', $options, self::LIMIT),
				elgg_extract('offset', $options, 0),
				$this->rating,
				elgg_extract('lang', $options, 'en')
			);
		} catch (\Exception $e) {
			elgg_log($e->getMessage(), 'ERROR');
		}

		return $results ? $results->getData() : [];
	}

	/**
	 * Get trending gifs
	 *
	 * @param array  $options Query options
	 *
	 * @option int    $limit
	 * @option string $format
	 *
	 * @return Gif[]
	 */
	public function trending(array $options = []) {
		try {
			$results = $this->sdk->gifsTrendingGet(
				$this->api_key,
				elgg_extract('limit', $options, self::LIMIT),
				$this->rating
			);
		} catch (\Exception $e) {
			elgg_log($e->getMessage(), 'ERROR');
		}

		return $results ? $results->getData() : [];
	}

}