<?php get_header(); ?>

<section role="main" class="project-grid cf">

	<?php the_category(); ?>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="project-item desk-one-third lap-one-half">		

		<section class="entry-content">
			<header class="header">
				<h3 class="entry-title">
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</h3>
			</header>

			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('project-sm'); ?>
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-sm.jpg" width="100%" height="auto" />
			<?php } ?>

			<?php // the_content(); ?>
		</section>

	</article>

	<?php endwhile; endif; ?>

</section>


<?php get_footer(); ?>