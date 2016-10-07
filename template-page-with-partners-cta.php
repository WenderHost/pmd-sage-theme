<?php
/*
Template Name: Partners CTA
*/
?>
<?php while (have_posts()) : the_post(); ?>
  <div class="container">
      <?php get_template_part('templates/page', 'header'); ?>
      <?php get_template_part('templates/content', 'page'); ?>
  </div>
  <?php get_template_part('templates/content', 'partner-cta'); ?>
<?php endwhile; ?>
