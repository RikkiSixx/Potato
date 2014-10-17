<?php
/*
Template Name: Standard Page
*/
?>

<?php get_header(); ?>

<section class="post-wrap" role="main">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<article <?php post_class(); ?>>

			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>


			<section class="entry-content post-wrap cf">

				<div class="post-content-wrap">
					<?php the_content(); ?>
				</div>

				<div class="post-img-wrap">
					<?php the_secondary_content('Page Images' ) ?>
				</div>

				<div class="entry-links"><?php wp_link_pages(); ?></div>
			</section>

		</article>

	<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>