<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<title><?php wp_title("|", "1", "right"); ?><?php bloginfo('name'); ?></title>
		<meta http-equiv="content-type" content="text/html; charset=<?php bloginfo('charset'); ?>">

		<?php wp_head(); ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

		<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" />
		<!--[if lte IE 7]>
		<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_directory'); ?>/css/ie.css" />
		<![endif]-->
		<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<script type="text/javascript">document.documentElement.className += "js";</script>
	</head>
	<body>
		<ul class="ym-skiplinks">
			<li><a class="ym-skip" href="#nav"><?php _e("Skip to main navigation", 'sunlix') ?></a></li>
			<li><a class="ym-skip" href="#col3"><?php _e("Skip to content", 'sunlix') ?></a></li>
		</ul>
		<header>
			<div class="ym-wrapper">
				<h1><?php bloginfo('name'); ?></h1>
			</div>
		</header>
		<nav class="ym-hlist" id="nav">
			<div class="ym-wrapper">
				<h2 class="ym-hideme"><?php _e("Main navigation", 'sunlix') ?></h2>
				<?php
					wp_nav_menu(array(
						'theme_location' => 'nav-main',
						'container' => false,
						'items_wrap' => '<ul>%3$s</ul>',
						'depth' => 1
					));
				?>
			</div>
		</nav>
		<div class="ym-wrapper">