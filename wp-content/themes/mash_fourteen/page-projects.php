<?php
/*
Template Name: Projects List
*/
?>

<?php get_header(); ?>

<section role="main">
	
	<header class="header">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	</header>

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

	<section role="main" class="project-grid cf">

		<?php                  
	        $args = array(
	            'post_type' => 'project',
	            'posts_per_page' => 9
	        );
	        query_posts( $args );
	    ?>
		
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

		<article class="project-item desk-one-third lap-one-half">		

			<section class="entry-content">
				<header class="header">
					<h3 class="entry-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					</h3>
				</header>

				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail('project-sm'); ?>
				<?php } else { ?>
					<img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-sm.jpg" width="100%" height="auto" />
				<?php } ?>

				<?php // the_content(); ?>
			</section>

		</article>

		<?php endwhile; endif; ?>

		<?php wp_reset_query(); ?>

	</section>

</section>

<?php get_footer(); ?>