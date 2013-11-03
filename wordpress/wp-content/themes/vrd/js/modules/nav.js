define(['jquery'], function($) {

	$('#menu a').click(function() {
		var target = $(this.hash), menu_height = $('#menu').height();
		
		if ($('html').hasClass('project-mode')) {
			vrdSlideshow.close();
		}

        target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
           if (target.length) {
           $('html,body').animate({
                scrollTop: target.offset().top - (menu_height + 22)
           }, 1500);
           return false;
        }

	});

});
