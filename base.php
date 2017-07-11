<?php

use Roots\Sage\Setup;
use Roots\Sage\Wrapper;

?>

<!doctype html>
<html <?php language_attributes(); ?>>
    <?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if IE]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
      $full_width_pages = [];
      $page_template = '';
      if(is_page())
        $page_template = basename( get_page_template() );
      global $post;
      $container_class = (
        is_single()
        || is_front_page()
        || in_array($post->post_name, $full_width_pages)
        || 'template-page-with-partners-cta.php' == $page_template
        || 'template-tabs-with-partners-cta.php' == $page_template
        || 'template-city-page.php' == $page_template )
      ? 'container-fluid' : 'container';
    ?>
    <div class="wrap <?= $container_class ?>" role="document">
      <div class="content row">
        <main class="main">
            <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Setup\display_sidebar()) : ?>
          <aside class="sidebar">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      do_action('get_footer');
      get_template_part('templates/footer');
      wp_footer();
    ?>
  </body>
</html>
