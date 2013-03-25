define(['jquery'], function($) {

	$('#menu a').click(function() {
		var target = $(this.hash), menu_height = $('#menu').height() + 40;
        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
           if (target.length) {
             $('html,body').animate({
                 scrollTop: target.offset().top - menu_height
            }, 1500);
            return false;
        }

	});

});