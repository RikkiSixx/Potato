<?php get_header(); ?>

<section role="main">



	<p class="strap">Mash is a design agency specialising in bespoke solutions for the <a href="mash2014/legal-sector">legal</a> and <a href="mash2014/third-sector">third sector</a> industries.</p>
	
	<section class="project-grid cf">

		<?php
		// The third image should be a large featured image
		$count = 1;
		
		// Find posts in 'Projects' post type 
		$page = (get_query_var('p')) ? get_query_var('p') : 1;  
		$args = array(
			'posts_per_page' => 6,
			'post_type' => 'project',
			'paged' => 1
		);
		query_posts($args);
		
		// Get latest featured post
		$arr_featured = getFeaturedProjects(2);
		
		// Grid position of featured items [current item index => featured arr pos]
		$featured_pos = array(
			2 => 0,
			7 => 1
		);
				
		if ( have_posts() ) : while ( have_posts() ) : the_post(); 
			$size = (in_array($count, array_keys($featured_pos)) && isset($arr_featured[$featured_pos[$count]])) ? 'lg' : 'sm';
			if($size == 'lg') {
				$class = 'desk-two-thirds featured';
			} else {
				$class = 'desk-one-third';
			}
			?>
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
			<?php $count++;
		endwhile; endif; ?>
		
		<?php wp_reset_query(); ?>

	</section>
	
</section>

<a href="<?php echo home_url(); ?>/work/" class="btn view-more">View all work</a>



<?php get_footer(); ?>