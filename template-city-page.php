<?php
/*
Template Name: City Page
*/
while (have_posts()) :
    the_post();
    get_template_part('templates/city-page', 'hero-unit');
    //get_template_part('templates/content', 'page');
    ?>
    <div class="container">
        <div class="col-md-8">
            <?php the_content(); ?>
        </div>
        <div class="col-md-4 sidebar">
            <?php
            $nonprofit_partners = get_post_meta( $post->ID, 'non_profit_partner', true );

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
              }
              echo '</div>';
            }

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