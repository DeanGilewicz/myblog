<?php

if ( ! function_exists( 'myblog_setup' ) ) :

	function myblog_setup() {

		/*
			* Make theme available for translation.
			* Translations can be filed in the /languages/ directory.
			* If you're building a theme based on myblog, use a find and replace
			* to change 'myblog' to the name of your theme in all the template files
		*/

		load_theme_textdomain( 'myblog' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
			* Let WordPress manage the document title.
			* By adding theme support, we declare that this theme does not use a
			* hard-coded <title> tag in the document head, and expect WordPress to
			* provide it for us.
		*/
		add_theme_support( 'title-tag' );

		// menu doesn't come as default so need to add
		add_theme_support( 'menus' );

		// add featured image to theme - for all post types and pages
		add_theme_support( 'post-thumbnails' );

		// sets default featured image size for theme - this can be overriden in the template by
		// passing in a size to the the_post_thumbnail();
			// set_post_thumbnail_size( $width, $height, $crop );
			// set_post_thumbnail_size( 1200, 9999 );

		// add featured image to theme - for specified types
			// add_theme_support( 'post-thumbnails', array( 'post', 'test', 'portfolio' ) ); 

		// Custom post types - include in theme
		// include('post-types/post-types.php');

		// Custom taxonomies - include in theme
		// include('taxonomies/taxonomies.php');

		// make wp aware of our menus
		// key - needs to be passed into wp_nav_menu for 'theme_location'
		// value - is what shows up in admin panel on front end under menu
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'myblog' ),
			'social'  => __( 'Social Links Menu', 'myblog' )
		) );

		/*
			* Switch default core markup for search form, comment form, and comments
			* to output valid HTML5.
		*/
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption'
		) );

		/*
			* Enable support for Post Formats.
			*
			* See: https://codex.wordpress.org/Post_Formats
		*/
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link',
			'gallery',
			'status',
			'audio',
			'chat'
		) );

		/*
			* This theme styles the visual editor to resemble the theme style,
			* specifically font, colors, icons, and column width.
		*/
		// add_editor_style( array( 'css/editor-style.css', myblog_fonts_url() ) );
	
	}


endif; // myblog_setup

add_action( 'after_setup_theme', 'myblog_setup' );


// Enable SVG upload
// function cc_mime_types($mimes) {
// 	$mimes['svg'] = 'image/svg+xml';
// 	$mimes['svgz'] = 'image/svg+xml';
// 	return $mimes;
// }
// add_filter('upload_mimes', 'cc_mime_types');


// function disable_real_mime_check( $data, $file, $filename, $mimes ) {
//     $wp_filetype = wp_check_filetype( $filename, $mimes );

//     $ext = $wp_filetype['ext'];
//     $type = $wp_filetype['type'];
//     $proper_filename = $data['proper_filename'];

//     return compact( 'ext', 'type', 'proper_filename' );
// }
// add_filter( 'wp_check_filetype_and_ext', 'disable_real_mime_check', 10, 4 );




function my_custom_admin_styles() {
  echo '<style>
    table.media .column-title .media-icon img {
      width: 100%;
    } 
  </style>';
}
add_action('admin_head', 'my_custom_admin_styles');


function myblog_excerpt_length( $length ) {
	return 25;
}
add_filter( 'excerpt_length', 'myblog_excerpt_length', 999 );
// default length is 55 words
// the 999 above tells wp what position to run the function


function myblog_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'myblog_excerpt_more');

// function myblog_excerpt_more( $more ) {
// 	return ' <a class="read-more" href="' . get_permalink( get_the_ID() ) . '">' . 'Read More...' . '</a>';
// }
// add_filter('excerpt_more', 'myblog_excerpt_more');

/**
 * Sets the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 *
 * @since myblog 1.0
 */
// function myblog_content_width() {
// 	$GLOBALS['content_width'] = apply_filters( 'myblog_content_width', 840 );
// }
// add_action( 'after_setup_theme', 'myblog_content_width', 0 );


// Returns theme's url for use in templates
// if ( ! function_exists( 'myblog_get_theme_uri' ) ):

// 	function myblog_get_theme_uri() {
// 		$theme_url = get_stylesheet_uri();
// 		$theme_url = str_replace("/style.css", "", $theme_url);
		
// 		return $theme_url;
// 	}

// endif;
// add_shortcode( 'theme_uri', 'myblog_get_theme_uri' );



// Registers a widget area

function myblog_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'myblog' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar.', 'myblog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 1', 'myblog' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'myblog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	register_sidebar( array(
		'name'          => __( 'Content Bottom 2', 'myblog' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Appears at the bottom of the content on posts and pages.', 'myblog' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'myblog_widgets_init' );

// if ( ! function_exists( 'myblog_fonts_url' ) ) :
// /**
//  * Register Google fonts for myblog.
//  *
//  * Create your own myblog_fonts_url() function to override in a child theme.
//  *
//  * @since myblog 1.0
//  *
//  * @return string Google fonts URL for the theme.
//  */
// function myblog_fonts_url() {
// 	$fonts_url = '';
// 	$fonts     = array();
// 	$subsets   = 'latin,latin-ext';

// 	/* translators: If there are characters in your language that are not supported by Merriweather, translate this to 'off'. Do not translate into your own language. */
// 	if ( 'off' !== _x( 'on', 'Merriweather font: on or off', 'myblog' ) ) {
// 		$fonts[] = 'Merriweather:400,700,900,400italic,700italic,900italic';
// 	}

// 	 translators: If there are characters in your language that are not supported by Montserrat, translate this to 'off'. Do not translate into your own language. 
// 	if ( 'off' !== _x( 'on', 'Montserrat font: on or off', 'myblog' ) ) {
// 		$fonts[] = 'Montserrat:400,700';
// 	}

// 	/* translators: If there are characters in your language that are not supported by Inconsolata, translate this to 'off'. Do not translate into your own language. */
// 	if ( 'off' !== _x( 'on', 'Inconsolata font: on or off', 'myblog' ) ) {
// 		$fonts[] = 'Inconsolata:400';
// 	}

// 	if ( $fonts ) {
// 		$fonts_url = add_query_arg( array(
// 			'family' => urlencode( implode( '|', $fonts ) ),
// 			'subset' => urlencode( $subsets ),
// 		), 'https://fonts.googleapis.com/css' );
// 	}

// 	return $fonts_url;
// }
// endif;

/**
 * Handles JavaScript detection.
 *
 * Adds a `js` class to the root `<html>` element when JavaScript is detected.
 *
 * @since myblog 1.0
 */
// function myblog_javascript_detection() {
// 	echo "<script>(function(html){html.className = html.className.replace(/\bno-js\b/,'js')})(document.documentElement);</script>\n";
// }
// add_action( 'wp_head', 'myblog_javascript_detection', 0 );


// Enqueues scripts and styles
// 3rd param - list of dependencies (optional)
// 4th param - set a specific version (optional)
// 5th param - boolean - whether we want this to appear in the footer of the page

function myblog_scripts() {
	// Add custom fonts, used in the main stylesheet.
	// wp_enqueue_style( 'myblog-fonts', myblog_fonts_url(), array(), null );

	// Add Genericons, used in the main stylesheet.
	// wp_enqueue_style( 'genericons', get_template_directory_uri() . '/genericons/genericons.css', array(), '3.4.1' );

	// Theme stylesheet.
	wp_enqueue_style( 'myblog-style', get_stylesheet_uri() );

	// Load the Internet Explorer specific stylesheet.
	// wp_enqueue_style( 'myblog-ie', get_template_directory_uri() . '/css/ie.css', array( 'myblog-style' ), '20150930' );
	// wp_style_add_data( 'myblog-ie', 'conditional', 'lt IE 10' );

	// Load the Internet Explorer 8 specific stylesheet.
	// wp_enqueue_style( 'myblog-ie8', get_template_directory_uri() . '/css/ie8.css', array( 'myblog-style' ), '20151230' );
	// wp_style_add_data( 'myblog-ie8', 'conditional', 'lt IE 9' );

	// Load the Internet Explorer 7 specific stylesheet.
	// wp_enqueue_style( 'myblog-ie7', get_template_directory_uri() . '/css/ie7.css', array( 'myblog-style' ), '20150930' );
	// wp_style_add_data( 'myblog-ie7', 'conditional', 'lt IE 8' );

	// Load the html5 shiv.
	wp_enqueue_script( 'myblog-html5', get_template_directory_uri() . '/js/html5.js', array(), '3.7.3' );
	wp_script_add_data( 'myblog-html5', 'conditional', 'lt IE 9' );

	// wp_enqueue_script( 'myblog-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151112', true );

	// if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	// 	wp_enqueue_script( 'comment-reply' );
	// }

	// if ( is_singular() && wp_attachment_is_image() ) {
	// 	wp_enqueue_script( 'myblog-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20151104' );
	// }

	// wp_enqueue_script( 'myblog-script', get_template_directory_uri() . '/js/functions.js', array( 'jquery' ), '20151204', true );

	// wp_localize_script( 'myblog-script', 'screenReaderText', array(
	// 	'expand'   => __( 'expand child menu', 'myblog' ),
	// 	'collapse' => __( 'collapse child menu', 'myblog' ),
	// ) );
}
add_action( 'wp_enqueue_scripts', 'myblog_scripts' );


// Add classes / page name to body element
// if ( ! function_exists( 'myblog_add_body_class' ) ):

// 	function myblog_add_body_class($wp_classes) {
// 		global $post;
		
// 		// List of the only WP generated classes allowed
// 		$whitelist = array('logged-in', 'admin-bar', 'single');

// 		// Filter the body classes
// 		$wp_classes = array_intersect($wp_classes, $whitelist);

// 		$wp_classes[] = 'wordpress-site';
		
// 		if (!empty($post)) {
// 			$classes[] = $post->post_name;
// 			$classes[] = get_post_type($post);
			
// 			foreach((get_the_category($post->ID)) as $category)
// 				$classes[] = $category->category_nicename;

// 			// Add the new classes
// 			return array_merge($wp_classes, (array) $classes);	
// 		}
// 		return $wp_classes;
// 	}

// endif;
// add_filter( 'body_class', 'myblog_add_body_class' );


// // Add template name to content element
// function wpjj_content_class() {
// 	global $post;
// 	$classes = '';
	
// 	if (!empty($post)) {
		
// 		$template = get_page_template_slug($post->ID);
		
// 		if ($template !== false && $template != 'page.php') { // False means not a page template
// 			$classes = str_replace('.php', '', $template); // Remove .php from template slug
// 		}

// 		return $classes;
// 	}
// }

/**
 * Adds custom classes to the array of body classes.
 *
 * @since myblog 1.0
 *
 * @param array $classes Classes for the body element.
 * @return array (Maybe) filtered body classes.
 */
// function myblog_body_classes( $classes ) {
// 	// Adds a class of custom-background-image to sites with a custom background image.
// 	if ( get_background_image() ) {
// 		$classes[] = 'custom-background-image';
// 	}

// 	// Adds a class of group-blog to sites with more than 1 published author.
// 	if ( is_multi_author() ) {
// 		$classes[] = 'group-blog';
// 	}

// 	// Adds a class of no-sidebar to sites without active sidebar.
// 	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
// 		$classes[] = 'no-sidebar';
// 	}

// 	// Adds a class of hfeed to non-singular pages.
// 	if ( ! is_singular() ) {
// 		$classes[] = 'hfeed';
// 	}

// 	return $classes;
// }
// add_filter( 'body_class', 'myblog_body_classes' );

// Add specific CSS class by filter
// add_filter( 'body_class', 'my_class_names' );
// function my_class_names( $classes ) {
// 	// add 'class-name' to the $classes array
// 	$classes[] = 'class-name';
// 	// return the $classes array
// 	return $classes;
// }

function myblog_add_slug_body_class( $classes ) {
	global $post;
	if ( isset( $post ) ) {
		$classes[] = $post->post_type . '-' . $post->post_name;
	}
	return $classes;
}
add_filter( 'body_class', 'myblog_add_slug_body_class' );


/**
 * Converts a HEX value to RGB.
 *
 * @since myblog 1.0
 *
 * @param string $color The original color, in 3- or 6-digit hexadecimal form.
 * @return array Array containing RGB (red, green, and blue) values for the given
 *               HEX code, empty array otherwise.
 */
// function myblog_hex2rgb( $color ) {
// 	$color = trim( $color, '#' );

// 	if ( strlen( $color ) === 3 ) {
// 		$r = hexdec( substr( $color, 0, 1 ).substr( $color, 0, 1 ) );
// 		$g = hexdec( substr( $color, 1, 1 ).substr( $color, 1, 1 ) );
// 		$b = hexdec( substr( $color, 2, 1 ).substr( $color, 2, 1 ) );
// 	} else if ( strlen( $color ) === 6 ) {
// 		$r = hexdec( substr( $color, 0, 2 ) );
// 		$g = hexdec( substr( $color, 2, 2 ) );
// 		$b = hexdec( substr( $color, 4, 2 ) );
// 	} else {
// 		return array();
// 	}

// 	return array( 'red' => $r, 'green' => $g, 'blue' => $b );
// }

/**
 * Custom template tags for this theme.
 */
// require get_template_directory() . '/inc/template-tags.php';

/**
 * Customizer additions.
 */
// require get_template_directory() . '/inc/customizer.php';

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for content images
 *
 * @since myblog 1.0
 *
 * @param string $sizes A source size value for use in a 'sizes' attribute.
 * @param array  $size  Image size. Accepts an array of width and height
 *                      values in pixels (in that order).
 * @return string A source size value for use in a content image 'sizes' attribute.
 */
// function myblog_content_image_sizes_attr( $sizes, $size ) {
// 	$width = $size[0];

// 	840 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 62vw, 840px';

// 	if ( 'page' === get_post_type() ) {
// 		840 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
// 	} else {
// 		840 > $width && 600 <= $width && $sizes = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 61vw, (max-width: 1362px) 45vw, 600px';
// 		600 > $width && $sizes = '(max-width: ' . $width . 'px) 85vw, ' . $width . 'px';
// 	}

// 	return $sizes;
// }
// add_filter( 'wp_calculate_image_sizes', 'myblog_content_image_sizes_attr', 10 , 2 );

/**
 * Add custom image sizes attribute to enhance responsive image functionality
 * for post thumbnails
 *
 * @since myblog 1.0
 *
 * @param array $attr Attributes for the image markup.
 * @param int   $attachment Image attachment ID.
 * @param array $size Registered image size or flat array of height and width dimensions.
 * @return string A source size value for use in a post thumbnail 'sizes' attribute.
 */
function myblog_post_thumbnail_sizes_attr( $attr, $attachment, $size ) {
	if ( 'post-thumbnail' === $size ) {
		is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 984px) 60vw, (max-width: 1362px) 62vw, 840px';
		! is_active_sidebar( 'sidebar-1' ) && $attr['sizes'] = '(max-width: 709px) 85vw, (max-width: 909px) 67vw, (max-width: 1362px) 88vw, 1200px';
	}
	return $attr;
}
add_filter( 'wp_get_attachment_image_attributes', 'myblog_post_thumbnail_sizes_attr', 10 , 3 );

/**
 * Modifies tag cloud widget arguments to have all tags in the widget same font size.
 *
 * @since myblog 1.1
 *
 * @param array $args Arguments for tag cloud widget.
 * @return array A new modified arguments.
 */
// function myblog_widget_tag_cloud_args( $args ) {
// 	$args['largest'] = 1;
// 	$args['smallest'] = 1;
// 	$args['unit'] = 'em';
// 	return $args;
// }
// add_filter( 'widget_tag_cloud_args', 'myblog_widget_tag_cloud_args' );



// custom global comment section 
/*
function myblog_custom_comments( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
    switch( $comment->comment_type ) :
        case 'pingback' :
        case 'trackback' : ?>
            <li <?php comment_class(); ?> id="comment<?php comment_ID(); ?>">
            <div class="back-link"><?php comment_author_link(); ?></div>
        <?php break;
        default : 
        ?>
            <li <?php comment_class(); ?> id="comment-<?php comment_ID(); ?>">
           
	            <article <?php comment_class('row'); ?>>
	 
	            	<div class="medium-2 columns">
	            		<div class="author vcard">
	            			<?php echo get_avatar( $comment, 48 ); ?>
	            		</div><!-- .vcard -->
					</div>

					<div class="medium-3 columns comment_meta">
						<span>posted by</span>
						<h6 class="author-name"><?php comment_author(); ?></h6>
            			<span class="date">
            				<?php comment_date('M j, Y'); ?>
            			</span>
            			<span class="time">
            				<?php comment_time('g:i a'); ?>
            			</span>
					</div>

					<div class="medium-5 large-6 columns comment_text">
						<?php echo esc_html(comment_text()); ?>
					</div>
	 
	            	<div class="medium-2 large-1 columns">
            			<?php 
            				comment_reply_link( array_merge( $args, array(
            					'before' => '<span class="reply-link">',
            					'reply_text' => 'Reply',
            					'after' => '</span>' . edit_comment_link( 'Edit', '<span class="edit-link">', '</span> '), 
            					'depth' => $depth,
            					'max_depth' => $args['max_depth'] 
            				) ) ); 
            			?>
	            	</div><!-- .reply -->
	 
	            </article><!-- #comment-<?php comment_ID(); ?> -->
        	<?php // End the default styling of comment -  wordpress automatically closes li tag
        break;
    endswitch;
}
*/

// gallery fn with pagination

/*FILTER: GALLERY:  --------------------------------------------------------------*/
// add_filter( 'post_gallery', 'filter_gallery', 10, 2 );
// function filter_gallery( $output, $attr ) {
//     global $post;

//  //    static $instance = 0;
// 	// $instance++;

// 	// GALLERY SETUP STARTS HERE----------------------------------------//
//     if ( isset($attr['orderby']) ) {
//         $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
//         if ( !$attr['orderby'] )
//             unset( $attr['orderby'] );
//     }
// 	// print_r($attr);
//     extract(shortcode_atts(array(
//         'order' => 'ASC',
//         'orderby' => 'menu_order ID',
//         'id' => $post->ID,
//         'itemtag' => 'dl',
//         'icontag' => 'dt',
//         'captiontag' => 'dd',
//         'columns' => 3,
//         'size' => 'thumbnail', // use thumbnail, medium, large
//         'include' => '',
//         'exclude' => ''
//     ), $attr));

//     $id = intval($id);
//     if ( 'RAND' == $order )
//     	$orderby = 'none';

//     if ( !empty($include) ) {
//         $include = preg_replace( '/[^0-9,]+/', '', $include );
//         $_attachments = get_posts( array(
//         	'include' => $include,
//         	'post_status' => 'inherit',
//         	'post_type' => 'attachment',
//         	'post_mime_type' => 'image',
//         	'order' => $order,
//         	'orderby' => $orderby)
//         );

//         $attachments = array();
//         foreach ( $_attachments as $key => $val ) {
//             $attachments[$val->ID] = $_attachments[$key];
//         }
//     // added code below
//     } elseif ( !empty($exclude) ) {
// 		$exclude = preg_replace( '/[^0-9,]+/', '', $exclude );
// 		$attachments = get_children( array(
// 				'post_parent' => $id,
// 				'exclude' => $exclude,
// 				'post_status' => 'inherit',
// 				'post_type' => 'attachment',
// 				'post_mime_type' => 'image',
// 				'order' => $order,
// 				'orderby' => $orderby)
// 		);
// 	} else {
// 		$attachments = get_children( array(
// 				'post_parent' => $id,
// 				'post_status' => 'inherit',
// 				'post_type' => 'attachment',
// 				'post_mime_type' => 'image',
// 				'order' => $order,
// 				'orderby' => $orderby)
// 		);
// 	}
// 	// added code above

//     if ( empty($attachments) )
//     	return '';

//     // code added below
//     if ( is_feed() ) {
// 		$output = "\n";
// 		foreach ( $attachments as $att_id => $attachment )
// 			$output .= wp_get_attachment_link($att_id, $size, true) . "\n";
// 		return $output;
// 	}
//     // code added above

// 	// GALLERY SETUP END HERE------------------------------------------//


// 	// PAGINATION SETUP START HERE-------------------------------------//
	
// 	$current = ( get_query_var('paged') ) ? get_query_var( 'paged' ) : 1;
// 	$per_page = 24;
// 	//$offset = ($page-1) * $per_page;
// 	$offset = ($current-1) * $per_page;
// 	$big = 999999999; // need an unlikely integer

// 	// $columns = intval($columns);

// 	$total = sizeof($attachments);
// 	$total_pages = round( $total/$per_page );
	
// 	if( $total_pages < ( $total/$per_page ) ) {
// 		$total_pages = $total_pages+1;
// 	}
// 	// PAGINATION SETUP END HERE-------------------------------------//


// 	// GALLERY OUTPUT START HERE---------------------------------------//
    
//     $output = "<div class='gallery-images'>";
// 		$counter = 0;
// 		$pos = 0;

// 		// PAGINATION OUTPUT START HERE-------------------------------------//
		
// 		$output .= "<div class='gallery-pagination-top'>";
// 		$output .= paginate_links( array(
// 			'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))),
// 			'format' => '?paged=%#%',
// 			'current' => $current,
// 			'total' => $total_pages,
// 			'prev_text'    => __('«'),
// 			'next_text'    => __('»')
// 		) );
// 		$output .= "</div>";
		
// 		// PAGINATION OUTPUT ENDS HERE-------------------------------------//

// 	    foreach ( $attachments as $id => $attachment ) {
// 	    	$pos++;
// 	        //$img = wp_get_attachment_image_src($id, 'medium');
// 			//$img = wp_get_attachment_image_src($id, 'thumbnail');
// 	        //$img = wp_get_attachment_image_src($id, 'full');	

// 			if( ( $counter < $per_page ) && ( $pos > $offset ) ) {
// 				$counter++;
// 				$largetitle = get_the_title($attachment->ID);
// 				$largeimg = wp_get_attachment_image_src($id, 'large');
// 				$img = wp_get_attachment_image_src($id, array(150,150));
// 				// print_r($largeimg);
// 				// exit;
// 				$link = get_permalink($id);
// 				$alt = get_post_meta( $id, '_wp_attachment_image_alt', true );
// 				$caption = $attachment->post_excerpt;
// 				$description = $attachment->post_content;
// 				// $src = $attachment->guid;
// 				// $title = $attachment->post_title;
// 				// echo '<pre>';
// 				// print_r($attachment);			
// 				// exit;
// 				$output .= '<a class="gallery-image" href='.$link.' title='.$largetitle.' data-lb-img='.$largeimg[0].' data-lb-width='.$largeimg[1].' data-lb-height='.$largeimg[2].'>
// 								<img src='.$img[0].' width='.$img[1].' height='.$img[2].' alt='.$alt.'/>
// 								<p class="caption">'.$caption.'</p>
// 								<p class="description">'.$description.'</p>
// 							</a>';
// 			}
// 	    }

// 	    // PAGINATION OUTPUT START HERE-------------------------------------//
// 		$output .= "<div class='gallery-pagination-bottom'>";
// 		$output .= paginate_links( array(
// 			'base' => str_replace($big,'%#%',esc_url(get_pagenum_link($big))),
// 			'format' => '?paged=%#%',
// 			'current' => $current,
// 			'total' => $total_pages,
// 			'prev_text'    => __('«'),
// 			'next_text'    => __('»')
// 		) );
// 		$output .= "</div>";
		
// 		// PAGINATION OUTPUT ENDS HERE-------------------------------------//
// 		$output .= "<div class='clear'></div>";

//     $output .= "</div>";
	
// 	// GALLERY OUTPUT ENDS HERE---------------------------------------//

//     return $output;
// }


// set archive pages to limit of 5 posts per page
// function limit_posts_per_archive_page() {
// 	if ( is_archive() ) {
// 		set_query_var('posts_per_archive_page', 5);
// 	}
// }
// add_filter('pre_get_posts', 'limit_posts_per_archive_page');



