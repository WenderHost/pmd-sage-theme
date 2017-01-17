<?php

namespace Roots\Sage\Shortcodes;

function theme_logo( $atts ){
    $args = \shortcode_atts( [
            'width' => 400,
            'class' => 'aligncenter',
            'style' => '',
        ], $atts );

    $logo = \get_stylesheet_directory_uri() . '/dist/images/logo.1505x180.png';

    $height = intval( ($args['width']*180)/1505 );

    $html = '<img src="' . $logo . '" width="' . $args['width'] . '" height="' . $height . '" class="' . $args['class'] . '" style="' . $args['style'] . '" />';

    return $html;
}
add_shortcode( 'logo', __NAMESPACE__ . '\\theme_logo' );

/**
 * Loads a /template/ file.
 *
 * @param      array  $atts   Specify the file to be loaded as $atts['content']
 *
 * @return     string  Contents of loaded file with 'the_content' filters applied
 */
function load_content( $atts ){
    $args = \shortcode_atts( [
        'content' => null,
    ], $atts );

    if( is_null( $args['content'] ) )
        return '<div class="alert alert-error">Please specify your content via the `content` attribute.</div>';

    $file = \get_stylesheet_directory() . '/templates/' . $args['content'] . '.php';
    if( ! file_exists( $file ) )
        return '<div class="alert alert-error">File (<code>' . basename( $file ) . '</code>) not found!</div>';

    ob_start();
    include( $file );
    $file_contents = ob_get_clean();
    return $file_contents;
}
add_shortcode( 'load', __NAMESPACE__ . '\\load_content' );