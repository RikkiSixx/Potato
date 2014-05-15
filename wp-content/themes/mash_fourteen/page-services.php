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
				<h4 class="entry-title">
					<?php the_title(); ?>
				</h4>
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

</div><!-- .container -->

<div class="process">

	<div class="container">

		<section>
			<h4>Our Process</h4>

			<p>Mash was founded in 2002 and offers creative consultancy, great design and exacting production values for every project large or small. The service we provide is personal.</p>

			<ul class="process-stages cf">
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/process-listen.png" title="" alt="" />
					<p>Listen to your problem</p>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/process-develop.png" title="" alt="" />
					<p>Develop your brief</p>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/process-ideas.png" title="" alt="" />
					<p>Ideas &amp; Concept Generation</p>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/process-present.png" title="" alt="" />
					<p>Present &amp; Open to feedback</p>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/process-production.png" title="" alt="" />
					<p>Production &amp; Artwork Finalising</p>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/process-launch.png" title="" alt="" />
					<p>Launch &amp; deployment</p>
				</li>
			</ul>
			
		</section>

	</div><!-- .container -->

</div><!-- .process -->

<div class="container">

<section class="clients">
	<h4>Clients</h4>

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
				<h4><?php the_title_attribute(); ?></h4>
			</blockquote>		
		</aside>
	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>

</section><!-- .clients -->

<?php get_footer(); ?>