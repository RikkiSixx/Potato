			<div class="clear"></div>
			
		</div><!-- .wrapper -->

		<footer class="site-footer" role="contentinfo">
			<div class="container">
				<div class="cf">

					<ul>
						<li>
							<h3>Recent Projects</h3>
						</li>

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

					<ul>
						<li>
							<h3>Navigate</h3>
						</li>
					</ul>

					<ul>
						<li>
							<h3>Connect</h3>
						</li>
					</ul>

					<div>
						<?php $options = get_option('mash_fourteen_theme_options'); ?>
						<?php 
							echo '<p>'.($options["address_line_1"]).'<br />'.($options["address_line_2"]).'<br />'.($options["address_line_3"]).'</p>';
							echo '<p>Telephone: '.($options["phone_number"]).'<br />';
							echo 'Email: <a href='.($options["contact_email"]).'>'.($options["contact_email"]).'</a></p>'; 
						?>	
					</div>

				</div>

				<div>
					<p><?php echo sprintf( __( '%1$s %2$s %3$s. All Rights Reserved.', 'mash_fourteen' ), '&copy;', date( 'Y' ), esc_html( get_bloginfo( 'name' ) ) ); ?></p>
					<p><?php echo sprintf( __( ' Theme developed by %1$s.', 'mash_fourteen' ), '<a href="http://www.rikkendell.co.uk/">Rik Kendell</a>' ); ?></p>
				</div>

			</div><!-- .container -->
		</footer><!-- .site-footer -->

		<?php wp_footer(); ?>

	</body>

</html>