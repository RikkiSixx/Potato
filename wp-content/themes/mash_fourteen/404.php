<?php get_header(); ?>

<section role="main">
	<article id="post-0" class="post not-found">

		<header class="header">
			<h1 class="entry-title"><?php _e( 'Page not found', 'mash_fourteen' ); ?></h1>
		</header>

		<section class="entry-content">
			<p><?php _e( "We didn't find the page you're looking for. Try a search instead?", 'mash_fourteen' ); ?></p>
			<?php get_search_form(); ?>
		</section>

	</article>
</section>

<?php get_footer(); ?>