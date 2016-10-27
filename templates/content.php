<article <?php post_class(); ?>>
  <header>
    <h2 class="entry-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
  </header>
  <?php
  if (has_post_thumbnail()) {
    the_post_thumbnail('feature-thumbnail', ['class' => 'feature-thumbnail']);
  }
  ?>
  <div class="entry-summary lead">
    <?php the_excerpt(); ?>
  </div>
  <?php get_template_part('templates/entry-meta'); ?>
</article>
