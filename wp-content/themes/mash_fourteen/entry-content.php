<section class="entry-content post-wrap cf">

	<?php if ( has_post_thumbnail() ) { the_post_thumbnail('project-lg'); } ?>

	<?php the_content(); ?>

	<div class="entry-links"><?php wp_link_pages(); ?></div>
</section>