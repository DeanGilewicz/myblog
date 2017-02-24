<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage myblog
 * @since myblog 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="container_post">
		
		<header class="entry-header">

			<div class="post_meta">
				<span><?php the_time('j'); ?></span>
				<span><?php the_time('F'); ?></span>
				<span><?php the_time('Y'); ?></span>
			</div>

			<div class="post_title">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
				endif;
			?>
			</div>

			<div class="post_author">
				<span>Written by <span><?php the_author(); ?></span></span>
			</div>


			
		</header><!-- .entry-header -->

		<div class="post_feature_img">
			<?php the_post_thumbnail(); ?>
		</div>

		<div class="entry-content">

			<?php
				/* translators: %s: Name of current post */
				the_content( sprintf(
					__( 'Continue reading %s', 'myblog' ),
					the_title( '<span class="screen-reader-text">', '</span>', false )
				) );

				wp_link_pages( array(
					'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'myblog' ) . '</span>',
					'after'       => '</div>',
					'link_before' => '<span>',
					'link_after'  => '</span>',
					'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'myblog' ) . ' </span>%',
					'separator'   => '<span class="screen-reader-text">, </span>',
				) );
			?>
		</div><!-- .entry-content -->

		<footer class="entry-footer">
			<?php edit_post_link( __( 'Edit', 'myblog' ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
