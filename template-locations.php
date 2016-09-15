<?php
/*
Template Name: Providers by Location
*/
?>

<?php while ( have_posts() ) : the_post(); ?>
  <?php get_template_part( 'templates/page', 'header' ); ?>
  <?php the_content(); ?>
  		<h4>Find a Pick Up Provider near you:</h4>
		<div class="row">
		<?php
$args = array(
	'post_type' => 'page',
	'seo_page_title' => 'Donation Pick Up',
	'posts_per_page' => -1,
	'orderby' => 'title',
	'order' => 'ASC',
);
$seo_pages_query = new WP_Query( $args );

$seo_pages = array();
if ( $seo_pages_query->have_posts() ) {
	while ( $seo_pages_query->have_posts() ) {
		$seo_pages_query->the_post();
		$title = get_the_title();
		if ( 'Donation Pick Up' == substr( $title, 0, 16 ) ) {
			$title = trim( str_replace( 'Donation Pick Up', '', $title ) ) . ' Donation Pick Up';
		}
		$seo_pages[] = array( 'title' => $title, 'permalink' =>get_permalink() );
	}
} else {
	$seo_pages = array(
		0 => array( 'title' => 'No pages found!', 'permalink' => '#' ),
		1 => array( 'title' => 'No pages found!', 'permalink' => '#' ),
	);
}

if ( 0 < count( $seo_pages ) ) {
	$cols = 2;
	$pages_per_col = round( count( $seo_pages )/$cols );

	$columns = array_chunk( $seo_pages, $pages_per_col );

	for ( $x = 0; $x < $cols; $x++ ) {
		$format = '<div class="col-md-6" style="text-align: left;"><ul class="locations">%1$s</ul></div>';
		$column_pages = $columns[$x];
		$html = array();
		foreach ( $column_pages as $page ) {
			$html[] = '<li><a href="' . $page['permalink'] . '">' . $page['title'] . '</a></li>';
		}
		$page_columns[] = sprintf( $format, implode( "\n", $html ) );
	}

	$format = '%1$s';
	echo sprintf( $format, implode( "\n", $page_columns ) );
}
?>
		</div>
<?php endwhile; ?>
