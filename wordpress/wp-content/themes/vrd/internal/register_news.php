<?php
	
	add_action("init", "create_news_section");
	add_action("save_post", "save_news");

	//Create the post type
	function create_news_section() {
		register_post_type( "news",
			array(
				"labels" => array(
					"name" => __( "News" ),
					"singular_name" => __( "News" )
				),
				"public" => true,
				"has_archive" => true,
				"menu_position" => 6,
				"hierarchical" => true, 
				"supports" => array("title", "excerpt", "thumbnail")
			)
		);
	}
	

	function save_news() {
		global $post;
		if(is_object($post) && $post->ID > 0) {
			if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ){  
				return $post_id;  
			} else {
//				update_post_meta($post->ID, "nota_url", $_POST["nota_url"]);
			}
		}
	}


?>
