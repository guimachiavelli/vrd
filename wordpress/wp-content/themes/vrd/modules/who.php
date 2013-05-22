<?php
	$who_slug = 'who';
	$who_id = get_page_id($who_slug);
	$get_who_options = array('include' => $who_id);
	$get_page =	get_pages($get_who_options);
?>

		<section id="who" class="module">
			<?php foreach ($get_page as $post) { setup_postdata($post); ?>
			<h1 class="title"><?php the_title(); ?></h1>
			<figure class="main-figure">
				<?php the_post_thumbnail(); ?>	
			</figure>
			<div class="main-text"><?php the_content(); ?></div>
			<?php } ?>
        </section>
