<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage thecodelog
 * @since thecodelog 1.0
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
									<?php
										the_archive_title( '<h1 class="page-title">', '</h1>' );
										the_archive_description( '<div class="taxonomy-description">', '</div>' );
									?>
								</header><!-- .page-header -->

								<?php
								// Start the Loop.
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
													'prev_text' => __( 'Prev', 'thecodelog' ),
													'next_text' => __( 'Next', 'thecodelog' )
												) );
											?>
										</div>
									</nav>
								<?php endif; ?>

								<?php get_template_part( 'content', 'custom-search-form' ); ?>

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
