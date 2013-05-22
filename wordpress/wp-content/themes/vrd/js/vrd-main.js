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
	//plugins
	'carousel': 'libs/filementgroup-responsive-carousel/dist/responsive-carousel',
	'fitvids': 'libs/fitvid'
  }
});

require(['modules/carousel', 'modules/slideshow', 'modules/nav', 'modules/video']);
