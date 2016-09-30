<?php

namespace Roots\Sage\Shortcodes;

function theme_logo( $atts ){
    $args = \shortcode_atts( [
            'width' => 400,
            'class' => 'aligncenter',
            'style' => '',
        ], $atts );

    $logo = \get_stylesheet_directory_uri() . '\dist\images\logo.1505x180.png';

    $height = intval( ($args['width']*180)/1505 );

    $html = '<img src="' . $logo . '" width="' . $args['width'] . '" height="' . $height . '" class="' . $args['class'] . '" style="' . $args['style'] . '" />';

    return $html;
}
add_shortcode( 'logo', __NAMESPACE__ . '\\theme_logo' );