<?php get_header(); ?>

<h2 class="strap">Mash is a full service creative design agency based in Shoreditch, London.</h2>

<section role="main" class="project-grid cf">
	
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
					<p class="service-performed"><?php echo get_the_term_list( $post->ID, 'service-type', 'Services: ', ', ' ); ?></p>				
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
	
	<!-- <div style="position:relative; top:-33px">
		<div class="nav-previous"><a href="/?p=2">More</a></div>
	</div> -->
	
	<?php wp_reset_query(); ?>
	
</section>

<?php get_footer(); ?>