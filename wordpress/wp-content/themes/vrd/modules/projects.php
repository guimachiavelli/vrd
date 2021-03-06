<?php

	$get_projects_options = array(
		'posts_per_page'  => 99,
		'numberposts'     => 99,
		'orderby'         => 'post_date',
		'order'           => 'DESC',
		'post_type'       => 'post'
	);

	$get_projects = get_posts($get_projects_options);

?>

		<section id="projects" class="module">
			<h1 class="title">Projecten</h1>
			<ul>

				<?php foreach ($get_projects as $post) { setup_postdata($post); ?>
				<li class="project">
					<a href="#<?php the_ID(); ?>">
						<figure class="project-head">
							<?php the_post_thumbnail('thumbnail', array('class' => 'project-thumb')); ?>
							<figcaption class="project-title">
								<p><?php the_title(); ?></p>
							</figcaption>
						</figure>
					</a>
				</li>
				<?php } ?>

            </ul>
        </section>
