<?php

/* REGISTRATION
--------------------------------------------------------------------------------*/

function theme_options_init() {
	if ( false === get_theme_options_array() )
		add_option( THEME_SLUG . '_theme_options', get_theme_options_default() );
	register_setting( THEME_SLUG . '_theme_options', THEME_SLUG . '_theme_options', 'theme_options_validate' );
}
add_action( 'admin_init', 'theme_options_init' );

function theme_options_capability( $capability ) {
	return 'edit_theme_options';
}
add_filter( 'option_page_capability_twentyeleven_options', 'theme_options_capability' );

function theme_options_add_page() {
	$options_page = add_theme_page( __( 'Theme Options', THEME_SLUG ), __( 'Theme Options', THEME_SLUG ), 'edit_theme_options', 'theme_options', 'theme_options_render_page' );	
	if ( ! $options_page )
		return;	
	$help = '';	
	add_contextual_help( $options_page, $help );
	add_action( 'admin_print_styles-' . $options_page, 'theme_options_enqueue_scripts' );
}
add_action( 'admin_menu', 'theme_options_add_page' );

function theme_options_enqueue_scripts() {
	//wp_enqueue_style( 'theme-options', get_template_directory_uri() . '/admin/theme-options.css', false );
	//wp_enqueue_script( 'theme-options', get_template_directory_uri() . '/admin/theme-options.js', false );
}



/* HELPERS
--------------------------------------------------------------------------------*/

function get_theme_options_array() {
	return get_option( THEME_SLUG . '_theme_options', get_theme_options_default() );
}

function get_theme_options_value( $key ) {
	$theme_options = get_option( THEME_SLUG . '_theme_options' );
	if ( $theme_options[$key] !== false ) {
		return $theme_options[$key];
	} else {
		return false;
	}
}

function get_theme_options_default() {
	$default_options = array(
		'phone_number' => '',
		'contact_email' => '',
		'address_line_1' => '',
		'address_line_2' => '',
		'address_line_3' => '',
		'connect_facebook' => '',
		'connect_twitter' => '',
		'connect_behance' => ''
	);
	return $default_options;
}

function theme_options_validate( $input ) {
	$valid_options = get_theme_options_array();
	$default_options = get_theme_options_default();
	$valid_options['phone_number'] = wp_filter_nohtml_kses( $input['phone_number'] );
	$valid_options['contact_email'] = wp_filter_nohtml_kses( $input['contact_email'] );
	$valid_options['address_line_1'] = wp_filter_nohtml_kses( $input['address_line_1'] );
	$valid_options['address_line_2'] = wp_filter_nohtml_kses( $input['address_line_2'] );
	$valid_options['address_line_3'] = wp_filter_nohtml_kses( $input['address_line_3'] );

	$valid_options['connect_facebook'] = wp_filter_nohtml_kses( $input['connect_facebook'] );
	$valid_options['connect_twitter'] = wp_filter_nohtml_kses( $input['connect_twitter'] );	
	$valid_options['connect_behance'] = wp_filter_nohtml_kses( $input['connect_behance'] );
	return $valid_options;
}

/* RENDERING
--------------------------------------------------------------------------------*/

function theme_options_render_page() {
	?>
	<div class="wrap">
	
		<?php screen_icon(); ?>
		<h2><?php printf( __( '%s Theme Options', THEME_SLUG ), get_current_theme() ); ?></h2>
		<?php settings_errors(); ?>

		<form method="post" action="options.php">
			<?php 
			settings_fields( THEME_SLUG . '_theme_options' );
			$options = get_theme_options_array();
			$default_options = get_theme_options_default();
			?>


			<h3><?php _e( 'Contact Information', THEME_SLUG ); ?></h3>
			<table class="form-table">			
				
				<tr valign="top"><th scope="row"><label for="<?php echo THEME_SLUG; ?>_theme_options[phone_number]"><?php _e( 'Phone Number', THEME_SLUG ); ?></label></th>
					<td>
						<input id="<?php echo THEME_SLUG; ?>_theme_options[phone_number]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[phone_number]" value="<?php esc_attr_e( $options['phone_number'] ); ?>" />
						<br/><small><?php _e( 'This phone number will be displayed in the CTA in the header, and in the footer.', THEME_SLUG ); ?></small>
					</td>
				</tr>                                                                
				
				<tr valign="top"><th scope="row"><label for="<?php echo THEME_SLUG; ?>_theme_options[contact_email]"><?php _e( 'Contact Email Address', THEME_SLUG ); ?></label></th>
					<td>
						<input id="<?php echo THEME_SLUG; ?>_theme_options[contact_email]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[contact_email]" value="<?php esc_attr_e( $options['contact_email'] ); ?>" />
						<br/><small><?php _e( 'This email address will be shown in the footer.', THEME_SLUG ); ?></small>
					</td>
				</tr>			
				
				<tr valign="top"><th scope="row"><label for="<?php echo THEME_SLUG; ?>_theme_options[address_line_1]"><?php _e( 'Contact Email Address', THEME_SLUG ); ?></label></th>
					<td>
						<input id="<?php echo THEME_SLUG; ?>_theme_options[address_line_1]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[address_line_1]" value="<?php esc_attr_e( $options['address_line_1'] ); ?>" />
						<br/>
						<input id="<?php echo THEME_SLUG; ?>_theme_options[address_line_2]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[address_line_2]" value="<?php esc_attr_e( $options['address_line_2'] ); ?>" />
						<br />
						<input id="<?php echo THEME_SLUG; ?>_theme_options[address_line_3]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[address_line_3]" value="<?php esc_attr_e( $options['address_line_3'] ); ?>" />
						<br /><small><?php _e( 'This email address will be shown in the footer.', THEME_SLUG ); ?></small>
					</td>
				</tr>	

			</table>

			<?php submit_button(); ?>



			
			<h3><?php _e( 'Social Media', THEME_SLUG ); ?></h3>
			<table class="form-table">			
				
				<tr valign="top"><th scope="row"><label for="<?php echo THEME_SLUG; ?>_theme_options[connect_facebook]"><?php _e( 'Facebook URL', THEME_SLUG ); ?></label></th>
					<td>
						<input id="<?php echo THEME_SLUG; ?>_theme_options[connect_facebook]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[connect_facebook]" value="<?php esc_attr_e( $options['connect_facebook'] ); ?>" />
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><label for="<?php echo THEME_SLUG; ?>_theme_options[connect_twitter]"><?php _e( 'Twitter URL', THEME_SLUG ); ?></label></th>
					<td>
						<input id="<?php echo THEME_SLUG; ?>_theme_options[connect_twitter]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[connect_twitter]" value="<?php esc_attr_e( $options['connect_twitter'] ); ?>" />
					</td>
				</tr>
				
				<tr valign="top"><th scope="row"><label for="<?php echo THEME_SLUG; ?>_theme_options[connect_behance]"><?php _e( 'Behance URL', THEME_SLUG ); ?></label></th>
					<td>
						<input id="<?php echo THEME_SLUG; ?>_theme_options[connect_behance]" class="regular-text" type="text" name="<?php echo THEME_SLUG; ?>_theme_options[connect_behance]" value="<?php esc_attr_e( $options['connect_behance'] ); ?>" />
					</td>
				</tr>
	
			</table>

			<?php submit_button(); ?>
			
			
		</form>
	</div>
	<?php
}