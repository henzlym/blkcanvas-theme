<!doctype html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<title><?php wp_title(''); ?><?php if(wp_title('', false)) { echo ' :'; } ?> <?php bloginfo('name'); ?></title>

		<link href="//www.google-analytics.com" rel="dns-prefetch">

		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="<?php bloginfo('description'); ?>">

		<?php wp_head(); ?>
		<script>
        // conditionizr.com
        // configure environment tests
        conditionizr.config({
            assets: '<?php echo get_template_directory_uri(); ?>',
            tests: {}
        });
        </script>

	</head>
	<body <?php body_class(); ?>>

		<?php get_template_part('template-parts/header/pre-header'); ?>
		<!-- header -->
		<header id="header" class="header inline clear" role="banner">

			<div class="container">
				<!-- logo -->
				<div class="logo">
					<?php blkcanvas_logo(); ?>
				</div>
				<!-- /logo -->

				<!-- nav -->
				<nav class="nav" role="navigation">
					<?php blkcanvas_nav(); ?>
				</nav>
				<!-- /nav -->

				<div class="hamburger">
					<div class="bar bar-1"></div>
					<div class="bar bar-2"></div>
					<div class="bar bar-3"></div>
				</div>
			</div>

		</header>
		<!-- /header -->
