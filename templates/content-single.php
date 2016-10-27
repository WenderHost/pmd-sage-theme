<?php while (have_posts()) :
    the_post(); ?>
  <article <?php post_class(); ?>>
    <?php get_template_part('templates/entry-meta-single'); ?>
    <?php
    if (has_post_thumbnail()) {
        $feature_image_url = get_the_post_thumbnail_url();
        $feature_css_class = get_post_meta($post->ID, 'feature_css_class', true);
        if (empty($feature_css_class)) {
            $feature_css_class = 'page-width';
        }

        $feature_image_h = get_post_meta($post->ID, 'feature_height', true);
        if (! empty($feature_image_h) && is_numeric($feature_image_h)) {
            $feature_image_h = ' height: ' . $feature_image_h . 'px;';
        } elseif ('page-width' == $feature_css_class) {
            $feature_image_id = get_post_thumbnail_id($post->ID);
            $feature_image_meta = wp_get_attachment_metadata($feature_image_id);
            $feature_image_h = ' height: ' . $feature_image_meta['height'] . 'px;';
        }

        $feature_format = '<div class="feature hidden-sm hidden-xs %1$s" style="background: #eee url(%2$s) no-repeat center; background-size: cover;%3$s"></div>';
        echo sprintf($feature_format, $feature_css_class, $feature_image_url, $feature_image_h);
        $feature_format = '<div class="feature hidden-lg hidden-md %1$s"><img src="%2$s" style="height: auto; width: 100%%;"/></div>';
        echo sprintf($feature_format, $feature_css_class, $feature_image_url, $feature_image_h);
    }
    ?>
    <header>
      <h1 class="entry-title"><?php the_title(); ?></h1>
    </header>
    <div class="entry-content">
        <?php the_content(); ?>
    </div>
    <footer>
        <?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
    </footer>
    <?php comments_template('/templates/comments.php'); ?>
  </article>
<?php endwhile; ?>
<?php get_template_part('templates/content', 'partner-cta'); ?>
