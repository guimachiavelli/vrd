<?php
	$process_slug = 'process';
	$process_id = get_page_id($process_slug);
	$get_process_options = $get_news_options = array('include' => $process_id);
	$get_page =	get_pages($get_process_options);
?>

		<section id="process" class="module">
			<?php foreach ($get_page as $post) { setup_postdata($post); ?>
			<h1 class="title"><?php the_title(); ?></h1>
			<figure class="main-figure">
				<?php the_post_thumbnail(); ?>	
			</figure>
			<div class="main-text"><?php the_content(); ?></div>
			<?php } ?>
        </section>
