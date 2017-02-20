<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the "site-content" div and all content after.
 *
 * @package WordPress
 * @subpackage myblog
 * @since myblog 1.0
 */
?>

	</div><!-- .site-content -->

	<footer id="colophon" class="site-footer" role="contentinfo">
		<?php // if ( has_nav_menu( 'primary' ) ) : ?>
			<!-- <nav class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Primary Menu', 'twentysixteen' ); ?>"> -->
				<?php
					// wp_nav_menu( array(
					// 	'theme_location' => 'primary',
					// 	'menu_class'     => 'primary-menu',
					//  ) );
				?>
			<!-- </nav> --><!-- .main-navigation -->
		<?php // endif; ?>

		<?php // if ( has_nav_menu( 'social' ) ) : ?>
			<!-- <nav class="social-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Footer Social Links Menu', 'twentysixteen' ); ?>"> -->
				<?php
					// wp_nav_menu( array(
					// 	'theme_location' => 'social',
					// 	'menu_class'     => 'social-links-menu',
					// 	'depth'          => 1,
					// 	'link_before'    => '<span class="screen-reader-text">',
					// 	'link_after'     => '</span>',
					// ) );
				?>
			<!-- </nav> --><!-- .social-navigation -->
		<?php // endif; ?>

		<div class="site-info">
			<?php
				/**
				 * Fires before the myblog footer text for footer customization.
				 *
				 * put custom code or functions php here e.g.
				 * do_action( 'myblog_credits' );
				 */
				
			?>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a>
		</div><!-- .site-info -->
	</footer><!-- .site-footer -->

</div><!-- .site -->

<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri(); ?>/dist/js/main.min.js"></script>

<?php wp_footer(); ?>

</body>
</html>
