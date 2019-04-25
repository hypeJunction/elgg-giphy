<?php

$items = elgg_extract('items', $vars);
/* @var $items \GPH\Model\Gif[] */

if (empty($items)) {
	echo elgg_format_element('p', [
		'class' => 'elgg-no-results',
	], elgg_echo('giphy:no_results'));

	return;
}

$list = '';

foreach ($items as $item) {
	$preview_url = $item->getImages()->getPreviewGif()->getUrl();
	$url = $item->getImages()->getDownsizedLarge()->getUrl();

	$embed = elgg_format_element('img', [
		'src' => $preview_url,
		'alt' => 'Animated Gif Image',
	]);

	$list .= elgg_format_element('li', [
		'class' => 'giphy-list-item',
		'data-giphy-url' => $url,
	], $embed);
}

echo elgg_format_element('ul', [
	'class' => 'elgg-list giphy-list',
], $list);