<?php get_header(); ?>

<section role="main">
	<?php 
	//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

		$taxonomy     = 'service-type';
		$orderby      = 'name'; 
		$show_count   = 0;      // 1 for yes, 0 for no
		$pad_counts   = 0;      // 1 for yes, 0 for no
		$hierarchical = 1;      // 1 for yes, 0 for no
		$title        = '';

		$args = array(
		  'taxonomy'     => $taxonomy,
		  'orderby'      => $orderby,
		  'show_count'   => $show_count,
		  'pad_counts'   => $pad_counts,
		  'hierarchical' => $hierarchical,
		  'title_li'     => $title
		);
	?>
	<nav class="sub-menu">
		<ul class="nav">
			<?php wp_list_categories( $args ); ?>
		</ul>
	</nav>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		<?php get_template_part( 'entry-content' ); ?>
	<?php endwhile; endif; ?>

</section>

<?php get_footer(); ?>