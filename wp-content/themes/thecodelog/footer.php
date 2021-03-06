<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage thecodelog
 * @since thecodelog 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		
		<div class="dg_grid_container">

			<div class="dg_grid_row">

				<div class="dg_grid_col col_12">

					<?php if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
						<aside class="container_sidebar_two">
							<div class="widget_area">
								<?php dynamic_sidebar( 'sidebar-2' ); ?>
							</div><!-- .widget-area -->
						</aside><!-- .content-bottom-1-widget -->
					<?php endif; ?>
					<?php if ( is_active_sidebar( 'sidebar-3' ) ) : ?>
						<aside class="container_sidebar_three">
							<div class="widget_area">
								<?php dynamic_sidebar( 'sidebar-3' ); ?>
							</div><!-- .widget-area -->
						</aside><!-- .content-bottom-2-widget -->
					<?php endif; ?>

					<?php if ( has_nav_menu( 'primary' ) ) : ?>
						<nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'thecodelog' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'primary',
									'menu_class'     => 'primary-menu',
								 ) );
							?>
						</nav><!-- .main-navigation -->
					<?php endif; ?>

					<?php if ( has_nav_menu( 'social' ) ) : ?>
						<nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'thecodelog' ); ?>">
							<?php
								wp_nav_menu( array(
									'theme_location' => 'social',
									'menu_class'     => 'social-links-menu',
									'depth'          => 1,
									'link_before'    => '<span class="screen-reader-text">',
									'link_after'     => '</span>',
								) );
							?>
						</nav><!-- .social-navigation -->
					<?php endif; ?>

					<!-- <div class="site-info"> -->
						<?php
							/**
							 * Fires before the thecodelog footer text for footer customization.
							 *
							 * put custom code or functions php here e.g.
							 * do_action( 'thecodelog_credits' );
							 */
						?>
						<!-- <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a> -->
					<!--</div>--><!-- .site-info -->

				</div>

			</div>

		</div>

	</footer><!-- .site-footer -->

</div><!-- .site -->

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/main.min.js"></script>

<?php wp_footer(); ?>

</div><!-- .wrapper -->

</body>
</html>
