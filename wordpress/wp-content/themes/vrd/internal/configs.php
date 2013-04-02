<?php
	
	// thumbnails
	add_theme_support( 'post-thumbnails', array('post', 'page', 'news') );  
	set_post_thumbnail_size( 210, 144, true ); // Normal post thumbnails

	update_option('large_size_w', 900);
	update_option('large_size_h', 700);

	// remove annoying admin bar from the site
	add_filter('show_admin_bar', '__return_false'); 


	function custom_excerpt_length( $length ) {
		return 32;
	}
	add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );
	function new_excerpt_more( $more ) {
		return '&nbsp;[…]';
	}
	add_filter('excerpt_more', 'new_excerpt_more');

	function unregister_taxonomy(){
    	register_taxonomy('post_tag', array());
    	register_taxonomy('category', array());
	}
	add_action('init', 'unregister_taxonomy');


?>
