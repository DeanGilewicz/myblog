<?php
/**
 * The template for displaying search results pages.
 *
 * @package WordPress
 * @subpackage myblog
 * @since myblog 1.0
 */
?>

<?php get_header(); ?>

	<section id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<div class="container_main_content">

				<div class="dg_grid_container">

					<div class="dg_grid_row">

						<div class="dg_grid_col col_12">

							<?php if ( have_posts() ) : ?>

								<header class="page-header">
									<h1 class="page-title search_term"><?php printf( __( 'Search Results for: %s', 'myblog' ), get_search_query() ); ?></h1>
								</header><!-- .page-header -->

								<?php
								// Start the loop.
								while ( have_posts() ) : the_post(); ?>

									<?php
									/*
									 * Run the loop for the search to output the results.
									 * If you want to overload this in a child theme then include a file
									 * called content-search.php and that will be used instead.
									 */
									get_template_part( 'content', 'search' );

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
	</section><!-- .content-area -->

<?php get_footer(); ?>
