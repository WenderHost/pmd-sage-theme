<?php

namespace Roots\Sage\JqueryCDN;

/**
 * Load jQuery from jQuery's CDN with a local fallback
 *
 * You can enable/disable this feature in functions.php (or lib/setup.php if you're using Sage):
 * add_theme_support('soil-jquery-cdn');
 */
function register_jquery() {
  $jquery_version = wp_scripts()->registered['jquery']->ver;

  wp_deregister_script('jquery');

  wp_register_script(
    'jquery',
    'https://code.jquery.com/jquery-' . $jquery_version . '.min.js',
    [],
    null,
    true
  );

    if( ! wp_script_is( 'jquery', 'done' ) ){
        wp_enqueue_script( 'jquery' );
    }

    wp_add_inline_script( 'jquery', '(window.jQuery && jQuery.noConflict()) || document.write("<script src=\"' . \includes_url('/js/jquery/jquery.js') . '\"><\/script>")' );
}
add_action('wp_enqueue_scripts', __NAMESPACE__ . '\\register_jquery', 100);