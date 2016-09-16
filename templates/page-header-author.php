<?php
$author_id = get_the_author_meta('ID');
?>
<div class="page-header"><?= get_avatar($author_id); ?><h2><?= get_the_author(); ?></h2><?php if ($description = get_the_author_meta('description')) { echo '<p class="note">' . $description . '</p>'; } ?></div>
