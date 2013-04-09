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

	function load_custom_admin_css() {
		global $post_type; if (($_GET['post_type'] == 'post') || ($post_type == 'post')) {
			wp_enqueue_style('my_style', WP_CONTENT_URL . '/themes/vrd/internal/admin.css');
		}
	}
	add_action( 'admin_print_styles', 'load_custom_admin_css' );



	add_filter( 'post_thumbnail_html', 'remove_thumbnail_dimensions', 10, 3 );

	function remove_thumbnail_dimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}



	add_action( 'admin_footer-post-new.php', 'wpse_76048_script' );
	add_action( 'admin_footer-post.php', 'wpse_76048_script' );

	function wpse_76048_script() {

?>
		<script>
			jQuery(function($) {
				var called = 0;
				$('#wpcontent').ajaxStop(function() {
					if ( 0 == called ) {
						$('[value="uploaded"]').attr( 'selected', true ).parent().trigger('change');
						called = 1;
					}
				});
			});
		</script>
<?php
	}
?>
