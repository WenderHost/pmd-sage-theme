<header class="banner">
  <nav class="navbar navbar-default">
    <div class="container">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="/"><img width="32" height="32" title="" alt="" src="<?= get_template_directory_uri() ?>/dist/images/icon.256x256.png" /></a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right" id="bs-example-navbar-collapse-1">
          <?php
          if (has_nav_menu('primary_navigation')) :
            wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav navbar-nav', 'walker' => new wp_bootstrap_navwalker()]);
          endif;
          ?>
      </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
  </nav>
</header>
<?php
if( is_front_page() ){ ?>
<div class="jumbotron withbackground">
  <div class="container">
    <div class="jumbotron-content">
      <h1 class="jumbotron-title logo">PickUpMyDonation.com</h1>
      <h3>Schedule your donation pick up:</h3>
      <?= do_shortcode( '[donationform nextpage="select-your-organization" form="0"]' ); ?>
      <p><em>Thank you for choosing PickUpMyDonation.com for your donation needs!</em></p>
      <p><em>In a few simple steps, we will have your request in our system.<br />Get the process started by entering your Zip Code in the form above.</em></p>
    </div>
  </div>
</div>
<div class="jumbotron ribbon">
  <div class="container ribbon">
    <div class="row">
      <div class="col-md-12">
        <p class="lead" id="stats-since">Loading stats...</p>
      </div>
    </div>
  </div>
</div>
<?php } ?>