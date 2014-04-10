			<div class="clear"></div>
			
		</div><!-- .container -->

		<footer class="site-footer" role="contentinfo">
			<div class="container">
				<div class="cf grid">

					<div class="grid__item desk-one-quarter lap-one-half foot-item">
						<h3>Recent Projects</h3>
						<ul>
							<?php                  
						        $args = array(
						            'post_type' => 'project',
						            'posts_per_page' => 5
						        );
						        query_posts( $args );
						    ?>
							<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li> 
							<?php endwhile; endif; ?>
							<?php wp_reset_query(); ?>						
						</ul>
					</div>

					<div class="grid__item desk-one-quarter lap-one-half foot-item">
						<h3>Navigate</h3>
						
						<?php wp_nav_menu( array( 
							'theme_location' => 'main-menu', 
							'container' => false,
							'menu_class' => ''
						) ); ?>
					</div>

					<div class="grid__item desk-one-quarter lap-one-half foot-item foot-address">
						<h3>Connect</h3>
						<?php $options = get_option('mash_fourteen_theme_options'); ?>
						<ul>
							<li>Newsletter</li>
							<li><a href="http://www.facebook.com/<?php echo ($options['connect_facebook']); ?>" title="Facebook">Facebook</a></li>
							<li><a href="http://www.twitter.com/<?php echo ($options['connect_twitter']); ?>" title="Twitter">Twitter</a></li>
							<li><a href="http://www.behance.com/<?php echo ($options['connect_behance']); ?>" title="Behance">Behance</a></li>
						</ul>
					</div>

					<div class="grid__item desk-one-quarter lap-one-half foot-item">						
						<?php 
							echo '<p>'.($options["address_line_1"]).'<br />'.($options["address_line_2"]).'<br />'.($options["address_line_3"]).'</p>';
							echo '<p>Telephone: '.($options["phone_number"]).'<br />';
							echo 'Email: <a href='.($options["contact_email"]).'>'.($options["contact_email"]).'</a></p>'; 
						?>	
					</div>

				</div>

				
				<p><?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'mash_fourteen' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?> <?php echo sprintf( __( ' Theme developed by %1$s.', 'mash_fourteen' ), '<a href="http://www.rikkendell.co.uk/">Rik Kendell</a>' ); ?></p>
				

			</div><!-- .container -->
		</footer><!-- .site-footer -->

		<?php wp_footer(); ?>

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/jquery.flexnav.min.js"></script>
		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/scripts.js"></script>

	</body>

</html>