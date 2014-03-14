<?php
/*
Template Name: Services
*/
?>

<?php get_header(); ?>

<section id="content" role="main" class="grid">

	<?php                  
        $args = array(
            'post_type' => 'service',
            'posts_per_page' => 8
        );
        query_posts( $args );
    ?>
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class('grid__item one-third'); ?>>
		<header class="header">
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
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

	<?php if ( ! post_password_required() ) comments_template( '', true ); ?>
	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>

</section>


<section>
	<h2>OUR PROCESS</h2>
	
</section>

<section>
	<h2>CLIENTS</h2>

	<ul>
		<li>Client Name</li>
		<li>Client Name</li>
		<li>Client Name</li>
		<li>Client Name</li>
		<li>Client Name</li>
		<li>Client Name</li>
		<li>Client Name</li>
		<li>Client Name</li>
		<li>Client Name</li>
		<li>Client Name</li>
	</ul>

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
</section>

<?php get_footer(); ?>