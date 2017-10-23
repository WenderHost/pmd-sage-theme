<div class="jumbotron withbackground">
  <div class="container">
    <div class="call-to-action">
      <a href="/partner-benefits/" class="btn btn-secondary">Are you a non-profit? <?php get_template_part('dist/svg/inline', 'pointing-hand.svg'); ?></a>
    </div>
    <div class="jumbotron-content">
      <h3>Request a donation pick up now:</h3>
        <?= do_shortcode('[donationform nextpage="select-your-organization"]'); ?>
    </div>
  </div>
</div>
<div class="jumbotron ribbon" id="donors-like-you">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <p class="lead" id="stats-since">Donors like you have contributed <span class="counter" id="total-donations-value"></span> in value to Non-Profits since 2012!</p>
      </div>
    </div>
  </div>
</div>