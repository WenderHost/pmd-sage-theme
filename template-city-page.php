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
            if( $non_profit_id = get_post_meta( $post->ID, 'non_profit_partner', true ) ){
                ?>
                <div class="widget partner">
                    <h3>Featured Non Profit Partner</h3>
                <?php
                if( $thumbnail = get_the_post_thumbnail( $non_profit_id, 'large', ['style'=>'max-width: 100%; height: auto;'] ) ){
                    echo $thumbnail;
                }
                ?>
                    <p><?php echo get_the_title( $non_profit_id ); ?></p>
                </div>
            <?php
            }

            if( $priority_id = get_post_meta( $post->ID, 'priority_partner', true ) ){
                ?>
                <div class="widget partner">
                    <h3>Priority Partner</h3>
                <?php
                if( $thumbnail = get_the_post_thumbnail( $priority_id, 'large', ['style'=>'max-width: 100%; height: auto;'] ) ){
                    echo $thumbnail;
                }
                ?>
                    <p><?php echo get_the_title( $priority_id ); ?></p>
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