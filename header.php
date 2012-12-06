<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">
		<title><?php wp_title("|", "1", "right"); ?><?php bloginfo('name'); ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<?php wp_head(); ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
		<!--[if lte IE 7]>
		<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/iehacks.css" />
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
	</head>
	<body>
		<ul class="ym-skiplinks">
			<li><a class="ym-skip" href="#nav-main"><?php _e("Skip to main navigation", 'sunlix') ?></a></li>
			<li><a class="ym-skip" href="#nav-meta"><?php _e("Skip to meta navigation", 'sunlix') ?></a></li>
			<li><a class="ym-skip" href="#main"><?php _e("Skip to content", 'sunlix') ?></a></li>
		</ul>
		<header>
			<div class="ym-wrapper ym-clearfix">
				<h1><?php bloginfo('name'); ?></h1>
			</div>
		</header>
		<nav id="nav-main" class="ym-hlist">
			<div class="ym-wrapper ym-clearfix">
				<h2 class="ym-hideme"><?php _e("Main navigation", 'sunlix') ?></h2>
				<?php
					wp_nav_menu(array(
						'theme_location'	=> 'nav-main',
						'container'			=> false,
						'items_wrap'		=> '<ul class="linearize-level-2">%3$s</ul>',
						'depth'				=> 1
					));
				?>
				<a href="#main" id="top"><?php _e("To top", "sunlix") ?></a>
			</div>
		</nav>
		<div id="main" class="ym-wrapper ym-clearfix">
