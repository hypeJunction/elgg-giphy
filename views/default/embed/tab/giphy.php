<?php

namespace hypeJunction\Embed;

echo elgg_view_form('giphy/search', [
	'class' => 'giphy-form',
    'action' => 'javascript:void(0);',
]);

$trending = elgg_view('giphy/list', [
	'items' => elgg_di()->giphy->trending(),
]);

echo elgg_format_element('div', [
	'class' => 'giphy-results',
], $trending);
?>
<script>
	require(['embed/tab/giphy']);
</script>