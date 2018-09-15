<?php
/**
 * Author: Ole Fredrik Lie
 * URL: http://olefredrik.com
 *
 * FoundationPress functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @package FoundationPress
 * @since FoundationPress 1.0.0
 */

/** Various clean up functions */
require_once( 'library/cleanup.php' );

/** Required for Foundation to work properly */
require_once( 'library/foundation.php' );

/** Format comments */
require_once( 'library/class-foundationpress-comments.php' );

/** Register all navigation menus */
require_once( 'library/navigation.php' );

/** Add menu walkers for top-bar and off-canvas */
require_once( 'library/class-foundationpress-top-bar-walker.php' );
require_once( 'library/class-foundationpress-mobile-walker.php' );

/** Create widget areas in sidebar and footer */
require_once( 'library/widget-areas.php' );

/** Return entry meta information for posts */
require_once( 'library/entry-meta.php' );

/** Enqueue scripts */
require_once( 'library/enqueue-scripts.php' );

/** Add theme support */
require_once( 'library/theme-support.php' );

/** Add Nav Options to Customer */
require_once( 'library/custom-nav.php' );

/** Change WP's sticky post class */
require_once( 'library/sticky-posts.php' );

/** Configure responsive image sizes */
require_once( 'library/responsive-images.php' );

/** If your site requires protocol relative url's for theme assets, uncomment the line below */
// require_once( 'library/class-foundationpress-protocol-relative-theme-assets.php' );

//Disable default woocommerce stylesheets
add_filter( 'woocommerce_enqueue_styles', '__return_empty_array' );

add_action('wp_ajax_product_filter', 'fetch_products');
add_action('wp_ajax_nopriv_product_filter', 'fetch_products');

function fetch_products(){

	$tax_params = array();
	$form_data = array();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$posts_per_page = $_POST['posts_per_page'][0];

		$form_data = array(
			"pa_brand" => $_POST['Brand'],
			"pa_colour" => $_POST['Colour'],
			"pa_shape" => $_POST['Shape'],
			"pa_material" => $_POST['Material'],
			"pa_gender" => $_POST['Gender'],
			"pa_size" => $_POST['Size'],
		);

	}else{
		//Default value
		$posts_per_page = 20;
	}

    foreach($form_data as $taxonomy => $terms){
        //Checks if zeroth term is empty, if so, this filter should be ignored ie.user selected empty option
        if($terms[0] != ""){
            $tax_params[] = array(
                'taxonomy' => $taxonomy,
                'field' => 'slug',
                'terms' => $terms,
                'operation' => 'IN'
            );
        }
    }

    $params = array('post_type' => 'product',
                    'post_status' => 'publish',
                    'tax_query' => $tax_params,
                    'posts_per_page' => $posts_per_page,
                    'paged' => get_query_var('paged', 1)
    );

    $query = new WP_Query($params);

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		echo json_encode($query);
	}else{
		return $query;
	}
}