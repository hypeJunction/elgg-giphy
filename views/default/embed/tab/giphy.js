define(function (require) {
	var elgg = require('elgg');
	var embed = require('elgg/embed');
	var lightbox = require('elgg/lightbox');
	var popup = require('elgg/popup');

	var Ajax = require('elgg/Ajax');
	var ajax = new Ajax();

	$(document).on('submit', '.elgg-form-giphy-search', function (e) {
		e.preventDefault();

		var $elem = $(this);

		ajax.view('giphy/search', {
			data: ajax.objectify($elem)
		}).done(function (content) {
			$('.giphy-results').html(content);
		});
	});

	$(document).on('click', '[data-giphy-url]', function (e) {
		e.preventDefault();

		var $elem = $(this);

		var textAreaId = embed.textAreaId;
		var textArea = $('#' + textAreaId);

		var value = textArea.val();
		var result = textArea.val();

		var content = '<p><img src="' + $elem.data('giphyUrl') + '" /></p>';

		textArea.focus();

		if (!elgg.isNullOrUndefined(textArea.prop('selectionStart'))) {
			var cursorPos = textArea.prop('selectionStart');
			var textBefore = value.substring(0, cursorPos);
			var textAfter = value.substring(cursorPos, value.length);
			result = textBefore + content + textAfter;
		} else if (document.selection) {
			// IE compatibility
			var sel = document.selection.createRange();
			sel.text = content;
			result = textArea.val();
		}

		// See the ckeditor plugin for an example of this hook
		result = elgg.trigger_hook('embed', 'editor', {
			textAreaId: textAreaId,
			content: content,
			value: value,
			event: e
		}, result);

		if (result || result === '') {
			textArea.val(result);
		}

		if ($elem.closest('.embed-toolbar-popup').length) {
			popup.close();
		} else {
			lightbox.close();
		}
	});
});
