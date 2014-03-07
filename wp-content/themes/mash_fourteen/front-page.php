<?php get_header(); ?>

<section id="content" role="main">
	
	<?php
		// Find posts in 'Projects' post type 
		$args = array(
			'posts_per_page' => 6,
			'post_type' => 'project'
		);
		query_posts($args);
		if ( have_posts() ) : while ( have_posts() ) : the_post();
	?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="header">
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h1> 

			<?php edit_post_link(); ?>
		</header>

		<section class="entry-content">
			<?php if ( has_post_thumbnail() ) { ?>
				<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
			<?php } ?>

			<?php // the_content(); ?>

			<div class="entry-links">
				<?php wp_link_pages(); ?>
			</div>
		</section>

	</article>

	<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>

</section>

<?php get_footer(); ?>