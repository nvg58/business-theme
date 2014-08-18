<?php
/**
 * The header for the theme
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wtm_
 */
?><!doctype html>
<html <?php language_attributes(); ?>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php wp_title( '|', true, 'right' ); bloginfo( 'name' )?></title>

	<!--[if IE 7 ]>    <html class= "ie7"> <![endif]-->
	<!--[if IE 8 ]>    <html class= "ie8"> <![endif]-->
	<!--[if IE 9 ]>    <html class= "ie9"> <![endif]-->

	<!--[if lt IE 9]>
	<script>
		document.createElement('header');
		document.createElement('nav');
		document.createElement('section');
		document.createElement('article');
		document.createElement('aside');
		document.createElement('footer');
	</script>
	<![endif]-->

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png" />

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<!-- Start of top wrapper -->
<div id="top_wrapper">

	<!-- Start of content wrapper -->
	<div class="content_wrapper">

		<!-- Start of topsubmenu -->
		<div class="topsubmenu">

			<ul>
				<li><a href="#">Work With Us</a></li>
				<li><a href="#">Development Cycle</a></li>
				<li><a href="#">Affiliates</a></li>
				<li><a href="#">Client Login</a></li>
			</ul>

		</div><!-- End of topsubmenu -->

		<!-- Start of searchbox -->
		<div id="searchbox">

			<!-- Start of search box -->

			<form role="search" method="get" id="searchform" action="#">

				<input type="text" value="search" id="searchBox" name="s" onblur="if(this.value == '') { this.value = 'search'; }" onfocus="if(this.value == 'search') { this.value = ''; }">
				<span class="searchme"></span>
			</form>

			<!-- End of searchbox -->

		</div><!-- End of searchbox -->

	</div><!-- End of content wrapper -->

	<!-- Clear Fix --><div class="clear"></div>

</div><!-- End of top wrapper -->

<!-- Start of header wrapper -->
<div id="header_wrapper">

	<!-- Start of content wrapper -->
	<div class="content_wrapper">

		<!-- Start of logo -->
		<div id="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_template_directory_uri() . '/img/toplogo.png' ?>" width="213" height="33" alt="Business Essentials" /></a>

		</div><!-- End of logo -->

		<!-- Start of top menu wrapper -->
		<div class="topmenuwrapper">

			<!-- Start of topmenu -->
			<nav class="topmenu">

				<?php wtm_process_nav_menu(); ?>

			</nav>
			<!-- End of topmenu -->

			<!-- Start of header phone -->
			<div class="header_phone">
				Toll Free: 0800 123 456 7890

			</div><!-- End of header phone -->

			<!-- Clear Fix --><div class="clear"></div>
		</div><!-- End of top menu wrapper -->

	</div><!-- End of content wrapper -->

</div><!-- End of header wrapper -->

