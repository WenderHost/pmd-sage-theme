<?php
$background_image = '';
if( has_post_thumbnail( $post->ID ) ){
  $img_src = get_the_post_thumbnail_url( $post->ID, 'full' );
  $background_image = 'style="background-image: url(' . $img_src . '); background-size: cover;"';
}

if( $non_profit_id = get_post_meta( $post->ID, 'non_profit_partner', true ) ){
  $non_profit_name = get_the_title( $non_profit_id );
}

$city = get_post_meta( $post->ID, 'city', true );

$cta_top_margin = ( $cta_top_margin = get_post_meta( $post->ID, 'cta_top_margin', true ) )? $cta_top_margin : 60;
?>
<div class="jumbotron withbackground" <?php if( ! empty( $background_image ) ) echo $background_image ?>>
  <div class="container">
    <div class="col-md-8">
      <h1 class="page-title"><span>We make it easy to donate in</span> <?= $city ?></h1>
      <?php
      if( $hero_text = get_post_meta( $post->ID, 'hero_text', true ) ){
        echo apply_filters( 'the_content', $hero_text );
      }
      ?>
    </div>
    <div class="col-md-4" style="margin-top: <?= $cta_top_margin ?>px;">
        <h4>Request a donation pick up now:</h4>
        <?= do_shortcode('[donationform template="form0.city-page" nextpage="select-your-organization"]'); ?>
    </div>
  </div>
</div>