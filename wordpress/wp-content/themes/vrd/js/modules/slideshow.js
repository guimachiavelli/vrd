define(['jquery','underscore','carousel'], function() {
	_.templateSettings.variable = "imgs";

	vrdSlideshow = {

		close_button: '<a class="close with-overlay" href="#">✕</a>',
		negative_coat: '', 
		regular_coat: '',

		load: function(project) {
			var _this = this;
			this.regular_coat = $('#coat-of-arms').attr('src');
			this.negative_coat = $('#coat-of-arms').data('negative');

			if ($('#slideshow').length > 0) {
				$('#slideshow').remove();
			}

			$('html').addClass('project-enter').children('body').append('<div id="overlay"><div id="internal-padding"></div></div>').hide().fadeIn(200, function() { 
				$('html').addClass('project-mode').removeClass('project-enter');
				$('#internal-padding').append('<div id="slideshow"></div>');
				$('#slideshow').hide();
				$('#coat-of-arms').attr('src', _this.negative_coat);
				$('#slideshow').append(project)
				$('#slideshow .carousel').carousel();
				$('#slideshow').fadeIn(500);
				$('#menu').prepend(_this.close_button);
				_this.closeTrigger();
				_this.resizeSlide();
			});
		

		},

		close: function() {
			var _this = this;
			$('html').addClass('project-exit');
			$('#internal-padding, #menu').hide();
			$('#overlay').fadeOut(200, function() { 
				$(this).remove();
				$('.close.with-overlay').remove();
				$('html').removeClass('project-mode');
				$('html').removeClass('project-exit');
				$('#coat-of-arms').attr('src', _this.regular_coat);
				$('#menu').fadeIn(100);


			});

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
		},

		resizeSlide: function() {
			image_width = $('#slideshow').width();
			image_height = $('#slideshow').height() - 50;
			
			console.log(image_height);

			$('#slideshow .main-figure img').height(image_height);
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
							'			<p class="main-text"><%= i %>/<%= imgs.image_list.length %>&nbsp; &nbsp; <%= info.title %></p>' +
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

			}
		);
		

		$(window).resize(function() {
			vrdSlideshow.resizeSlide();
		});

		return false;
	});


});
