<?php
	
	// create constants for often used info
	define("TEMPLATE_URL", get_template_directory_uri());
	define("SITE_URL", get_bloginfo("url"));


	// print classes my way, just because
	function print_classes() {
		$raw_classes = get_body_class();
		$class_length = count($raw_classes);
		$i = 0;
		while($i < $class_length) {
			$the_classes .= $raw_classes[$i] . ' ';
			$i++;
		}
		return $the_classes;
	}


	// print author's full name
	function print_author($the_id) {
		$author_name = the_author_meta( 'first_name', $the_id ) . ' ' . the_author_meta( 'last_name', $the_id ) . the_author_meta( 'last_name', $the_id );
		
		return $author_name;
	}

	// print categories for use as .classes
	function print_categories($the_id) {
		foreach((get_the_category($the_id)) as $category) { 
			$post_categories .= $category->category_nicename;
		} 
		return $post_categories;
	}
	

	//Helper function for creating new post types
	function get_previous_content($content, $id) {
        $custom = get_post_custom($id);
		
		if (is_object($custom) || is_array($custom) || isset($custom)) {
			if (isset($custom[$content][0])) {
				$previous = $custom[$content][0];
			} else {
				$previous = '';
			}
		} else { $previous = ''; }

		return $previous;

	}

	function print_page_permalink($the_page_name) {
    	$permalink = get_page_by_path($the_page_name); 
		$permalink = get_permalink($permalink->ID);
		return $permalink;
	}

	function get_page_id($the_page_name) {
    	$the_page_id = get_page_by_path($the_page_name);
		$the_page_id = $the_page_id->ID;
		return $the_page_id;
	}

	function print_page_content($the_page_name) {
    	$the_page = get_page_by_path($the_page_name); 
		$the_page_content = apply_filters('the_content', $the_page->post_content);
		return $the_page_content;
	}

	function print_page_title($the_page_name) {
    	$the_page = get_page_by_path($the_page_name); 
		$the_page_title = $the_page->post_title;
		return $the_page_title;
	}

	function print_page_thumb($the_page_name) {
    	$the_page = get_page_by_path($the_page_name); 
		$the_page_title = $the_page->post_title;
		return $the_page_title;
	}


	// substitute <p>'s with <figure>'s inside posts
	function add_figure_tag($pee) {
		$pee = preg_replace('/<p>\\s*?(<a .*?><img.*?><\\/a>|<img.*?>)?\\s*<\\/p>/s', '<figure>$1</figure>', $pee);
		return $pee;
	}
	add_filter( 'the_content', 'add_figure_tag', 30 );


	function print_all_images($the_post_id) {
	
		$attachments = get_children(
			array(
				'post_parent' => $the_post_id,
				'post_status' => 'inherit',
				'post_type' => 'attachment',
				'post_mime_type' => 'image',
				'order' => 'ASC',
				'orderby' => 'menu_order ID'
			)
		);

		foreach($attachments as $key=>$image) {
			$i++;
//			echo $image->post_excerpt;
			echo '<li class="image_' . $i . '">
					<a href="#">' . $i . '</a>
					<figure class="hidden-content">
						<img src="'. $image->guid .'" alt="' . $image->post_title . '">
						<figcaption>' . $image->post_excerpt . '</figcaption>
					</figure>
				</li>';

		}

		return $attachments;
	
	}

	function print_feature_caption($the_id) {
		$thumb_id = get_post_thumbnail_id($the_id);
		$args = array(
			'p' => $thumb_id,
			'post_type' => 'attachment'
		);
		$thumb_image = get_posts($args);
		$thumb_caption = $thumb_image->post_excerpt;

		return $thumb_image[0]->post_excerpt;
//		print_r($thumb_image[0]);
	}


?>
