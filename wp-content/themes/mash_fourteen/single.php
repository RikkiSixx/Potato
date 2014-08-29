<?php get_header(); ?>

<section role="main">

	<header class="header">
		<h1 class="entry-title">Blog</h1>
	</header>

	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
		
		<article <?php post_class(); ?>>

			<header>			
				<h4 class="entry-title"><?php the_title(); ?></h4>
				<?php // get_template_part( 'entry-meta' ); ?>
			</header>

			<section class="entry-content post-wrap cf">
				<div class="post-content-wrap">
					<?php the_content(); ?>
				</div>

				<div class="post-img-wrap">
					<?php if ( has_post_thumbnail() ) { the_post_thumbnail('project-lg'); } ?>
					
					<?php the_secondary_content('Post Images' ) ?>
				</div>

				<div class="entry-links"><?php wp_link_pages(); ?></div>
			</section><!-- .entry-content -->

		</article>

	<?php endwhile; endif; ?>

	<a href="<?php echo home_url(); ?>/blog/" class="btn view-more">Back to Blog</a>
</section>

<?php get_footer(); ?>