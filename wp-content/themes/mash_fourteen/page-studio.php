<?php
/*
Template Name: Studio
*/
?>

<?php get_header(); ?>

<section id="content" role="main">
	
	<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="header">
			<h1 class="entry-title"><?php the_title(); ?></h1> <?php edit_post_link(); ?>
		</header>

		<section class="entry-content">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

			<?php the_content(); ?>

			<div class="entry-links">
				<?php wp_link_pages(); ?>
			</div>
		</section>

	</article>

	<?php endwhile; endif; ?>

</section>



<section>
	<?php                  
        $args = array(
            'post_type' => 'person',
            'posts_per_page' => 5
        );
        query_posts( $args );
    ?>

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

	<article>
		<h2><?php the_title_attribute(); ?></h2>
		<?php the_content(); ?>

		<?php if ( has_post_thumbnail() ) { the_post_thumbnail(); } ?>

	</article>
	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>
</section>

<?php get_footer(); ?>