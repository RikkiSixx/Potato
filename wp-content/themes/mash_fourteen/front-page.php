<?php get_header(); ?>

<section id="content" role="main" class="project-grid cf">
	
	<?php
		// Find posts in 'Projects' post type 
		$args = array(
			'posts_per_page' => 6,
			'post_type' => 'project'
		);
		query_posts($args);
		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

	<article class="project-item">		

		<section class="entry-content">
			<header class="header">
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h1>
			</header>

			<a href="<?php the_permalink(); ?>">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail('project-sm'); ?></a>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-sm.jpg" width="100%" height="auto" />
				<?php } ?>
			</a>

			<?php // the_content(); ?>
		</section>

	</article>

	<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>

</section>

<?php get_footer(); ?>