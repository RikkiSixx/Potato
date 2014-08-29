<?php
/*
Template Name: Studio
*/
?>

<?php get_header(); ?>

	<section role="main" class="page-studio">
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article>
			<header class="header">
				<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
			</header>

			<div class="entry-content grid">
				<div class="row cf">
					<div class="intro grid__item">	
						<?php the_content(); ?>			
					</div>

					<aside class="address grid__item">
						<?php $options = get_option('mash_fourteen_theme_options'); ?>

						<?php 
							echo '<p>'.($options["address_line_1"]).'<br />'.($options["address_line_2"]).'<br />'.($options["address_line_3"]).'</p>';
							echo '<p>'.($options["phone_number"]).'</p>';
							echo '<p><a href='.($options["contact_email"]).'>'.($options["contact_email"]).'</a></p>'; 
						?>			
					</aside>
				</div>
			</div><!-- .entry-content -->

		</article>

		<?php endwhile; endif; ?>

		<div class="grid cf">			
			<div class="grid__item studio-images-lg">
				<img src="<?php echo get_template_directory_uri(); ?>/img/studio-3.jpg" title="Studio" />
			</div>
			<div class="grid__item studio-images-sm">
				<img src="<?php echo get_template_directory_uri(); ?>/img/studio-1.jpg" title="Studio" />
				<img src="<?php echo get_template_directory_uri(); ?>/img/studio-1.jpg" title="Studio" />
			</div>
		</div>
	</section>

</div><!-- ..container -->


<div class="staff-wrap">
	<div class="container">

		<?php                  
	        $args = array(
	            'post_type' => 'person',
	            'posts_per_page' => 5
	        );
	        query_posts( $args );
	    ?>

	    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article class="cf person">
			<div class="lap-two-thirds desk-one-third post-content">
				<h4><?php the_title_attribute(); ?></h4>
				<?php the_excerpt(); ?>
			</div>

			<div class="lap-one-third desk-two-thirds post-image">
				<?php if ( has_post_thumbnail() ) { the_post_thumbnail('project-lg'); } ?>
			</div>

		</article>
		<?php endwhile; endif; ?>

		<?php wp_reset_query(); ?>

	</div>


<?php get_footer(); ?>