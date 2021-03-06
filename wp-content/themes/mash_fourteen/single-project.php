<?php
/*
Template Name: Project Detail
*/
?>

<?php get_header(); ?>

<section class="post-wrap" role="main">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
	
		<article <?php post_class(); ?>>

			<header>
				<h1 class="entry-title"><?php the_title(); ?></h1>
			</header>


			<section class="entry-content post-wrap cf">

				<?php // if ( has_post_thumbnail() ) { the_post_thumbnail('project-lg'); } ?>

				<div class="post-content-wrap">
					<?php the_content(); ?>
				</div>

				<div class="post-img-wrap">
					<?php the_secondary_content('Project Images' ) ?>
				</div>

				<div class="entry-links"><?php wp_link_pages(); ?></div>
			</section>

		</article>

	<?php endwhile; endif; ?>

	<a href="<?php echo home_url(); ?>/work/" class="btn view-more">View all work</a>

</section>

<?php get_footer(); ?>