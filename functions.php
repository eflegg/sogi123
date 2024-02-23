<?php
/**
 * themename functions and definitions
 *
 * @package themename
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) )
	$content_width = 640; /* pixels */

if ( ! function_exists( 'themename_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which runs
 * before the init hook. The init hook is too late for some features, such as indicating
 * support post thumbnails.
 */
function themename_setup() {

	/**
	 * Make theme available for translation
	 * Translations can be filed in the /languages/ directory
	 * If you're building a theme based on themename, use a find and replace
	 * to change 'themename' to the name of your theme in all the template files
	 */
	load_theme_textdomain( 'themename', get_template_directory() . '/languages' );

	/**
	 * Add default posts and comments RSS feed links to head
	 */
	add_theme_support( 'automatic-feed-links' );

	/**
	 * Enable support for Post Thumbnails on posts and pages
	 *
	 * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
	 */
	//add_theme_support( 'post-thumbnails' );

	/**
	 * This theme uses wp_nav_menu() in one location.
	 */
	register_nav_menus( array(
		'main' => __( 'Header: Main Menu', 'themename' ),
		'super' => __( 'Header: Super Menu', 'themename' ),
		'footfirst' => __( 'Footer: Primary', 'themename' ),
		'footsecond' => __( 'Footer: Secondary', 'themename' ),
		
	) );

	/**
	 * Enable support for Post Formats
	 */
	add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link' ) );

	/**
	 * Setup the WordPress core custom background feature.
	 */
	add_theme_support( 'custom-background', apply_filters( 'themename_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif; // themename_setup
add_action( 'after_setup_theme', 'themename_setup' );

/**
 * Register widgetized area and update sidebar with default widgets
 */
function themename_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Sidebar', 'themename' ),
		'id'            => 'sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h1 class="widget-title">',
		'after_title'   => '</h1>',
	) );
}
add_action( 'widgets_init', 'themename_widgets_init' );

/**
 * Enqueue scripts and styles
 */



function themename_scripts() {

	if(is_page_template('page-secondlevel.php') ) {
		wp_enqueue_script('tab-block-func', get_template_directory_uri() . '/js/tab-block-func.js');
	}

	if(is_page('resources') ) {
		wp_enqueue_script('multi-filter', get_template_directory_uri() . '/js/multi-filter.js');
	}
	if(is_page('resources') ) {
		wp_enqueue_script('multi-filter', get_template_directory_uri() . '/js/multi-filter.js');
	}
	if(is_page('questions-answered') ) {
		wp_enqueue_script('single-filter', get_template_directory_uri() . '/js/single-filter.js');
	}


	wp_enqueue_style( 'themename-style', get_stylesheet_uri() );
	
	wp_register_script( 'addToAny', 'https://static.addtoany.com/menu/page.js', null, null, true );
	wp_enqueue_script( 'slick-js', get_template_directory_uri() . '/js/lazysizes.min.js', array('jquery') );
	wp_enqueue_script( 'lity-js', get_template_directory_uri() . '/js/jquery.waypoints.min.js', array('jquery') );

	wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array('jquery') );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	if ( is_singular() && wp_attachment_is_image() ) {
		wp_enqueue_script( 'themename-keyboard-image-navigation', get_template_directory_uri() . '/js/keyboard-image-navigation.js', array( 'jquery' ), '20120202' );
	}
}
add_action( 'wp_enqueue_scripts', 'themename_scripts' );

if (!is_admin()) add_action("wp_enqueue_scripts", "my_jquery_enqueue", 11);
function my_jquery_enqueue() {
   wp_deregister_script('jquery');
   wp_register_script('jquery', "https" . "://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js", false, null);
   wp_enqueue_script('jquery');
}


/**
 * Implement the Custom Header feature.
 */
//require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

function my_scripts_method() {
    wp_enqueue_script(
        'bootstrap-js',
        get_template_directory_uri() . '/js/bootstrap.min.js',
        array('jquery')
    );
}
add_action('wp_enqueue_scripts', 'my_scripts_method');

function remove_menus(){
  
  remove_menu_page( 'index.php' );                  //Dashboard
  remove_menu_page( 'edit-comments.php' );          //Comments
  
}
add_action( 'admin_menu', 'remove_menus' );

/*
function menu_item_post_type() {

	$labels = array(
		'name'                => _x( 'Menu Items', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Menu Item', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Menu Item', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Menu Items', 'text_domain' ),
		'all_items'           => __( 'All Menu Items', 'text_domain' ),
		'view_item'           => __( 'View Menu Items', 'text_domain' ),
		'add_new_item'        => __( 'Add New Menu Item', 'text_domain' ),
		'add_new'             => __( 'New Menu Item', 'text_domain' ),
		'edit_item'           => __( 'Edit Menu Item', 'text_domain' ),
		'update_item'         => __( 'Update Menu Item', 'text_domain' ),
		'search_items'        => __( 'Search Menu Items', 'text_domain' ),
		'not_found'           => __( 'No Menu Items found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No Menu Items found in trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'menu_item', 'text_domain' ),
		'description'         => __( 'menu_items uploaded by Parker.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_menu_item'        => true,
		'show_in_nav_menu_items'   => true,
		'show_in_admin_bar'   => true,
		'menu_item_position'       => 5,
		'menu_item_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'menu_item', $args );

}
*/

// Hook into the 'init' action
/* add_action( 'init', 'menu_item_post_type', 0 ); */

/*
function accommodation_post_type() {

	$labels = array(
		'name'                => _x( 'Accommodations', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Accommodation', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Accommodation', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Accommodations', 'text_domain' ),
		'all_items'           => __( 'All Accommodations', 'text_domain' ),
		'view_item'           => __( 'View Accommodations', 'text_domain' ),
		'add_new_item'        => __( 'Add New Accommodation', 'text_domain' ),
		'add_new'             => __( 'New Accommodation', 'text_domain' ),
		'edit_item'           => __( 'Edit Accommodation', 'text_domain' ),
		'update_item'         => __( 'Update Accommodation', 'text_domain' ),
		'search_items'        => __( 'Search Accommodations', 'text_domain' ),
		'not_found'           => __( 'No Accommodations found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No Accommodations found in trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'accommodation', 'text_domain' ),
		'description'         => __( 'accommodations uploaded by Parker.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_accommodation'        => true,
		'show_in_nav_accommodations'   => true,
		'show_in_admin_bar'   => true,
		'accommodation_position'       => 5,
		'accommodation_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'accommodation', $args );

}

// Hook into the 'init' action
add_action( 'init', 'accommodation_post_type', 0 );
*/

/*
function provider_post_type() {

	$labels = array(
		'name'                => _x( 'Providers', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Provider', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Provider', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Providers', 'text_domain' ),
		'all_items'           => __( 'All Providers', 'text_domain' ),
		'view_item'           => __( 'View Providers', 'text_domain' ),
		'add_new_item'        => __( 'Add New Provider', 'text_domain' ),
		'add_new'             => __( 'New Provider', 'text_domain' ),
		'edit_item'           => __( 'Edit Provider', 'text_domain' ),
		'update_item'         => __( 'Update Provider', 'text_domain' ),
		'search_items'        => __( 'Search Providers', 'text_domain' ),
		'not_found'           => __( 'No Providers found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No Providers found in trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'provider', 'text_domain' ),
		'description'         => __( 'providers uploaded by Parker.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_Provider'        => true,
		'show_in_nav_Providers'   => true,
		'show_in_admin_bar'   => true,
		'Provider_position'       => 5,
		'Provider_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'provider', $args );

}
// Hook into the 'init' action
add_action( 'init', 'provider_post_type', 0 );
*/



/*
function installation_post_type() {

	$labels = array(
		'name'                => _x( 'Installations', 'Post Type General Name', 'text_domain' ),
		'singular_name'       => _x( 'Installation', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'           => __( 'Installations', 'text_domain' ),
		'parent_item_colon'   => __( 'Parent Installations', 'text_domain' ),
		'all_items'           => __( 'All Installations', 'text_domain' ),
		'view_item'           => __( 'View Installations', 'text_domain' ),
		'add_new_item'        => __( 'Add New Installation', 'text_domain' ),
		'add_new'             => __( 'New Installation', 'text_domain' ),
		'edit_item'           => __( 'Edit Installation', 'text_domain' ),
		'update_item'         => __( 'Update Installation', 'text_domain' ),
		'search_items'        => __( 'Search Installations', 'text_domain' ),
		'not_found'           => __( 'No Installations found', 'text_domain' ),
		'not_found_in_trash'  => __( 'No Installations found in trash', 'text_domain' ),
	);
	$args = array(
		'label'               => __( 'Installation', 'text_domain' ),
		'description'         => __( 'Installation uploaded by Parker.', 'text_domain' ),
		'labels'              => $labels,
		'supports'            => array( 'title', 'editor', ),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'hierarchical'        => false,
		'public'              => true,
		'show_ui'             => true,
		'show_in_installation'        => true,
		'show_in_nav_installation'   => true,
		'show_in_admin_bar'   => true,
		'installation_position'       => 5,
		'installation_icon'           => '',
		'can_export'          => true,
		'has_archive'         => true,
		'exclude_from_search' => false,
		'publicly_queryable'  => true,
		'capability_type'     => 'page',
	);
	register_post_type( 'installation', $args );

}

// Hook into the 'init' action
add_action( 'init', 'installation_post_type', 0 );
*/


//Register Fonts:

function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}

add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
    add_image_size( 'background-image', 2000 );
    add_image_size( 'gngc-thumbnail', 355, 355, true );
}

// Filter except length to 35 words.
// tn custom excerpt length
function tn_custom_excerpt_length( $length ) {
return 23;
}
add_filter( 'excerpt_length', 'tn_custom_excerpt_length', 999 );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

//theme support for post excerpts
add_post_type_support( 'page', 'excerpt' );

//use one single template for resources and questions custom post types
add_filter( 'template_include', function( $template ) 
{
    // your custom post types
    $my_types = array( 'resource', 'question' );
    $post_type = get_post_type();

    if ( ! in_array( $post_type, $my_types ) )
        return $template;

    return get_stylesheet_directory() . '/single-question.php'; 
});


//resusable custom post filter



//   function filter_projects() {
// 	$catSlug = $_POST['category'];
// 	$postType = $_POST['type'];
  
// 	$ajaxposts = new WP_Query([
// 	  'post_type' => $postType,
// 	  'posts_per_page' => -1,
// 	  'category_name' => $catSlug,
// 	  'orderby' => 'menu_order', 
// 	  'order' => 'desc',
// 	]);
// 	$response = '';
  
// 	if($ajaxposts->have_posts()) {
// 	  while($ajaxposts->have_posts()) : $ajaxposts->the_post();
// 		$response .= include 'components/cards/question-card.php';
// 	  endwhile;
// 	} else {
// 	  $response = 'empty';
// 	}
  
// 	echo $response;
// 	exit;
//   }
//   add_action('wp_ajax_filter_projects', 'filter_projects');
//   add_action('wp_ajax_nopriv_filter_projects', 'filter_projects');



//this is what makes the ajaxurl variable available site wide
add_action('wp_head', 'myplugin_ajaxurl');
function myplugin_ajaxurl() {
    echo '<script type="text/javascript">
           var ajaxurl = "' . admin_url('admin-ajax.php') . '";
         </script>';
}





//ensures languages are displayed in short form (en, fr)
add_filter( 'pll_the_languages_args', function( $args ) { $args['display_names_as'] = 'slug'; return $args; } );



//try ajax multi again



function rudr_ajax_search_filter() {

	$form_data = json_decode( file_get_contents( "php://input" ), true );
	// print_r($form_data);

	//this is how you implode an array with numerical values
	// $imploded_filtered = implode(", ", array_map('intval', $filtered_form_data));

	//removes empty values
	$filtered_form_data = array_filter($form_data);
	$imploded_cat_names = implode( '+', $filtered_form_data);


	print_r($imploded_cat_names);
	
	
  
	$ajaxpostsMulti = new WP_Query(array(
	  'post_type' => "resource",
 	  'posts_per_page' => -1,
	  'category_name' => $imploded_cat_names,
	  'orderby' => 'menu_order', 
	  'order' => 'desc',
	));
	$response = '';


	
	if($ajaxpostsMulti->have_posts()) {
	  while($ajaxpostsMulti->have_posts()) : $ajaxpostsMulti->the_post();
	
	  $response .= include 'components/cards/resource-card.php';

	  endwhile;
	  wp_reset_postdata();
	}  
	else {
	  $response = 'empty multi';
	}
  
	echo $response;


	die;

}

add_action( 'wp_ajax_ajaxfilter2', 'rudr_ajax_search_filter' );
add_action( 'wp_ajax_nopriv_ajaxfilter2', 'rudr_ajax_search_filter' );


function rudr_ajax_filter_by_category() {

	$obj = json_decode( file_get_contents( "php://input" ), true );
	$catSlug = $obj['cat'];
	$postType =$obj['dataType'];
	// print_r($obj);
	// print_r($catSlug);
	// print_r($postType);
  
	$ajaxposts = new WP_Query([
	  'post_type' => $postType,
	  'posts_per_page' => -1,
	  'category_name' => $catSlug,
	  'orderby' => 'menu_order', 
	  'order' => 'desc',
	]);
	$response = '';
  

	
	if($ajaxposts->have_posts()) {
	  while($ajaxposts->have_posts()) : $ajaxposts->the_post();
	  if($postType == 'question'){
		  $response .= include 'components/cards/question-card.php';
	  } else if($postType == 'resource'){
		$response .= include 'components/cards/resource-card.php';
	  } else if ($postType == 'post') {
		$response .= include 'components/cards/update-card.php';
	  } else null;
	  
		
		
	  endwhile;
	  wp_reset_postdata();
	}  
	else {
	  $response = 'empty';
	}
  
	// echo $response;

	// exit;
	die;



}
add_action( 'wp_ajax_ajaxfilter', 'rudr_ajax_filter_by_category' );
add_action( 'wp_ajax_nopriv_ajaxfilter', 'rudr_ajax_filter_by_category' );