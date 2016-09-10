<?php

namespace Roots\Sage\Extras;

use Roots\Sage\Setup;

/**
 * Add <body> classes
 */
function body_class($classes) {
  // Add page slug if it doesn't exist
  if (is_single() || is_page() && !is_front_page()) {
    if (!in_array(basename(get_permalink()), $classes)) {
      $classes[] = basename(get_permalink());
    }
  }

  // Add class if sidebar is active
  if (Setup\display_sidebar()) {
    $classes[] = 'sidebar-primary';
  }

  return $classes;
}
add_filter('body_class', __NAMESPACE__ . '\\body_class');

/**
 * Clean up the_excerpt()
 */
function excerpt_more() {
  return ' &hellip; <a href="' . get_permalink() . '">' . __('Continued', 'sage') . '</a>';
}
add_filter('excerpt_more', __NAMESPACE__ . '\\excerpt_more');

/**
 * Load Google Fonts
 */
function google_fonts(){
  wp_register_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Francois+One|Open+Sans' );
  wp_enqueue_style( 'google-fonts' );
}
add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\\google_fonts' );

/**
 * Get estimated reading time
 */
function reading_time($text){
    $words = str_word_count(strip_tags($text));
    $min = ceil($words / 200);
    return $min . ' min read';
}