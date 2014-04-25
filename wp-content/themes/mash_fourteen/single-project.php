<?php
/*
Template Name: Project Detail
*/
?>

<?php get_header(); ?>

<section class="post-wrap" role="main">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<?php get_template_part( 'entry' ); ?>

	<?php endwhile; endif; ?>

	<footer class="footer">
		<?php get_template_part( 'nav', 'below-single' ); ?>
	</footer>

</section>

<?php get_footer(); ?>