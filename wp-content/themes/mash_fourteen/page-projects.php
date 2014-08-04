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
	// The third image should be a large featured image
	$count = 1;
	
	// Find posts in 'Projects' post type 
	$page = (get_query_var('p')) ? get_query_var('p') : 1;  
	$args = array(
		'posts_per_page' => 9,
		'post_type' => 'project',
		'paged' => 1
	);
	query_posts($args);
	
	// Get latest featured post
	$arr_featured = getFeaturedProjects(1);	
		
	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		$size = ($count == 2 && count($arr_featured)) ? 'lg' : 'sm';
		if($size == 'lg') {
			$class = 'desk-two-thirds';
		} else {
			$class = 'desk-one-third';
		}
		?>
		<article class="project-item <?php echo $class; ?> lap-one-half">		
			<section class="entry-content">
				<header class="header">
					<h3 class="entry-title">
						<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
					</h3>
					<?php echo get_the_term_list( $post->ID, 'service-type', 'Services: ', ', ' ); ?>
				</header>
				<?php // Featured project
				if(count($arr_featured) && $size == 'lg'):
					foreach($arr_featured as $i) {
						setup_postdata($i);
						the_post_thumbnail('project-lg');
					}
					wp_reset_postdata();
				else:
					// Standard projects
					if ( has_post_thumbnail() ) { ?>
						<?php the_post_thumbnail('project-sm'); ?>
					<?php } else { ?>
						<img src="<?php echo get_template_directory_uri(); ?>/img/placeholder-sm.jpg" width="100%" height="auto" />
					<?php } 
				endif; ?>
			</section>
		</article>
		<?php $count++;
	endwhile; endif; ?>

		<?php wp_reset_query(); ?>

	</section>

</section>

<?php get_footer(); ?>