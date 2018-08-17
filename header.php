<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
	<link rel="profile" href="http://gmpg.org/xfn/11">

</head>

<body <?php body_class(); ?>>
	<!-- Header -->
	<header>
		<div>
			<a href="#"><img src="<?php get_stylesheet_directory()?>. assets/common/logo.svg" alt=""></a>
			
		</div>
	</header>

	<!-- Navigation -->
	<nav>
		<?php
		wp_nav_menu( array(                     
			'theme_location'  => 'primary',
			'menu_id' => 'primary-menu',
			'depth'             => 3,
			'menu_class'        => 'nav',
			'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
		));
		?>
	</nav>
	
	<!-- Main -->
	<main>
