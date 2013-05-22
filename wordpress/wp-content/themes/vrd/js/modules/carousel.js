define(['jquery', 'carousel'], function() {
	$('#news .carousel').carousel();




/*	
 *	legacy code
 *
	
 	var carousel_nav =  '<nav class="carousel-nav">' +
						'	<a href="#" class="nav-item next">⟶</a>' +
						'	<a href="#" class="nav-item previous">⟵</a>' +
						'</nav>';

	
	$('.carousel').jcarousel({
		'list': '.carousel-list',
		'wrap': 'circular',
	}).prepend(carousel_nav);
	

	$('.nav-item.previous').click(function() {
		$(this).parents('.carousel').jcarousel('scroll', '-=1');
		return false;
	});

	$('.nav-item.next').click(function() {
		$(this).parents('.carousel').jcarousel('scroll', '+=1');
		return false;
	});

*/



});
