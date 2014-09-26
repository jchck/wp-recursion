<?php 

/**
 * Filters wp_title to print a neat <title> tag based on what is being viewed.
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string The filtered title.
 */

function recursion_wp_title( $title, $sep ) {
	if ( is_feed() ) {
		return $title;
	}

	global $page, $paged;

	// Add the blog name
	$title .= get_bloginfo( 'name', 'display' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) ) {
		$title .= " $sep $site_description";
	}

	// Add a page number if necessary:
	if ( ( $paged >= 2 || $page >= 2 ) && ! is_404() ) {
		$title .= " $sep " . sprintf( __( 'Page %s', 'wood-table' ), max( $paged, $page ) );
	}

	return $title;
}
add_filter( 'wp_title', 'recursion_wp_title', 10, 2 );

/**
 * Enque scripts & styles to be used
 */

function recursion_scripts(){
	wp_enqueue_style( 'base-style', get_stylesheet_uri(), false, null );
}
add_action( 'wp_enqueue_scripts', 'recursion_scripts' );