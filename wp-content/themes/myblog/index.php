<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * e.g., it puts together the home page when no home.php file exists.
 *
 * Learn more: {@link https://codex.wordpress.org/Template_Hierarchy}
 *
 * @package WordPress
 * @subpackage myblog
 * @since myblog 1.0
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container_hero">

				<div class="dg_grid_container">

					<div class="dg_grid_row">

						<div class="dg_grid_col col_12">
							<h1><?php echo get_bloginfo('name'); ?></h1>
							<p><?php echo get_bloginfo('description'); ?></p>
						</div>

					</div>

				</div>

			</div>

			<div class="container_main_content">

				<div class="dg_grid_container">

					<div class="dg_grid_row">

						<div class="dg_grid_col col_12">

							<?php if ( have_posts() ) : ?>

								<!--<?php if ( is_home() && ! is_front_page() ) : ?>
									<header>
										<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
									</header>
								<?php endif; ?>-->

								<?php
								// Start the loop.
								while ( have_posts() ) : the_post();

									/*
									 * Include the Post-Format-specific template for the content.
									 * If you want to override this in a child theme, then include a file
									 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
									 */
									get_template_part( 'content', get_post_format() );

								// End the loop.
								endwhile; ?>

								<?php if( show_page_nav() ) : ?>
									<nav class="container_page_nav">
										<div class="pagination_loop">
											<?php 
												// Previous/next page navigation. 
												the_posts_pagination( array(
													'prev_text' => __( 'Prev', 'myblog' ),
													'next_text' => __( 'Next', 'myblog' )
												) );
											?>
										</div>
									</nav>
								<?php endif; ?>

								<div class="container_search">

									<form role="search" method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
										<!-- <label> -->
											<!-- <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label', 'myblog' ); ?></span> -->
										<input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'myblog' ); ?>" value="<?php echo get_search_query(); ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label', 'myblog' ); ?>" />
										<!-- </label> -->
										<button type="submit" class="search-submit button">
											<!-- <span class="screen-reader-text"><?php echo _x( 'Search', 'submit button', 'myblog' ); ?></span> -->
											<i class="genericon genericon-search"></i>
										</button>
									</form>

								</div>

							<?php

							// If no content, include the "No posts found" template.
							else :
								get_template_part( 'content', 'none' );

							endif;
							?>

						</div>

					</div>
					
				</div>

			</div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
