import { $win } from '../utils/globals';
import 'slick-carousel';

if ( $('.js-testimonial-slider').length ) {
	$('.js-testimonial-slider').slick({
		infinite: true,
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		autoplay: true,
		autoplaySpeed: 3600,
		arrows: false,
		dots: true,
		rows: 0,
	});
}

if ( $('.js-houses-slider').length ) {
	$('.js-houses-slider').slick({
		centerMode: true,
		infinite: true,
  		slidesToShow: 1,
  		slidesToScroll: 1,
  		arrows: false,
  		variableWidth: true,
  		speed: 500,
		autoplay: true,
		autoplaySpeed: 1500,
		arrows: false,
		dots: true,
		rows: 0,
		centerPadding: '0',
	});
}
