define(['jquery','underscore','carousel'], function() {
	_.templateSettings.variable = "imgs";

	vrdSlideshow = {

		close_button: '<a class="close with-overlay" href="#">╳</a>',
		negative_coat: '', 
		regular_coat: '',

		load: function(project) {
			this.regular_coat = $('#coat-of-arms').attr('src');
			this.negative_coat = $('#coat-of-arms').data('negative');

			if ($('#slideshow').length > 0) {
				$('#slideshow').remove();
			}

			$('html').addClass('project-mode').children('body').append('<div id="overlay"><div id="internal-padding"><div id="slideshow"></div></div></div>');
			$('#slideshow').append(project);
			$('#coat-of-arms').attr('src', this.negative_coat);


			$('#internal-padding').children('#slideshow').prepend(this.close_button);
			this.closeTrigger();
		},

		close: function() {
			$('#slideshow').fadeOut();
			$('#overlay').remove();
			$('html').removeClass('project-mode');
			$('#coat-of-arms').attr('src', this.regular_coat);

			return false;
		},

		closeTrigger: function() {
			var _this = this;

			$('.close.with-overlay').click(function(){
				_this.close();

				return false;
			});

			$('#overlay').click(function(){
				_this.close();
				
				return false;
			});

			$('#slideshow, #menu a').click(function(event){
  				event.stopPropagation();
			});

			$(document).keyup(function(e) {
				if (e.keyCode == 27) {
					_this.close();
				}
			});
		}

	};
		
	
	$('.project a').click(function(){
		var url = '?json=get_post&id=', 
			project_locator = $(this).attr('href').slice(1),
			image_list, project_info, slideshow;

		url += project_locator;

 		project_info =  	'<ul class="carousel" data-transition="slide">' +
							'<% var i = 1 %>' +
							'	<% _.each(imgs.image_list, function(info){ %>' +
							' 	<li>' +
							'		<article class="item">' +
							'			<figure class="main-figure <% if (info.images.full.width > info.images.full.height) { %> <%= "horizontal" %> <% } else { %> <%= "vertical" %> <% } %>">' +
							'				<img src="<%= info.images.full.url %>" alt="<%= info.title %>">' +
							'			</figure>' +
							'			<p class="main-text"><%= info.title %></p>' +
							' 			<div class="slide-counter"><%= i %>/<%= imgs.image_list.length %></div>' +
							'		</article>' +
							' 	<% i++; console.log(info) %>' +
							'	</li>' +
							' 	<% }) %>' +
							'</ul>';


		$.getJSON( 
			url,
			function (data) {
				image_list = data.post.attachments;
				
				slideshow = _.template(project_info);

				vrdSlideshow.load(slideshow({'image_list' : data.post.attachments}));
				$('#slideshow .carousel').carousel();

			}
		)


		return false;
	});


});
