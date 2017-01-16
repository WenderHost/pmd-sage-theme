<?php
/**
 * Template Name: Pricing
 */
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'pricing-tables'); ?>
<?php endwhile; ?>
