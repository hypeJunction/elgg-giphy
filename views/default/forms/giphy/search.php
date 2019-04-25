<?php

$fields = elgg_view_field([
	'#type' => 'text',
	'placeholder' => elgg_echo('giphy:query'),
	'name' => 'q',
]);

$fields .= elgg_view_field([
	'#type' => 'submit',
	'value' => elgg_echo('giphy:search'),
]);

echo elgg_format_element('div', [
	'class' => 'giphy-fieldset',
], $fields);