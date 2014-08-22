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
	<title><?php wp_title( '|', true, 'right' ); ?></title>


	<!--[if IE 7 ]>
	<html class="ie7"> <![endif]-->
	<!--[if IE 8 ]>
	<html class="ie8"> <![endif]-->
	<!--[if IE 9 ]>
	<html class="ie9"> <![endif]-->

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

	<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.png"/>

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

<div id="top_wrapper">

	<div class="content_wrapper">

		<div class="topsubmenu">

			<?php wp_nav_menu( array( 'theme_location' => 'topmenu' ) ) ?>

		</div>
		<!-- .topsubmenu -->

		<div id="searchbox">

			<form role="search" method="get" id="searchform" action="#">

				<input type="text" value="search" id="searchBox" name="s"
				       onblur="if(this.value == '') { this.value = 'search'; }"
				       onfocus="if(this.value == 'search') { this.value = ''; }">
				<span class="searchme"></span>
			</form>

		</div>
		<!-- .searchbox -->

	</div>
	<!-- .content_wrapper -->

	<div class="clear"></div>

</div>
<!-- .top_wrapper -->

<div id="header_wrapper">

	<div class="content_wrapper">

		<div id="logo">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img
					src="<?php echo TEMPLATE_PATH_URI . 'img/toplogo.png' ?>" width="213" height="33"
					alt="Business Essentials"/></a>

		</div>
		<!-- .logo -->

		<div class="topmenuwrapper">

			<nav class="topmenu">

				<?php wtm_process_nav_menu(); ?>

			</nav>
			<!-- .topmenu -->

			<div class="header_phone">

				Toll Free: 0800 123 456 7890

			</div>
			<!-- .header_phone -->

			<div class="clear"></div>
		</div>
		<!-- .topmenuwrapper -->

	</div>
	<!-- .content_wrapper -->

</div>
<!-- .header_wrapper -->
