<?php get_header(); ?>

	<section id="content" role="main">

			<?php 
				while ( have_posts() ) { 
					the_post(); 
			?>

				<article class="post">
					<header>
						<h1 class="title"><?php the_title(); ?></h1>
					</header>

					<?php the_content(); ?>

					<footer>
						<time datetime="<?php the_time('c');?>"><?php the_time('d/m/Y');?></time>
						
						<section class="tags">
							<h1>▒▒ Categorias:</h1>
							<ul>
								<?php the_category(', '); ?>
							</ul>
						</section>

					</footer>

					<aside class="related-posts">
						<h1>Artigos Relacionados:</h1>
						<ul>
							<li>
								<a href="#">
									A related article
									<img src="placeholder/ex1.jpg" width="50">
								</a>
							</li>
							<li>
								<a href="#">
									A second related article
									<img src="placeholder/ex2.jpeg" width="50">
								</a>
							</li>
						</ul>
					</aside>


				</article>

			<?php } ?>
		</section>

<?php get_footer(); ?>
