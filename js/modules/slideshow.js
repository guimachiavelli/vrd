define(['jquery','underscore','carousel'], function() {

	vrdSlideshow = {

		close_button: '<a class="close-map with-overlay" href="#">✖</a>',

		load: function(project) {
			
			if ($('#slideshow').length > 0) {
				$('#slideshow').remove();
			}

			$('html').addClass('project-mode').children('body').append('<div id="overlay"><div id="internal-padding"><div id="slideshow"></div></div></div>');
			$('#overlay').hide().fadeIn('fast');
			$('#slideshow').append(project);
			$('#internal-padding').children('#slideshow').prepend(this.close_button);
			this.close();
		},

		close: function() {
			$('.close-map.with-overlay').click(function(){
				$(this).parent().fadeOut();
				$(this).parents('#overlay').fadeOut('slow', function() { this.remove(); });
				$('html').removeClass('project-mode');

				return false;
			});

			$(document).keyup(function(e) {
				if (e.keyCode == 27) {
					$('#slideshow').fadeOut();
					$('#overlay').fadeOut('slow', function() { this.remove(); });
					$('html').removeClass('project-mode');
				}
			});
		}

	};
	
	var data = {
		'project' : {
			'1': {
				'image' : 'placeholder/pic1.jpg',
				'description': 'Oxener winkel, Breda'
			},
			'2': {
				'image' : 'placeholder/pic2.jpg',
				'description': 'asdfer winkel, Breda'
			},
		}
	};
	
	var project_info =  '<ul class="carousel" data-transition="slide">' +
						'	<% _.each(project, function(info){ %>' +
						' 	<li>' +
						'		<article class="item">' +
						'			<figure class="main-figure">' +
						'				<img src="<%= info.image %>" alt="<%= info.description %>">' +
//							'<% console.log(info)%>' +
						'			</figure>' +
						'			<p class="main-text"><%= info.description %></p>' +
						'		</article>' +
						'	</li>' +
						' 	<% }) %>' +
						'</ul>';

	project_info = _.template(project_info, data);
	
//	var list = "<% _.each(project_item, function(image) { %> <li><%= image %></li> <% }); %>";
//	console.log(_.template(list, data));

	
	$('.project a').click(function(){
		vrdSlideshow.load(project_info);
		$('#slideshow .carousel').carousel();

		return false;
	});


});


