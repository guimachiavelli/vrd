define(['jquery','underscore','carousel'], function() {

	vrdSlideshow = {

		close_button: '<a class="close-map with-overlay" href="#">✖</a>',

		load: function(project) {
			
			if ($('#slideshow').length > 0) {
				$('#slideshow').remove();
			}

			$('html').addClass('project-mode').children('body').append('<div id="overlay"><div id="internal-padding"><div id="slideshow"></div></div></div>');
			$('#slideshow').append(project);
			$('#internal-padding').children('#slideshow').prepend(this.close_button);
			this.close();
		},

		close: function() {
			$('.close-map.with-overlay').click(function(){
				$(this).parent().fadeOut();
				$(this).parents('#overlay').remove();
				$('html').removeClass('project-mode');

				return false;
			});

			$(document).keyup(function(e) {
				if (e.keyCode == 27) {
					$('#slideshow').fadeOut();
					$('#overlay').remove();
					$('html').removeClass('project-mode');
				}
			});
		}

	};
	
	var data = {
		'project' : [
			{
				'image' : 'placeholder/pic1.jpg',
				'description': 'Oxener winkel, Breda'
			},
			{
				'image' : 'placeholder/pic2.jpg',
				'description': 'asdfer winkel, Breda'
			}
		]
	};
	
	var project_info =  '<ul class="carousel" data-transition="slide">' +
						'	<% _.each(project, function(info){ %>' +
						' 	<li>' +
						'		<article class="item">' +
						'			<figure class="main-figure">' +
						'				<img src="<%= info.image %>" alt="<%= info.description %>">' +
						'			</figure>' +
						'			<p class="main-text"><%= info.description %> <%= info.key %></p>' +
						'		</article>' +
						'	</li>' +
						' 	<% console.log(info); }) %>' +
						'</ul>';

	
	$('.project a').click(function(){
		var url = 'data/project.json', 
			project_locator = $(this).attr('href').slice(1);
		
		console.log(project_locator);

		$.getJSON( 
			url,
			function (data) {
				console.log(data);
				project_info = _.template(data);
			}
		)

		//vrdSlideshow.load(project_info);
		$('#slideshow .carousel').carousel();

		return false;
	});


});
