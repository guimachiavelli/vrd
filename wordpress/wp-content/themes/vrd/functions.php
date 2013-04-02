<?php

	//helper functions
	get_template_part("internal/helpers");
	
	//configuration and overriding wp defaults
	get_template_part("internal/overrides");
	get_template_part("internal/configs");

	//add video inserting support
	get_template_part("internal/post_video_insert");
	
	//add section: news
	get_template_part("internal/register_news");



?>
