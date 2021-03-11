import { $document } from '../utils/globals';

/**
 * Articles load more button
 *
 * @return {void}
 */

$document.on('click', '.js-load-more a', function(e){
	e.preventDefault();

	if ( $('body').hasClass( 'loading' ) ) {
		return;
	}

	let link = $(this).attr('href');

	$('body').addClass('loading');

	$.ajax({
		url: link,
		type: 'GET',
		dataType: 'html',

		success: function (data) {
			let elements = $(data).find('.articles');

			$document.find('.articles').append(elements.html());

			if ( $(data).find('.js-load-more a').length ) {
				$document.find('.js-load-more a').attr('href', $(data).find('.js-load-more a').attr('href'));
			} else {
				$document.find('.js-load-more a').remove();
			}
		},
		error: function (xhr, textStatus, errorThrown) {
			console.log(textStatus);
		}
	}).done(function(data){
		$('body').removeClass( 'loading' );
	})
})
