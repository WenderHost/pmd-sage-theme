<!-- BEGIN front-page.php -->
<?php while (have_posts()) : the_post(); ?>
  <?php get_template_part( 'templates/front-page', 'body' ); ?>
<?php endwhile; ?>
