			<div class="clear"></div>
			
		</div><!-- #container .wrapper -->

		<footer class="site-footer" role="contentinfo">
			<div class="wrapper">
				<div class="cf">

					<ul>
						<li>
							<h3>Recent Projects</h3>
						</li>
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