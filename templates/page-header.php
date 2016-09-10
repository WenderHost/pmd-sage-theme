<?php use Roots\Sage\Titles; ?>

<?php if( is_author() ){
	get_template_part('templates/page-header', 'author');
} else { ?>
<div class="page-header">
  <h1><?= Titles\title(); ?></h1>
</div>
<?php } ?>
