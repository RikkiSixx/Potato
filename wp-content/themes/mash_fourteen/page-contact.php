<?php
/*
Template Name: Contact
*/
?>

<?php get_header(); ?>

<section role="main">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article <?php post_class(); ?>>
		<header class="header">
			<h1 class="entry-title"><?php the_title(); ?></h1>
		</header>

		<div class="entry-content grid">

			<div class="row cf">

				<div class="intro lap-and-up-two-thirds grid__item">
					<?php the_content(); ?>
				</div>				

				<aside class="address lap-and-up-one-third grid__item">
					<?php $options = get_option('mash_fourteen_theme_options'); ?>

					<?php 
						echo '<p>'.($options["address_line_1"]).'<br />'.($options["address_line_2"]).'<br />'.($options["address_line_3"]).'</p>';
						echo '<p>'.($options["phone_number"]).'</p>';
						echo '<p><a href='.($options["contact_email"]).'>'.($options["contact_email"]).'</a></p>'; 
					?>			
				</aside>
			</div>	

			<div class="row cf">		

				<div class=" map-canvas lap-and-up-two-thirds grid__item">
					<iframe width="100%" height="450" frameborder="0" style="border:0" src="https://www.google.com/maps/embed/v1/place?q=London%20EC2A3AR%2C%20United%20Kingdom&key=AIzaSyDawMmrxNHx29kIGQTzZKElj-uE_8Jq02A"></iframe>
				</div>

				<div class="contact-imgs lap-and-up-one-third grid__item">
					<img src="<?php echo get_template_directory_uri(); ?>/img/studio-1.jpg" title="Studio" />
					<img src="<?php echo get_template_directory_uri(); ?>/img/studio-1.jpg" title="Studio" />
				</div>

			</div>

			
		</div>
	</article><!-- .grid -->

	<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>