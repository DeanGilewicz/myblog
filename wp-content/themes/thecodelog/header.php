<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage thecodelog
 * @since thecodelog 1.0
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto+Mono|Rubik:900" />
	<link rel="stylesheet" type="text/css" href="<?= get_stylesheet_directory_uri(); ?>/dist/css/main.min.css" />
	<!-- <link rel="profile" href="http://gmpg.org/xfn/11"> -->
	<!-- <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>"> -->
	<!--[if lt IE 9]>
	<script src="<?php echo esc_url( get_template_directory_uri() ); ?>/js/html5.js"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	
	<!-- <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'thecodelog' ); ?></a> -->
	
	<div class="container_global_menu">

		<nav>

			<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
				<!-- <label> -->
					<!-- <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'thecodelog' ); ?></span> -->
				<div class="container_search_input">
					<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'thecodelog' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'thecodelog' ); ?>" />
					<!-- </label> -->
					<button type="submit" class="search-submit button">
						<!-- <span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'thecodelog' ); ?></span> -->
						<i class="genericon genericon-search"></i>
					</button>
				</div>
			</form>

			<ul>
				<li class="<?php if( is_home() ) { echo 'current-cat'; } ?>">
	                <a href="/">home</a>
	            </li>
				<li class="<?php if( is_page('about-me') ) { echo 'current-cat'; } ?>">
	                <a href="/about-me" class="">about me</a>
	            </li>
			<?php 
				wp_list_categories( array(
					'orderby' => 'name',
					'title_li' => '',
					'hide_title_if_empty' => true
				) );
			?>
			</ul>
	    </nav>

		<div id="sidebar" class="sidebar">
			<header id="masthead" class="site-header" role="banner">

			    <!--
				<div class="site-branding">
					<?php
						// twentyfifteen_the_custom_logo();

						if ( is_front_page() && is_home() ) : ?>
							<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
						<?php else : ?>
							<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
						<?php endif;

						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<p class="site-description"><?php echo $description; ?></p>
						<?php endif;
					?>
					<button class="secondary-toggle"><?php _e( 'Menu and widgets', 'thecodelog' ); ?></button>
				</div>--><!-- .site-branding -->

			</header><!-- .site-header -->

			<?php get_sidebar(); ?>
		</div><!-- .sidebar -->

	</div>

	<div id="content" class="site-content">

		<div class="container_main_header">

			<div class="dg_grid_container">

				<div class="dg_grid_row">

					<div class="dg_grid_col col_12 container_js_trigger_menu">
						<i class="genericon genericon-menu js-trigger-menu"></i>
						<a href="/" title="the code log" class="logo_site">
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/logo-tcl-stacked@2x.png" alt="the code log logo" class="small"/>
							<img src="<?= get_stylesheet_directory_uri(); ?>/dist/images/logo-tcl-flat@2x.png" alt="the code log logo" class="medium" />
						</a>
					</div>

				</div>

			</div>

		</div>
