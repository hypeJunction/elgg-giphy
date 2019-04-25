<?php

$entity = elgg_extract('entity', $vars);

echo elgg_view_field([
	'#type' => 'text',
	'#label' => elgg_echo('giphy:settings:api_key'),
	'#help' => elgg_echo('giphy:settings:api_key:help', [
		elgg_view('output/url', ['href' => 'https://developers.giphy.com/dashboard/?create=true']),
	]),
	'name' => 'params[api_key]',
	'value' => $entity->api_key ? : '',
	'required' => true,
]);

echo elgg_view_field([
	'#type' => 'select',
	'#label' => elgg_echo('giphy:settings:rating'),
	'#help' => elgg_echo('giphy:settings:rating:help'),
	'name' => 'params[rating]',
	'value' => $entity->rating ? : 'G',
	'required' => true,
	'options' => ['G', 'PG', 'PG-13', 'R'],
]);