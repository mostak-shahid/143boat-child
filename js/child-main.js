jQuery(document).ready(function($) {
	$(window).scroll(function(){
		if ($(this).scrollTop() > 100) {
			$('.sticky-menu').slideDown('slow');
		} else {
			$('.sticky-menu').slideUp('slow');
		}
	}); 
});