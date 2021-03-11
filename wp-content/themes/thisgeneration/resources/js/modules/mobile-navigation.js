import { $win, $body} from "../utils/globals";
import { isMobile } from '../utils/is-mobile';

if ( isMobile ) {
	initMobileNavigation()
}

$('.js-nav-trigger').on('click', function(e) {
	e.preventDefault();

	$body.toggleClass('has-menu-opened')

	$('.nav').stop().slideToggle()
});

$body.on('click touchstart', function(event){
	var $target = $(event.target);

	if(!$target.parents('.header').length ){

	}
});

function initMobileNavigation() {
	$('.nav ').on('click', 'a', function(e){
		let $parent = $(this).closest('li')
		let $subMenu = $(this).next()

		if ( $subMenu.length && !$(this).parent().hasClass('js-show')) {
			e.preventDefault();

			$(this).next().slideDown()
				.parent()
				.addClass('js-show')

		};
	});
}
