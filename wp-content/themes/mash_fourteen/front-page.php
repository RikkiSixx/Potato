<?php get_header(); ?>

<section id="content" role="main" class="grid cf">
	
	<?php
		// Find posts in 'Projects' post type 
		$args = array(
			'posts_per_page' => 6,
			'post_type' => 'project'
		);
		query_posts($args);
		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

	<article class="desk-one-third grid__item project-block">		

		<section class="entry-content">
			<header class="header">
				<h1 class="entry-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h1>
			</header>

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