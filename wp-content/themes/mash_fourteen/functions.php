<?php

add_action( 'after_setup_theme', 'mash_fourteen_setup' );
	function mash_fourteen_setup() {

		// Definitions
		define( 'THEME_SLUG', get_template() );
		define( 'THEME_LIBRARY', TEMPLATEPATH . '/library' );

		// Library files
		require_once( THEME_LIBRARY . '/theme-options.php');	

		load_theme_textdomain( 'mash_fourteen', get_template_directory() . '/languages' );

		// Support
		add_theme_support( 'automatic-feed-links' );

		// Thumbnail Image Support			
		add_theme_support('post-thumbnails');
	
     	add_image_size( 'project-lg', 786, 592, true );
		add_image_size( 'project-sm', 393, 296, true );
	

		global $content_width;
		if ( ! isset( $content_width ) ) $content_width = 640;

		register_nav_menus(
			array( 'main-menu' => __( 'Main Menu', 'mash_fourteen' ) )
		);

		// Objects
		add_action( 'init', 'theme_post_types_init' );
		add_action( 'init', 'theme_taxonomies_init' );

		//Actions
		remove_action( 'wp_head', 'rsd_link' );
		remove_action( 'wp_head', 'wp_generator' );
		remove_action( 'wp_head', 'index_rel_link' );
		remove_action( 'wp_head', 'wlwmanifest_link' );
		remove_action( 'wp_head', 'feed_links_extra', 3 );
		remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
		remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
	}


add_action( 'wp_enqueue_scripts', 'mash_fourteen_enqueue_scripts' );
	function mash_fourteen_enqueue_scripts() {
		if ( !is_admin() ) {
			// De-register jQuery
			wp_deregister_script( 'jquery' );
		}

		$jqueryScript = 'http'. ($_SERVER['SERVER_PORT'] == 443 ? "s" : "") . '://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js';
	    wp_register_script('jquery', $jqueryScript, false, '1.10.2', true);
	    wp_enqueue_script('jquery');
	}


add_action( 'comment_form_before', 'mash_fourteen_enqueue_comment_reply_script' );
	function mash_fourteen_enqueue_comment_reply_script() {
		if ( get_option( 'thread_comments' ) ) { 
			wp_enqueue_script( 'comment-reply' ); 
		}
	}

add_filter( 'the_title', 'mash_fourteen_title' );
	function mash_fourteen_title( $title ) {
		if ( $title == '' ) {
			return '&rarr;';
		} else {
			return $title;
		}
	}

// Prevent wrappimg links around uploaded images.
function mash_fourteen_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'mash_fourteen_imagelink_setup', 10);


add_filter( 'wp_title', 'mash_fourteen_filter_wp_title' );
function mash_fourteen_filter_wp_title( $title ) {
	return $title . esc_attr( get_bloginfo( 'name' ) );
}

// Remove 'p' tags around images
add_filter('the_content', 'filter_ptags_on_images');
function filter_ptags_on_images($content){
   return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}

add_action( 'init', 'mash_fourteen_page_excerpts' );
function mash_fourteen_page_excerpts() {
     add_post_type_support( 'page', 'excerpt' );
}

add_action( 'widgets_init', 'mash_fourteen_widgets_init' );
function mash_fourteen_widgets_init() {
	register_sidebar( array (
		'name' => __( 'Sidebar Widget Area', 'mash_fourteen' ),
		'id' => 'primary-widget-area',
		'before_widget' => '<li id="%1$s" class="widget-container %2$s">',
		'after_widget' => "</li>",
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	) );
}



/* SETUP HELPERS
--------------------------------------------------------------------------------*/

/* THEME OBJECTS
----------------------------------------*/

function theme_post_types_init() {

	// Project Post Type
	register_post_type( 
		'project',
		array(
			'labels' => array(			
				'name' => __( 'Projects', THEME_SLUG ),
				'singular_name' => __( 'Project', THEME_SLUG ),
				'add_new' => __( 'Add New', THEME_SLUG ),
				'add_new_item' => __( 'Add New Project', THEME_SLUG ),
				'edit' => __( 'Edit', THEME_SLUG ),
				'edit_item' => __( 'Edit Project', THEME_SLUG ),
				'new_item' => __( 'New Project', THEME_SLUG ),
				'view' => __( 'View Project', THEME_SLUG ),
				'view_item' => __( 'View Project', THEME_SLUG ),
				'search_items' => __( 'Search Projects', THEME_SLUG ),
				'not_found' => __( 'No projects found', THEME_SLUG ),
				'not_found_in_trash' => __( 'No projects found in Trash', THEME_SLUG ),
				'parent' => __( 'Parent Project', THEME_SLUG  )				
			),
			'description' => __( 'Projects are case studies of client work.', THEME_SLUG ),
			'public' => true,
			'menu_icon' => 'dashicons-admin-post',
			'supports' => array( 
				'title',
				'editor',
				'excerpt',
				'custom-fields',
				'thumbnail',
				'page-attributes',
				'trackbacks',
				'author',
				'revisions'
			),
			'taxonomies' => array( 'service-type' ),
			'rewrite' => array(			
				'slug' => __('projects', THEME_SLUG),
			),
		)
	);


	// Service Post Type
	register_post_type( 
		'service',
		array(
			'labels' => array(			
				'name' => __( 'Services', THEME_SLUG ),
				'singular_name' => __( 'Service', THEME_SLUG ),
				'add_new' => __( 'Add New', THEME_SLUG ),
				'add_new_item' => __( 'Add New Service', THEME_SLUG ),
				'edit' => __( 'Edit', THEME_SLUG ),
				'edit_item' => __( 'Edit Service', THEME_SLUG ),
				'new_item' => __( 'New Service', THEME_SLUG ),
				'view' => __( 'View Service', THEME_SLUG ),
				'view_item' => __( 'View Service', THEME_SLUG ),
				'search_items' => __( 'Search Services', THEME_SLUG ),
				'not_found' => __( 'No services found', THEME_SLUG ),
				'not_found_in_trash' => __( 'No services found in Trash', THEME_SLUG ),
				'parent' => __( 'Parent Service', THEME_SLUG  )				
			),
			'description' => __( 'Services are services we provide.', THEME_SLUG ),
			'public' => true,
			'menu_icon' => 'dashicons-admin-post',
			'supports' => array( 
				'title',
				'editor',
				'excerpt',
				'custom-fields',
				'thumbnail',
				'page-attributes',
				'trackbacks',
				'author',
				'revisions'
			),
			'taxonomies' => array( 'category' ),
			'rewrite' => array(			
				'slug' => __('services', THEME_SLUG),
			),
		)
	);

	// Testimonial Post Type
	register_post_type( 
		'testimonial',
		array(
			'labels' => array(			
				'name' => __( 'Testimonials', THEME_SLUG ),
				'singular_name' => __( 'Testimonial', THEME_SLUG ),
				'add_new' => __( 'Add New', THEME_SLUG ),
				'add_new_item' => __( 'Add New Testimonial', THEME_SLUG ),
				'edit' => __( 'Edit', THEME_SLUG ),
				'edit_item' => __( 'Edit Testimonial', THEME_SLUG ),
				'new_item' => __( 'New Testimonial', THEME_SLUG ),
				'view' => __( 'View Testimonial', THEME_SLUG ),
				'view_item' => __( 'View Testimonial', THEME_SLUG ),
				'search_items' => __( 'Search Testimonials', THEME_SLUG ),
				'not_found' => __( 'No testimonial found', THEME_SLUG ),
				'not_found_in_trash' => __( 'No testimonials found in Trash', THEME_SLUG ),
				'parent' => __( 'Parent Testimonial', THEME_SLUG  )				
			),
			'description' => __( 'Testimonials are quotes from clients.', THEME_SLUG ),
			'public' => true,
			'menu_icon' => 'dashicons-admin-post',
			'supports' => array( 
				'title',
				'editor',
				'excerpt',
				'custom-fields',
				'thumbnail',
				'page-attributes',
				'trackbacks',
				'author',
				'revisions'
			),
		)
	);

	// Person Post Type
	register_post_type( 
		'person',
		array(
			'labels' => array(			
				'name' => __( 'People', THEME_SLUG ),
				'singular_name' => __( 'Person', THEME_SLUG ),
				'add_new' => __( 'Add New', THEME_SLUG ),
				'add_new_item' => __( 'Add New Person', THEME_SLUG ),
				'edit' => __( 'Edit', THEME_SLUG ),
				'edit_item' => __( 'Edit Person', THEME_SLUG ),
				'new_item' => __( 'New Person', THEME_SLUG ),
				'view' => __( 'View Person', THEME_SLUG ),
				'view_item' => __( 'View Person', THEME_SLUG ),
				'search_items' => __( 'Search People', THEME_SLUG ),
				'not_found' => __( 'No people found', THEME_SLUG ),
				'not_found_in_trash' => __( 'No people found in Trash', THEME_SLUG ),
				'parent' => __( 'Parent person', THEME_SLUG  )				
			),
			'description' => __( '"Person" is for staff bios.', THEME_SLUG ),
			'public' => true,
			'menu_icon' => 'dashicons-admin-post',
			'supports' => array( 
				'title',
				'editor',
				'excerpt',
				'custom-fields',
				'thumbnail',
				'page-attributes',
				'trackbacks',
				'author',
				'revisions'
			),
		)
	);

}


function theme_taxonomies_init() {

	// Service-type taxonomy
	register_taxonomy(
		'service-type',
		array( 'service', 'project' ),
		array(
			'public' => true,
			'hierarchical' => true,
			'labels' => array(
				'name' => __( 'Service Types', 'seed' ),
				'singular_name' => __( 'Service Type', 'seed' ),
				'search_items' => __( 'Search Service Types', 'seed' ),
				'popular_items' => __( 'Popular Service Types', 'seed' ),
				'all_items' => __( 'All Service Types', 'seed' ),
				'parent_item' => __( 'Parent Service Type', 'seed' ),
				'parent_item_colon' => __( 'Parent Service Type:', 'seed' ),
				'edit_item' => __( 'Edit Service Type', 'seed' ),
				'update_item' => __( 'Update Service Type', 'seed' ),
				'add_new_item' => __( 'Add New Service Type', 'seed' ),
				'new_item_name' => __( 'New Service Type Name', 'seed' ),
			),
			'rewrite' => true,
		)
	); 

}

function mash_fourteen_custom_pings( $comment ) {
	$GLOBALS['comment'] = $comment;
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>"><?php echo comment_author_link(); ?></li>
<?php }

add_filter( 'get_comments_number', 'mash_fourteen_comments_number' );
function mash_fourteen_comments_number( $count ) {
	if ( !is_admin() ) {
		global $id;
		$comments_by_type = &separate_comments( get_comments( 'status=approve&post_id=' . $id ) );
		return count( $comments_by_type['comment'] );
	} else {
		return $count;
	}
}

/* gets featured projects */
function getFeaturedProjects($limit=1) {
	$args = array(
		'posts_per_page' => $limit,
		'post_type' => 'project'
	);
	return get_posts($args);
}



