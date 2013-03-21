require.config({
  paths: {
	'modernizr': 'libs/modernizr',
    'jquery': [
		'//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min',
		'js/libs/jquery'
	],
    'underscore': [
		'libs/underscore/underscore-min'
	],
    'backbone': [
		'libs/backbone/backbone-min'
	]
  }
});

requirejs(['modernizr', 'jquery', 'underscore', 'backbone'],
function   (modernizr, $, unders_, backbone) {
    //jQuery, canvas and the app/sub module are all
    //loaded and can be used here now.
});
