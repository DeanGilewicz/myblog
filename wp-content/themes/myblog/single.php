<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage myblog
 * @since myblog 1.0
 */
?>

<?php get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main container_main_content" role="main">

			<div class="dg_grid_container">

				<div class="dg_grid_row">

					<div class="dg_grid_col col_12">

						<?php
							if( function_exists('custom_breadcrumbs') ) {
    							custom_breadcrumbs();
							}
						?>

					</div>

				</div>

				<div class="dg_grid_row">

					<div class="dg_grid_col col_12">

						<?php
						// Start the loop.
						while ( have_posts() ) : the_post();

							/*
							 * Include the post format-specific template for the content. If you want to
							 * use this in a child theme, then include a file called called content-___.php
							 * (where ___ is the post format) and that will be used instead.
							 */
							// get_template_part( 'content', get_post_format() );

							// override and get custom single content
							get_template_part( 'content', 'single' );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							// Previous/next post navigation.
							the_post_navigation( array(
								'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'myblog' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Next post:', 'myblog' ) . '</span> ' .
									'<span class="post-title">%title</span>',
								'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'myblog' ) . '</span> ' .
									'<span class="screen-reader-text">' . __( 'Previous post:', 'myblog' ) . '</span> ' .
									'<span class="post-title">%title</span>',
							) );

						// End the loop.
						endwhile;
						?>

					</div>

				</div>

			</div>

		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_footer(); ?>
