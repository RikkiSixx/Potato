<?php
/*
Template Name: Blog
*/
?>

<?php get_header(); ?>

<section id="content" role="main">

	<?php                  
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => 10
        );
        query_posts( $args );
    ?>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article class="cf post-wrap">

		<div class="lap-two-thirds desk-one-third post-content">
			<h3><a href="<?php the_permalink ?>" title="<?php the_title_attribute(); ?>"><?php the_title_attribute(); ?></a></h3>

			<?php the_excerpt(); ?>

			<p><a href="<?php the_permalink ?>" title="<?php the_title_attribute(); ?>">Continue reading</a></p>

			<?php edit_post_link(); ?>
		</div>

		<div class="lap-one-third desk-two-thirds post-image">
			<?php if ( has_post_thumbnail() ) { ?>
				<?php the_post_thumbnail('project-lg'); ?>
			<?php } else { ?>
				<img src="<?php echo get_template_directory_uri(); ?>/img/studio-3.jpg" title="Studio" />
			<?php }; ?>
		</div>

	</article>

	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>

</section>

<?php get_footer(); ?>