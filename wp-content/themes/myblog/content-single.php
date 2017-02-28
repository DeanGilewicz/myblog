<?php
/**
 * An specfic template for displaying single post content
 *
 * @package WordPress
 * @subpackage myblog
 * @since myblog 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="container_post">

		<div class="post_feature_img">
			<?php the_post_thumbnail(); ?>
		</div>
		
		<header class="entry-header">

			<div class="post_date">
				<span><?php the_time('j'); ?></span>
				<span><?php the_time('F'); ?></span>
				<span><?php the_time('Y'); ?></span>
			</div>

			<div class="container_post_meta">
				
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

			</div>
			
		</header><!-- .entry-header -->

		<div class="entry-content">

			<div class="table">

				<div class="post_type table_cell">
					<i class="genericon genericon-pinned"></i>
				</div>

				<div class="container_cats_comments table_cell">

					<span class="post_cats">
						<?php foreach ( get_the_category() as $cat ) : ?>
							<?php 
								$category_name  = $cat->cat_name;
								$category_link  = get_category_link( $cat->cat_ID );
							?>
							<div class="cat_link">
								<i class="genericon genericon-category"></i>
								<a href="<?php echo esc_url( $category_link ); ?>" title="<?php echo esc_attr( $category_name ); ?>"><?php echo esc_html( $category_name ); ?></a>
							</div>
						<?php endforeach; ?>
					</span>

					<span class="post_comments">
						<i class="genericon genericon-comment"></i>
						<a href="<?php echo get_comments_link( $post->ID ); ?>"><?php comments_number(); ?></a>
					</span>

				</div>

			</div>

			<?php
				/* translators: %s: Name of current post */
				// the_content( sprintf(
				// 	__( 'Continue reading %s', 'myblog' ),
				// 	the_title( '<span class="screen-reader-text">', '</span>', false )
				// ) );
				the_content();

				// wp_link_pages( array(
				// 	'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'myblog' ) . '</span>',
				// 	'after'       => '</div>',
				// 	'link_before' => '<span>',
				// 	'link_after'  => '</span>',
				// 	'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'myblog' ) . ' </span>%',
				// 	'separator'   => '<span class="screen-reader-text">, </span>',
				// ) );
			?>

		</div><!-- .entry-content -->

		<footer class="entry-footer">

			share on

			<!-- <?php edit_post_link( __( 'Edit', 'myblog' ), '<span class="edit-link">', '</span>' ); ?> -->
		
		</footer><!-- .entry-footer -->

	</div>

</article><!-- #post-## -->
