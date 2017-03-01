<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package WordPress
 * @subpackage myblog
 * @since myblog 1.0
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container_main_content">

				<div class="container_hero">

					<div class="dg_grid_container">

						<div class="dg_grid_row">

							<div class="dg_grid_col col_12">

								<section class="error-404 not-found">
									<header class="page-header">
										<h1 class="page-title"><?php _e( 'Oops! That page can&rsquo;t be found.', 'myblog' ); ?></h1>
									</header><!-- .page-header -->

									<div class="page-content">
										<div class="container_not_found_content">
											<!-- <p><?php _e( 'It looks like nothing was found at this location. Maybe try a search?', 'myblog' ); ?></p> -->
											<p>It looks like nothing was found at this location. Maybe try a search?</p>
										</div>

										<?php // get_search_form(); ?>

										<div class="container_search">

											<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
												<!-- <label> -->
													<!-- <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'myblog' ); ?></span> -->
												<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'myblog' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'myblog' ); ?>" />
												<!-- </label> -->
												<button type="submit" class="search-submit button">
													<!-- <span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'myblog' ); ?></span> -->
													s
												</button>
											</form>

										</div>

									</div><!-- .page-content -->
								</section><!-- .error-404 -->

							</div>

						</div>

					</div>

				</div>

			</div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
