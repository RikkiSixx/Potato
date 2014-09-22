<?php get_header(); ?>
	
	<header class="header">
		<h1 class="entry-title"><?php single_cat_title(); ?></h1>
	</header>

	<?php 
	//list terms in a given taxonomy using wp_list_categories (also useful as a widget if using a PHP Code plugin)

		$taxonomy     = 'service-type';
		$orderby      = 'count'; 
		$show_count   = 0;      // 1 for yes, 0 for no
		$pad_counts   = 0;      // 1 for yes, 0 for no
		$hierarchical = 1;      // 1 for yes, 0 for no
		$title        = '';

		$args = array(
		  'taxonomy'     => $taxonomy,
		  'orderby'      => $orderby,
		  'order'		 => DESC,
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

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>


	<article class="project-item <?php echo $class; ?>">		
			<section class="entry-content">
				<header class="header">
					<h3 class="entry-title">
						<a href="<?php the_permalink(); ?>"><span><?php the_title(); ?></span></a>
					</h3>
					<p class="service-performed"><?php echo get_the_term_list( $post->ID, 'service-type', '', ', ' ); ?></p>	
				</header>
				<?php // Featured project
				if($size == 'lg'):
					setup_postdata($arr_featured[$featured_pos[$count]]);
					the_post_thumbnail('project-lg');
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

	<?php endwhile; endif; ?>

</section>

<a href="<?php echo home_url(); ?>/work/" class="btn view-more">View all work</a>

<?php get_footer(); ?>