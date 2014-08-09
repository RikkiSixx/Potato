<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<section role="main">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="header">
			<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
		</header>

		<div class="cf grid">
			<section class="entry-content map-canvas lap-and-up-two-thirds grid__item">
				<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=London%20EC2A3AR%2C%20United%20Kingdom&key=AIzaSyDawMmrxNHx29kIGQTzZKElj-uE_8Jq02A"></iframe>

				<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

				<?php the_content(); ?>

				<div class="entry-links">
					<?php wp_link_pages(); ?>
				</div>
			</section>

			<aside class="address lap-and-up-one-third grid__item">
				<?php $options = get_option('mash_fourteen_theme_options'); ?>

				<?php 
					echo '<p>'.($options["address_line_1"]).'<br />'.($options["address_line_2"]).'<br />'.($options["address_line_3"]).'</p>';
					echo '<p>'.($options["phone_number"]).'</p>';
					echo '<p><a href='.($options["contact_email"]).'>'.($options["contact_email"]).'</a></p>'; 
				?>			
			</aside>
		</div>
	</article><!-- .grid -->

	<?php endwhile; endif; ?>

</section>


<section class="cf">

	<div class="map">
		MAP
	</div>


	
</section>

<?php get_footer(); ?>