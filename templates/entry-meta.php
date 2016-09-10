<?php
$author_id = get_the_author_meta('ID');

$content = get_the_content();
$reading_time = Roots\Sage\Extras\reading_time( $content );

$post_year = get_the_date( 'Y' );
$current_year = date( 'Y' );
$date_format = ( $current_year != $post_year )? 'M j, Y' : 'M j' ;
?>
<div class="byline">Published on <time class="updated" datetime="<?= get_post_time('c', true); ?>"><?= get_the_date( $date_format ); ?></time> &bull; <?= $reading_time ?></div>
