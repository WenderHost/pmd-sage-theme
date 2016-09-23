<footer class="content-info">
	<div class="container">
		<?php dynamic_sidebar('sidebar-footer'); ?>
    </div>
    <div class="jumbotron ribbon">
        <div class="container">
            <div class="row">
                <div class="col-md-8"><?php
                if (has_nav_menu('footer_navigation')) {
                    wp_nav_menu(['theme_location' => 'footer_navigation']);
                }
                ?></div>
                <div class="col-md-4 copyright">&copy; <?php echo date('Y') ?> <?php bloginfo('title'); ?>. All rights reserved.</div>
            </div>
        </div>
    </div><!-- .jumbotron.ribbon -->
</footer>