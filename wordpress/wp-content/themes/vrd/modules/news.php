<?php

	$get_news_options = array(
		'posts_per_page'  => 3,
		'numberposts'     => 3,
		'orderby'         => 'post_date',
		'order'           => 'ASC',
		'post_type'       => 'news'
	);

	$get_news = get_posts($get_news_options);

?>

    	<section id="news" class="module">
			<h1 class="title">Nieuws</h1>
			<ol class="carousel" data-transition="slide">

				<?php foreach ($get_news as $post) { setup_postdata($post); ?>
				<li>
					<article class="item">
						<figure class="main-figure">
							<?php the_post_thumbnail('large'); ?>
						</figure>

						<div class="main-text"><?php the_excerpt(); ?></div>
					</article>
				</li>
				<?php } ?>

			</ol>
		</section>
