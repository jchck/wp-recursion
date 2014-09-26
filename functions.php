<?php 

function wp_recursion_scripts(){
	wp_enqueue_style( 'base-style', get_stylesheet_uri(), false, null );
}
add_action( 'wp_enqueue_scripts', 'wp_recursion_scripts' );