import { $document } from "../utils/globals";
import 'magnific-popup';

$document.ready(function() {
	$('.js-iframe-popup').magnificPopup({
		type: 'iframe',
		preloader: false,
		removalDelay: 300,
        fixedContentPos: true,
        fixedBgPos: true,
        closeBtnInside: true,
	});
});
