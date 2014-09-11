<?php
/*
Template Name: Services
*/
?>

<?php get_header(); ?>

<section role="main" class="page-services">

	<header class="header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

	<div class="intro">		
		<?php the_excerpt(); ?>
	</div>

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
					<img src="<?php echo get_template_directory_uri(); ?>/img/1-define-brief.png" title="Define brief" alt="Define brief" />
					<p>Define brief</p>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/2-explore-and-create.png" title="Explore & create" alt="Explore & create" />
					<p>Explore & create</p>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/3-present-and-invite-feedback.png" title="Present & invite feedback" alt="Present & invite feedback" />
					<p>Present & invite feedback</p>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/4-production.png" title="Production" alt="Production" />
					<p>Production</p>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/5-deliver.png" title="Deliver" alt="Deliver" />
					<p>Deliver</p>
				</li>
				<li>
					<img src="<?php echo get_template_directory_uri(); ?>/img/6-ongoing-care.png" title="Ongoing care" alt="Ongoing care" />
					<p>Ongoing care</p>
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