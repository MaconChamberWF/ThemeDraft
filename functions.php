<?php

// ------------------------------------------------
// ---------- Add post thumbnail support ----------
// ------------------------------------------------
add_theme_support('post-thumbnails');
// add_image_size('xlarge', 1600, 1600);
add_image_size('hero', 1600, 589, true);
add_image_size('home-hero', 1600, 842, true);
add_image_size('intro', 800, 560, true);
add_image_size('member', 700, 800, true);
// add_image_size('hero-subpage-mobile', 600, 300, true);
// add_image_size('bucket', 850, 600, true);

// ----------------------------------------------
// ---------- Add page excerpt support ----------
// ----------------------------------------------
add_post_type_support('page', 'excerpt');

// --------------------------------------------
// ---------- Enable sidebar widgets ----------
// --------------------------------------------
if (function_exists('register_sidebar')) {
   register_sidebar(array(
      'id' => 'sidebar-1',
       'before_widget' => '<div id="%1$s" class="widget %2$s">',
       'after_widget' => '</div>',
       'before_title' => '<h4>',
       'after_title' => '</h4>',
    ));
}

// ----------------------------------------------------
// ---------- Enable custom navigation menus ----------
// ----------------------------------------------------
if (function_exists('register_nav_menus')) {
  register_nav_menus(array(
      'main_nav' => 'Primary Menu'
  ));
}

// ----------------------------------------------------------------------------------
// ---------- Create the home (homepage) option in custom navigation menus ----------
// ----------------------------------------------------------------------------------
function home_page_menu_item($args) {
  $args['show_home'] = true;
  return $args;
}
add_filter('wp_page_menu_args', 'home_page_menu_item');


// ------------------------------------------------
// ---------- Excerpt Length ----------------------
// ------------------------------------------------
function excerpt($limit) {
	 $excerpt = explode(' ', get_the_excerpt(), $limit);
	 if (count($excerpt)>=$limit) {
	 array_pop($excerpt);
	 $excerpt = implode(" ",$excerpt).'...';
	 } else {
	 $excerpt = implode(" ",$excerpt);
	 }
	 $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
	 return $excerpt;
}


// ------------------------------------------------
// ---------- ACF Theme Settings ------------------
// ------------------------------------------------
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// ------------------------------------------------
// ---------- Yoast Breadcrumbs  ------------------
// ------------------------------------------------

add_filter('wpseo_breadcrumb_links', 'my_wpseo_breadcrumb_links');
function my_wpseo_breadcrumb_links($links) {
  if (is_singular('communities')) {
    $breadcrumb[] = array(
      'url' => site_url('relocate/communities'),
      'text' => 'Communities',
    );
    array_splice($links, 1, -1, $breadcrumb);
  }
  // if (is_category()) {
  //   $breadcrumb[] = array(
  //     'url' => get_permalink(get_option('page_for_posts')),
  //     'text' => get_the_title(get_option( 'page_for_posts' )),
  //   );
  //   array_splice($links, 1, -1, $breadcrumb);
  // }
  if (is_singular('post')) {
    $breadcrumb[] = array(
      'url' => get_permalink(get_option('page_for_posts')),
      'text' => get_the_title(get_option( 'page_for_posts' )),
    );
    $breadcrumb[] = array(
      'url' => get_permalink(get_option('page_for_posts')),
      'text' => 'Article',
    );
    array_splice($links, 1, -1, $breadcrumb);
    array_pop($links);
  }

  return $links;
}



// ------------------------------------------------
// ---------- Custom Post Types -------------------
// ------------------------------------------------
// Register Custom Post Type
function custom_post_type() {

	$labels = array(
		'name'                  => _x( 'Communities', 'Post Type General Name', 'text_domain' ),
		'singular_name'         => _x( 'Community', 'Post Type Singular Name', 'text_domain' ),
		'menu_name'             => __( 'Communities', 'text_domain' ),
		'name_admin_bar'        => __( 'Community', 'text_domain' ),
		'archives'              => __( 'Item Archives', 'text_domain' ),
		'attributes'            => __( 'Item Attributes', 'text_domain' ),
		'parent_item_colon'     => __( 'Parent Item:', 'text_domain' ),
		'all_items'             => __( 'All Items', 'text_domain' ),
		'add_new_item'          => __( 'Add New Item', 'text_domain' ),
		'add_new'               => __( 'Add New', 'text_domain' ),
		'new_item'              => __( 'New Item', 'text_domain' ),
		'edit_item'             => __( 'Edit Item', 'text_domain' ),
		'update_item'           => __( 'Update Item', 'text_domain' ),
		'view_item'             => __( 'View Item', 'text_domain' ),
		'view_items'            => __( 'View Items', 'text_domain' ),
		'search_items'          => __( 'Search Item', 'text_domain' ),
		'not_found'             => __( 'Not found', 'text_domain' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'text_domain' ),
		'featured_image'        => __( 'Featured Image', 'text_domain' ),
		'set_featured_image'    => __( 'Set featured image', 'text_domain' ),
		'remove_featured_image' => __( 'Remove featured image', 'text_domain' ),
		'use_featured_image'    => __( 'Use as featured image', 'text_domain' ),
		'insert_into_item'      => __( 'Insert into item', 'text_domain' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'text_domain' ),
		'items_list'            => __( 'Items list', 'text_domain' ),
		'items_list_navigation' => __( 'Items list navigation', 'text_domain' ),
		'filter_items_list'     => __( 'Filter items list', 'text_domain' ),
	);
	$args = array(
		'label'                 => __( 'Community', 'text_domain' ),
		'description'           => __( 'Communities', 'text_domain' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'thumbnail', 'excerpt'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-location-alt',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => false,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'communities', $args );

}
add_action( 'init', 'custom_post_type', 0 );



// ------------------------------------------------
// ---------- API Endpoints -----------------------
// ------------------------------------------------
add_action('rest_api_init', 'custom_register_route');

function custom_register_route() {
  register_rest_route('macon/v1', 'news', array(
      'methods' => 'GET',
      'callback' => 'fetch_news_data'
    )
  );
}


// Newsroom API Query
function fetch_news_data($data) {
  $postTypes = $data->get_param('post_types') ?? array('post');
  $postsPerPage = $data->get_param('per_page') ?? '12';
  $categories = $data->get_param('categories') ?? null;
  $page = $data->get_param('page') ?? 1;
  $offset = $data->get_param('offset') ?? 0;

  // Get posts
  $posts = array();
  $args = array(
    'post_type' => $postTypes,
    'posts_per_page' => $postsPerPage,
    'ignore_sticky_posts' => true,
    'offset' => $offset,
    'orderby' => 'publish_date',
    'order' => 'DESC',
    'paged' => $page
  );

	if($categories) {
		$taxQuery = array('relation' => 'AND');

		if($categories) {
			$taxQuery[] = array(
				'taxonomy' => 'category',
				'field' => 'term_id',
				'terms' => $categories
			);
		}

		$args['tax_query'] = $taxQuery;
	}

  $query = new WP_Query($args);
  $total_posts = $query->found_posts;
  $max_pages = $query->max_num_pages;

  while($query->have_posts()): $query->the_post();
    $id = get_the_ID();
 		$category = get_the_category($id)[0];

    if(get_post_thumbnail_id($id)) {
      $featuredImage = wp_get_attachment_image(get_post_thumbnail_id($id), 'intro');
    } else {
      $featuredImage = wp_get_attachment_image(get_field('default_hero_image', 'option'), 'intro');
    }

    $posts[] = array(
      'id' => $id,
      'title' => get_the_title(),
      'date' => get_the_date(),
      'link' => get_the_permalink(),
      'featured_image' => $featuredImage,
      'category' => $category->name
    );
  endwhile;

  wp_reset_postdata();

  $response = rest_ensure_response($posts);
  $response->header('X-WP-Total', (int) $total_posts);
  $response->header('X-WP-TotalPages', (int) $max_pages);
  $response->header('X-WP-MetaQuery', (int) $keyIndustries);

  return $response;
}
function enqueue_theme_scripts() {
  wp_enqueue_script(
    'theme-tabs',
    get_template_directory_uri() . '/js/tabs.js',
    array(),
    null,
    true
  );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_scripts');


//**********//
function enqueue_dci_cost_of_living_calculator_scripts() {
    global $post;

    if (is_a($post, 'WP_Post') && has_shortcode($post->post_content, 'dci-cost-of-living-calculator')) {
        wp_enqueue_script('dci-cost-of-living-calculator', plugin_dir_url(__FILE__) . 'dist/js/scripts.js', [], '0.1.1', true);

        $to_places = get_field('to_places', 'option');
        $places = [];

        // Create new array to cast value from String to Integer
        if (is_array($to_places)) {
            $i = 0;
            foreach ($to_places as $place) {
                $places[$i]['label'] = $place['label'];
                $places[$i]['value'] = intval($place['value']);
                $places[$i]['niceValue'] = substr($place['label'], 3);
                $i++;
            }
        }

        $api_key     = get_field('api_key', 'option');
        $intro_text  = get_field('col_intro_text', 'option');
        $intro_image = get_field('col_intro_image', 'option');
        $intro_video_id = get_field('col_intro_video_youtube_id', 'option');
        $marquee_image = get_field('col_marquee_image', 'option');
        $disclaimer_text = get_field('disclaimer_text', 'option');

        if (is_array($marquee_image)) {
            $marquee_image = $marquee_image['sizes']['large'];
        }

        wp_localize_script('dci-cost-of-living-calculator', 'dciCostOfLivingJS', [
            'siteURL'     => site_url(),
            'toPlaces'    => $places,
            'api_key'     => $api_key,
            'intro_text'  => $intro_text,
            'intro_image' => $intro_image,
            'intro_video_id' => $intro_video_id,
            'marquee_image' => $marquee_image,
            'disclaimer_text' => $disclaimer_text
        ]);
    }
}
add_action('wp_enqueue_scripts', 'enqueue_dci_cost_of_living_calculator_scripts');

add_theme_support( 'elementor' );