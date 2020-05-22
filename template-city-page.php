<?php
/*
Template Name: City Page
*/
while (have_posts()) :
    the_post();
    $realtor_ads = [];
    $nonprofit_partners = get_post_meta( $post->ID, 'non_profit_partner', true );
    get_template_part('templates/city-page', 'hero-unit');
    //get_template_part('templates/content', 'page');
    ?>
    <div class="container">
        <div class="col-md-8">
            <?php
            the_content();
            if( is_array( $nonprofit_partners ) && 0 < count( $nonprofit_partners ) ){
                foreach( $nonprofit_partners as $nonprofit_id ){
                    $desc = get_post_meta( $nonprofit_id, 'realtor_description', true );
                    if( ! empty( $desc ) ){
                        echo '<h3>Buying or Selling in ' . get_post_meta( $post->ID, 'city', true ) . '</h3>';
                        echo $desc;
                    }
                }
            }
            ?>
        </div>
        <div class="col-md-4 sidebar">
            <?php

            /**
             * Featured Non-Profit Partner
             */
            if( is_array( $nonprofit_partners ) && 0 < count( $nonprofit_partners ) ){
              echo '<div class="widget partner">';
              $partner_text = ( 1 < count( $nonprofit_partners ) )? 'Partners' : 'Partner' ;
              echo '<h3>Featured Non Profit ' . $partner_text . '</h3>';
              foreach( $nonprofit_partners as $nonprofit_id ){
                $website = ( $url = get_post_meta( $nonprofit_id, 'website', true ) )? $url : '' ;
                $format = ( ! empty( $website ) )? '<a href="%2$s" target="_blank">%1$s</a>' : '%1$s';
                if( $thumbnail = get_the_post_thumbnail( $nonprofit_id, 'large', ['style'=>'max-width: 100%; height: auto;'] ) )
                    echo sprintf( $format, $thumbnail, $website );
                echo '<p>' . sprintf( $format, get_the_title( $nonprofit_id ), $website ) . '</p>';

                $realtor_ad = ( $realtor_ad = get_post_meta( $nonprofit_id, 'realtor_ad_medium_banner', true ) )? $realtor_ad : false ;
                $realtor_ad_link = ( $realtor_ad_link = get_post_meta( $nonprofit_id, 'realtor_ad_link', true ) )? $realtor_ad_link : false ;

                if( $realtor_ad )
                    $realtor_ads[] = '<a href="' . $realtor_ad_link . '"><img src="' . wp_get_attachment_url( $realtor_ad['ID'] ) . '" style="width: 100%; height: auto;"></a>';
              }
              echo '</div>';
            }

            /**
             * Priority Partner
             */
            if( $priority_id = get_post_meta( $post->ID, 'priority_partner', true ) ){
                $priority_website = get_post_meta( $priority_id, 'website', true );
                $priority_format = ( ! empty( $priority_website ) )? '<a href="%2$s" target="_blank">%1$s</a>' : '%1$s';
                ?>
                <div class="widget partner">
                    <h3>Priority Partner</h3>
                <?php
                if( $priority_thumbnail = get_the_post_thumbnail( $priority_id, 'large', ['style'=>'max-width: 100%; height: auto;'] ) )
                    echo sprintf( $priority_format, $priority_thumbnail, $priority_website );
                ?>
                    <p><?= sprintf( $priority_format, get_the_title( $priority_id ), $priority_website ); ?></p>
                </div>
            <?php
            }

            /**
             * REALTOR AD
             */
            if( 0 < count($realtor_ads) ){
                echo '<div class="widget" style="margin: 1em 0;">';
                foreach( $realtor_ads as $ad ){
                    echo $ad;
                }
                echo '</div>';
            }

            if( $sidebar_content = get_post_meta( $post->ID, 'sidebar_content', true ) ){
                $sidebar_content = apply_filters( 'the_content', $sidebar_content );
                ?>
                <div class="widget">
                    <h3>Additional Information</h3>
                    <?= $sidebar_content ?>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <?php
endwhile;
?>