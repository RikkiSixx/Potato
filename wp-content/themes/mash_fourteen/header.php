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

		<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>		

		<header class="site-header" role="banner">

			<div class="wrapper">

				<nav id="menu" role="navigation">
					<?php wp_nav_menu( array( 
						'theme_location' => 'main-menu', 
						'container' => false,
						'menu_class' => 'nav nav--block'
						) ); ?>
				</nav>

				<section id="branding">
					<h1 class="logo ir"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php esc_attr_e( get_bloginfo( 'name' ), 'mash_fourteen' ); ?>" rel="home"><?php echo esc_html( get_bloginfo( 'name' ) ); ?></a></h1>
				</section><!-- #branding -->

			</div>
			
		</header>

		<div id="container" class="wrapper">