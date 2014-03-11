<?php get_header(); ?>

<section id="content" role="main" class="grid clearfix">
	
	<?php
		// Find posts in 'Projects' post type 
		$args = array(
			'posts_per_page' => 6,
			'post_type' => 'project'
		);
		query_posts($args);
		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('grid__item one-third'); ?>>		

		<section class="entry-content">
			<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('medium'); ?></a>
			<?php } ?>

			<?php // the_content(); ?>
		</section>

	</article>

	<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>

</section>

<?php get_footer(); ?>