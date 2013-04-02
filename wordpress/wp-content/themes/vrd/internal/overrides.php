<?php
	
	// avoid having jquery duplicates
	if( !is_admin()){
		wp_deregister_script('jquery');
	}
	
	//cleaning up header trash
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'wp_generator');


	function change_post_menu_label() {
		global $menu;
		global $submenu;
		$menu[5][0] = 'Project';
		$submenu['edit.php'][5][0] = 'Project';
		$submenu['edit.php'][10][0] = 'Add Project';
		$submenu['edit.php'][16][0] = 'Project Tags';
		echo '';
	}
	function change_post_object_label() {
		global $wp_post_types;
		$labels = &$wp_post_types['post']->labels;
		$labels->name = 'Project';
		$labels->singular_name = 'Project';
		$labels->add_new = 'Add Project';
		$labels->add_new_item = 'Add Project';
		$labels->edit_item = 'Edit Project';
		$labels->new_item = 'Project';
		$labels->view_item = 'View Project';
		$labels->search_items = 'Search Project';
		$labels->not_found = 'No Project found';
		$labels->not_found_in_trash = 'No Project found in Trash';
	}
	add_action( 'init', 'change_post_object_label' );
	add_action( 'admin_menu', 'change_post_menu_label' );



?>
