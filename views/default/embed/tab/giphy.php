<?php

namespace hypeJunction\Embed;

?>
<div class="elgg-module elgg-module-embed">
    <div class="elgg-head">
		<?php
		echo elgg_view_form('giphy/search', [
			'class' => 'giphy-form',
			'action' => 'javascript:void(0);',
		]);
		?>
    </div>

    <div class="elgg-body">
		<?php
		$trending = elgg_view('giphy/list', [
			'items' => elgg_di()->giphy->trending(),
		]);

		echo elgg_format_element('div', [
			'class' => 'giphy-results',
		], $trending);
		?>
    </div>
</div>

<script>
	require(['embed/tab/giphy']);
</script>