<!DOCTYPE html>

<!--[if lt IE 7]> <html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 7]> <html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>> <![endif]-->
<!--[if IE 8]> <html class="no-js lt-ie9" <?php language_attributes(); ?>> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" <?php language_attributes(); ?>> <!--<![endif]-->

	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width" />

		<title><?php wp_title( ' | ', true, 'right' ); ?></title>
		
		<!-- CSS -->
		<link rel="stylesheet" type="text/css" href="<?php echo get_template_directory_uri(); ?>/css/style.css" />

		<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/libs/modernizr-2.6.1.min.js"></script>
	
		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>		

		<header class="site-header container cf" role="banner">
					
				<h1 class="logo ir">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'mash_fourteen' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a>
				</h1>

				<a class="menu-button">
					<svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="29px" height="21px" viewBox="0 0 29 21" enable-background="new 0 0 29 21" xml:space="preserve">
						<rect width="29" height="3"/>
						<rect y="9" width="29" height="3"/>
						<rect y="18" width="29" height="3"/>
					</svg>
				</a>

				<nav class="main-menu" role="navigation">

					<?php wp_nav_menu( array( 
						'theme_location' => 'main-menu', 
						'container' => false,
						'menu_class' => 'nav'
					) ); ?>
				</nav>
			
		</header><!-- .site-header -->

		<div class="container">