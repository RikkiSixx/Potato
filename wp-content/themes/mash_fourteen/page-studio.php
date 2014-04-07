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
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail('project-lg'); } ?>

			<?php the_content(); ?>

			<div class="entry-links">
				<?php wp_link_pages(); ?>
			</div>
		</section>

	</article>

	<?php endwhile; endif; ?>

	<div class="grid cf">
		<div class="grid__item lap-and-up-one-third studio-images-sm">
			<img src="<?php echo get_template_directory_uri(); ?>/img/studio-1.jpg" title="Studio" />
			<img src="<?php echo get_template_directory_uri(); ?>/img/studio-1.jpg" title="Studio" />
		</div>
		<div class="grid__item lap-and-up-two-thirds studio-images-lg">
			<img src="<?php echo get_template_directory_uri(); ?>/img/studio-3.jpg" title="Studio" />
		</div>
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

	<article class="cf grid bio">
		<div class="lap-two-thirds grid__item desk-one-third bio-info">
			<h3><?php the_title_attribute(); ?></h3>
			<?php the_excerpt(); ?>
		</div>

		<div class="lap-one-third grid__item desk-two-thirds bio-image">
			<?php if ( has_post_thumbnail() ) { the_post_thumbnail('project-lg'); } ?>
		</div>

	</article>
	<?php endwhile; endif; ?>

	<?php wp_reset_query(); ?>
</section>

<?php get_footer(); ?>