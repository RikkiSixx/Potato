<?php get_header(); ?>

<header class="header">
		<!-- <h1 class="entry-title"><?php the_title(); ?></h1> -->
	</header>

<section role="main" class="project-grid cf">

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="project-item desk-one-third lap-one-half">		

		<section class="entry-content">
			<header class="header">
				<h3 class="entry-title">
					<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
				</h3>	
				<p class="service-performed"><?php echo get_the_term_list( $post->ID, 'service-type', 'Services: ', ', ' ); ?></p>				
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