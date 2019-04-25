<?php

$q = elgg_extract('q', $vars);

$results = elgg_di()->giphy->search($q);

echo elgg_view('giphy/list', [
	'items' => $results,
]);
