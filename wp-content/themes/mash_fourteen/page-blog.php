<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<section role="main">

	<h1 class="entry-title">
		<?php the_title(); ?>
	</h1>	

	<?php
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;             
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 9,
            'paged' => $paged

        );
        query_posts( $args );
    ?>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="cf post-wrap">

		<div class="post-content-wrap">
			<h1><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a></h1>

			<?php the_excerpt(); ?>

			<p><a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">Continue reading</a></p>

		</div>

		<div class="post-img-wrap">
			<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" class="img-link">
				<?php the_permalink ?><?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail('project-lg'); ?>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-sm.jpg" width="100%" height="auto" />
				<?php }; ?>	
			</a>
		</div>			

	</article><!-- .post-wrap -->

	<?php endwhile; ?>

	<!-- Pagination -->
	<?php next_posts_link(); ?>
	<?php previous_posts_link(); ?>

	<?php endif; ?>

	<?php wp_reset_query(); ?>

</section>

<?php get_footer(); ?>