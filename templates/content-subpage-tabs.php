<?php
$args = [
    'child_of' => $post->ID,
    'sort_order' => 'asc',
    'sort_column' => 'menu_order',
];
$pages = get_pages( $args );
if( 0 == count( $pages ) ){
    echo '<div class="alert alert-info">No subpages found.</div>';
}
?>
<div class="sub-page-tabs">

  <ul class="nav nav-tabs" role="tablist">
    <?php
    $x = 0;
    foreach ($pages as $page ) {
        $class = ( $x == 0 )? ' class="active"' : '';
        echo '<li role="presentation"' . $class . '><a href="#' . $page->post_name . '" aria-controls="' . $page->post_name . '" role="tab" data-toggle="tab">' . get_the_title( $page->ID ) . '</a></li>';
        $x++;
    }
    ?>
  </ul>

  <div class="tab-content">
    <?php
    $x = 0;
    foreach( $pages as $page ){
        $classes = ['tab-pane'];
        if( $x == 0 )
             $classes[] = 'active';
        echo '<div role="tabpanel" class="' . implode( ' ', $classes ) . '" id="' . $page->post_name . '">';
        echo '<h3>' . $page->post_title . '</h3>';
        echo apply_filters( 'the_content', $page->post_content );
        //echo '<pre>$page = '.print_r($page,true).'</pre>';
        echo '</div>';
        $x++;
    }
    ?>
  </div>

</div>