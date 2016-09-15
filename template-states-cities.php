<?php
/*
Template Name: SEO States, Cities, Zipcodes
*/
?>

<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part('templates/page', 'header'); ?>
  <?php get_template_part('templates/content', 'states-cities'); ?>
<?php endwhile; ?>
