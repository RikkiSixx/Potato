<?php
/*
Template Name: Project Detail
*/
?>

<?php get_header(); ?>

<section class="post-wrap" role="main">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<article <?php post_class(); ?>>

			<header>
				
				<h1 class="entry-title"><?php the_title(); ?></h1>

				<?php edit_post_link(); ?>

				<?php get_template_part( 'entry-meta' ); ?>
			</header>


			<section class="entry-content post-wrap cf">

				<?php if ( has_post_thumbnail() ) { the_post_thumbnail('project-lg'); } ?>

				<?php the_content(); ?>

				<div class="entry-links"><?php wp_link_pages(); ?></div>
			</section>


			<?php get_template_part( 'entry-footer' ); ?>
		</article>

	<?php endwhile; endif; ?>

	<footer class="footer">
		<?php get_template_part( 'nav', 'below-single' ); ?>
	</footer>

</section>

<?php get_footer(); ?>