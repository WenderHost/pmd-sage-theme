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
            if( $nonprofit_id = get_post_meta( $post->ID, 'non_profit_partner', true ) ){
                ?>
                <div class="widget partner">
                    <h3>Featured Non Profit Partner</h3>
                <?php
                $nonprofit_website = get_post_meta( $nonprofit_id, 'website', true );
                $nonprofit_format = ( ! empty( $nonprofit_website ) )? '<a href="%2$s" target="_blank">%1$s</a>' : '$s';

                if( $nonprofit_thumbnail = get_the_post_thumbnail( $nonprofit_id, 'large', ['style'=>'max-width: 100%; height: auto;'] ) )
                    echo sprintf( $nonprofit_format, $nonprofit_thumbnail, $nonprofit_website );
                ?>
                    <p><?= sprintf( $nonprofit_format, get_the_title( $nonprofit_id ), $nonprofit_website ); ?></p>
                </div>
            <?php
            }

            if( $priority_id = get_post_meta( $post->ID, 'priority_partner', true ) ){
                $priority_website = get_post_meta( $priority_id, 'website', true );
                $priority_format = ( ! empty( $priority_website ) )? '<a href="%2$s" target="_blank">%1$s</a>' : '$s';
                ?>
                <div class="widget partner">
                    <h3>Priority Partner</h3>
                <?php
                if( $priority_thumbnail = get_the_post_thumbnail( $priority_id, 'large', ['style'=>'max-width: 100%; height: auto;'] ) )
                    echo sprintf( $priority_format, $priority_thumbnail, $priority_website );;
                ?>
                    <p><?= sprintf( $priority_format, get_the_title( $priority_id ), $priority_website );; ?></p>
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