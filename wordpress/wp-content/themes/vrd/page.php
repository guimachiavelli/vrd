<?php get_header(); ?>

<section class="main-module <?php if (!is_page('about')) { echo 'info-list'; } ?>" role="main">


			<?php while ( have_posts() ) : the_post(); ?>

			<?php 
				if (is_page('about')) {
			?>

			<header>
				<h1 class="title"><?php the_title(); ?></h1>
			</header>
				<figure id="nhat-photo">
					<?php the_post_thumbnail('full'); ?>
				</figure>
			<?php 
				} else {
			?>
			<header>
				<h1 class="outline">Links and social networks</h1>
			</header>
			<?php } ?>

			<div class="content">
				<?php the_content(); ?>
			</div>

			<?php endwhile;?>

	</section>

<?php get_footer(); ?>
