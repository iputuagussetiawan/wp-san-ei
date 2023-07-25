import '../scss/how-to-fix.scss';
import '../node_modules/lightcase/src/js/lightcase.js';

jQuery(function($){
	$(".gallery[data-rel^=lightcase]").lightcase();
});