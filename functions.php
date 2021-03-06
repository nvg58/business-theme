<?php
/**
 * wtm_ functions and definitions
 *
 * @package wtm_
 */

define( 'TEMPLATE_PATH', trailingslashit( get_template_directory() ) );
define( 'TEMPLATE_PATH_URI', trailingslashit( get_template_directory_uri() ) );

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 650; /* pixels */
}

if ( ! function_exists( 'wtm_setup' ) ) :
	function wtm_setup() {

		/*
		 * Make theme available for translation.
		 */
		load_theme_textdomain( 'wtm_', TEMPLATE_PATH . 'languages' );

		/*
		 * Add default posts and comments RSS feed links to head.
		 */
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 */
		add_theme_support( 'post-thumbnails' );


		/*
		 * This theme uses wp_nav_menu() in one location.
		 */
		register_nav_menus( array(
			'primary' => __( 'Primary Menu', 'wtm_' ),
		) );


		/*
		 * Register top menu
		 */
		register_nav_menus( array(
			'topmenu' => __( 'Top Menu', 'wtm_' ),
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
		 * See http://codex.wordpress.org/Post_Formats
		 */
		add_theme_support( 'post-formats', array(
			'aside',
			'image',
			'video',
			'quote',
			'link'
		) );

		/*
		 * Setup the WordPress core custom background feature.
		 */
		add_theme_support( 'custom-background', apply_filters( 'wtm_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );
	}
endif;
add_action( 'after_setup_theme', 'wtm_setup' );


/**
 * Custom template tags for this theme.
 */
require TEMPLATE_PATH . 'inc/template-tags.php';


/**
 * Shortcode for this theme
 */
require TEMPLATE_PATH . 'inc/shortcodes/shortcodes.php';


/**
 * Widgets for this theme
 */
require TEMPLATE_PATH . 'inc/widgets/widgets.php';


/**
 * Register widgets area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function wtm_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'wtm_' ),
		'id'            => 'sidebar',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footerbar', 'wtm_' ),
		'id'            => 'footer-bar',
		'description'   => '',
		'before_widget' => '<div class="one_fourth_widget">',
		'after_widget'  => '</div>',
		'before_title'  => '<h5>',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => __( 'Copyright Bar', 'wtm_' ),
		'id'            => 'copyright-bar',
		'description'   => '',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '',
		'after_title'   => '',
	) );
}

add_action( 'widgets_init', 'wtm_widgets_init' );


/**
 * Enqueue scripts and styles.
 */
function wtm_scripts() {
	// css
	wp_enqueue_style( 'wtm-style', get_stylesheet_uri() );
	wp_enqueue_style( 'wtm-fancybox', get_template_directory_uri() . "/css/jquery.fancybox.css" );

	// js
	wp_enqueue_script( 'wtm-flexslider', get_template_directory_uri() . "/js/jquery.flexslider-min.js", array( 'jquery' ) );
	wp_enqueue_script( 'wtm-easing', get_template_directory_uri() . "/js/jquery.easing.1.3.js", array( 'jquery' ) );
	wp_enqueue_script( 'wtm-hoverIntent', get_template_directory_uri() . "/js/hoverIntent.js", array( 'jquery' ) );
	wp_enqueue_script( 'wtm-sfmenu', get_template_directory_uri() . "/js/jquery.sfmenu.js", array( 'jquery' ) );
	wp_enqueue_script( 'wtm-retina', get_template_directory_uri() . "/js/retina.js", array( 'jquery' ) );
	wp_enqueue_script( 'wtm-custom', get_template_directory_uri() . "/js/custom.js", array( 'jquery' ) );
	wp_enqueue_script( 'wtm-fancybox', get_template_directory_uri() . "/js/jquery.fancybox.js", array( 'jquery' ) );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}

add_action( 'wp_enqueue_scripts', 'wtm_scripts' );


/**
 * Custom get_the_excerpt function
 *
 * @param int $limit limit the number of words in excerpt
 * @param string $more text for read-more
 * @param string $wrapper wrapper for read-more
 * @param bool $has_link if read-more contains link or not
 *
 * @return array|mixed|string
 */
function get_custom_excerpt( $limit = 24, $more = '', $wrapper = '', $has_link = true ) {
	if ( $has_link ) {
		$link = '<a class="more-link" href="' . get_permalink( get_the_ID() ) . '">' . __( $more, 'wtm_' ) . '</a>';

		$more_link = sprintf(
			'%s%s%s',
			'<' . $wrapper . '>',
			$link,
			'</' . $wrapper . '>'
		);
	} else {
		$more_link = '...';
	}

	$excerpt = explode( ' ', get_the_excerpt(), $limit );

	if ( count( $excerpt ) >= $limit ) {
		array_pop( $excerpt );
		$excerpt = implode( ' ', $excerpt ) . $more_link;
	} else {
		$excerpt = implode( ' ', $excerpt );
	}

	return $excerpt;
}


/**
 * Prevent Page Scroll When Clicking the More Link
 */
function remove_more_link_scroll( $link ) {
	$link = preg_replace( '|#more-[0-9]+|', '', $link );

	return $link;
}

add_filter( 'the_content_more_link', 'remove_more_link_scroll' );


/**
 * Add a parent class for menu item.
 */
add_filter( 'wp_nav_menu_objects', 'add_menu_parent_class' );
function add_menu_parent_class( $items ) {

	$parents = array();
	foreach ( $items as $item ) {
		if ( $item->menu_item_parent && $item->menu_item_parent > 0 ) {
			$parents[] = $item->menu_item_parent;
		}
	}

	foreach ( $items as $item ) {
		if ( in_array( $item->ID, $parents ) ) {
			$item->classes[] = 'sub-menu';
		}
	}

	return $items;
}


/**
 * Remove the filters which apply this function to the post content:
 */
remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

/*
 * Register Copyright_Message_Widget widgets
 */
function register_copyright_message_widget() {
	register_widget( 'WTM_Copyright_Message_Widget' );
}

add_action( 'widgets_init', 'register_copyright_message_widget' );


/*
 * Register Social_Icons_Widget widgets
 */
function register_social_icons_widget() {
	register_widget( 'WTM_Social_Icons_Widget' );
}

add_action( 'widgets_init', 'register_social_icons_widget' );


/*
 * Register Staff Custom Post Type
 */
function custom_staff_post_type() {

	$labels = array(
		'name'               => _x( 'Staffs', 'Post Type General Name', 'wtm_' ),
		'singular_name'      => _x( 'Staff', 'Post Type Singular Name', 'wtm_' ),
		'menu_name'          => __( 'Staffs', 'wtm_' ),
		'parent_item_colon'  => __( 'Parent staff:', 'wtm_' ),
		'all_items'          => __( 'All Staffs', 'wtm_' ),
		'view_item'          => __( 'View staff', 'wtm_' ),
		'add_new_item'       => __( 'Add New Staff', 'wtm_' ),
		'add_new'            => __( 'Add New', 'wtm_' ),
		'edit_item'          => __( 'Edit Staff', 'wtm_' ),
		'update_item'        => __( 'Update Staff', 'wtm_' ),
		'search_items'       => __( 'Search Staff', 'wtm_' ),
		'not_found'          => __( 'Not found', 'wtm_' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'wtm_' ),
	);
	$args   = array(
		'label'               => __( 'staff', 'wtm_' ),
		'description'         => __( 'Show staffs', 'wtm_' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu'        => true,
		'show_in_nav_menus'   => true,
		'show_in_admin_bar'   => true,
		'menu_position'       => 5,
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'staff', $args );

}

// Hook into the 'init' action
add_action( 'init', 'custom_staff_post_type', 0 );


/*
 * Register Case Study Custom Post Type
 */
add_action( 'init', 'create_case_study' );
function create_case_study() {
	register_post_type( 'case_study',
		array(
			'labels'        => array(
				'name'          => __( 'Case Studies', 'wtm_' ),
				'singular_name' => __( 'Case Study', 'wtm_' )
			),
			'supports'      => array( 'title', 'editor', 'thumbnail', 'custom-fields', ),
			'public'        => true,
			'has_archive'   => true,
			'menu_position' => 5,
			'rewrite'       => array( 'slug' => 'case_study' ),
		)
	);
}


/*
 * Show posts of 'post', 'careers',  and 'case_study' post types on home page
 */
add_action( 'pre_get_posts', 'add_my_post_types_to_query' );

function add_my_post_types_to_query( $query ) {
	if ( is_home() && $query->is_main_query() ) {
		$query->set( 'post_type', array( 'post', 'page', 'careers', 'case_study' ) );
	}

	return $query;
}


add_action( 'init', 'create_staff_taxonomies' );

// create two taxonomies, genres and writers for the post type "staff"
function create_staff_taxonomies() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => _x( 'Positions', 'taxonomy general name' ),
		'singular_name'     => _x( 'Position', 'taxonomy singular name' ),
		'search_items'      => __( 'Search Positions' ),
		'all_items'         => __( 'All Positions' ),
		'parent_item'       => __( 'Parent Position' ),
		'parent_item_colon' => __( 'Parent Position:' ),
		'edit_item'         => __( 'Edit Position' ),
		'update_item'       => __( 'Update Position' ),
		'add_new_item'      => __( 'Add New Position' ),
		'new_item_name'     => __( 'New Position Name' ),
		'menu_name'         => __( 'Positions' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
	);

	register_taxonomy( 'position', 'staff', $args );
//	register_taxonomy_for_object_type( 'position', 'staff' );
}
