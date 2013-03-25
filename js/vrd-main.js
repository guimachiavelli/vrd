require.config({
  paths: {
	//libraries
	'modernizr': 'libs/modernizr',
    'jquery': [
		'//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min',
		'libs/jquery/jquery.min'
	],
    'underscore': [
		'libs/underscore/underscore-min'
	],
    'backbone': [
		'libs/backbone/backbone-min'
	],
	//plugins
	'carousel': 'libs/jcarousel/dist/jquery.jcarousel.min',
	'carousel2': 'libs/filementgroup-responsive-carousel/dist/responsive-carousel',
	
  }
});

require(['libs/modernizr']);
require(['modules/carousel', 'modules/slideshow', 'modules/nav']);
