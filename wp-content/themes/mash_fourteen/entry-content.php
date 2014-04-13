<section class="entry-content post-wrap cf">

	<div class="lap-one-third desk-two-thirds post-image">
		<?php if ( has_post_thumbnail() ) { the_post_thumbnail('project-lg'); } ?>
	</div>

	<div class="lap-two-thirds desk-one-third post-content">
		<?php the_content(); ?>
	</div>

	<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>