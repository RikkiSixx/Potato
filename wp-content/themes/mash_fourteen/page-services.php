<?php
/*
Template Name: Services
*/
?>

<?php get_header(); ?>

<section role="main">

	<?php the_excerpt(); ?>

	<section class="grid service-list cf">

		<?php                  
	        $args = array(
	            'post_type' => 'service',
	            'posts_per_page' => 10,            
            	'orderby'=> 'ID',
    			'order' => 'asc'
	        );
	        query_posts( $args );
	    ?>
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article <?php post_class('grid__item lap-one-half desk-one-third'); ?>>
			<header class="header">
				<h1 class="entry-title">
					<?php the_title(); ?>
				</h1>
			</header>

			<section class="entry-content">
				<?php if ( has_post_thumbnail() ) { ?>
					<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>"><?php the_post_thumbnail(); ?></a> 
				<?php } ?>

				<?php the_excerpt(); ?>

				<div class="entry-links">
					<?php wp_link_pages(); ?>
				</div>

				<?php edit_post_link(); ?>
			</section>

		</article>

		<?php endwhile; endif; ?>

		<?php wp_reset_query(); ?>

	</section>

</section>


<section>
	<h2>Our Process</h2>

	<p>Mash was founded in 2002 and offers creative consultancy, great design and exacting production values for every project large or small. The service we provide is personal.</p>
	
</section>

<section class="clients">
	<h2>Clients</h2>

	<?php the_content(); ?>

	<?php                  
        $args = array(
            'post_type' => 'testimonial',
            'orderby'=>'rand',
            'posts_per_page' => 1
        );
        query_posts( $args );
    ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<aside class="testimonial">
			<blockquote>
				<?php the_content(); ?>
				<?php the_title_attribute(); ?>
			</blockquote>		
		</aside>
	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>

</section><!-- .clients -->

<?php get_footer(); ?>