<div class="container-fluid" id="partner-cta">
    <div class="jumbotron brand-primary nomargin jumbotron-cta">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-center">Increase donations for your organization</h2>
                    <p class="text-center"><em>Looking to increase donation pick ups for your organization?</em> <br />PickUpMyDonation.com can help. Consider these numbers:</p>
                </div>
            </div><!-- .row -->
            <div class="row" style="margin-bottom: 60px;">
                <div class="col-md-4">
                    <div class="stat circle">
                        <div class="stat-inner">
                            <span class="counter" id="donations-last-month"></span>
                            <div class="caption">Donations last month</div>
                        </div>
                    </div>
                </div><!-- .col-md-4 -->
                <div class="col-md-4">
                    <div class="stat circle sml">
                        <div class="stat-inner">
                            <span class="counter" id="donations-last-month-value"></span>
                            <div class="caption">Last month<br />donation value</div>
                        </div>
                    </div>
                </div><!-- .col-md-4 -->
                <div class="col-md-4">
                    <div class="stat circle">
                        <div class="stat-inner">???
                            <div class="caption">How many<br />did you miss?</div>
                        </div>

                    </div>
                </div><!-- .col-md-4 -->
            </div><!-- .row -->
            <?php if( ! is_page('partner-organizations') ){ ?>
            <div class="row">
                <div class="col-md-12">
                    <p class="text-center"><a href="/<?php echo (is_page('partner-organizations'))? 'sign-up' : 'partner-organizations' ?>/" class="btn btn-primary btn-lg">Become a Partner Organization <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span></a></p>
                </div>
            </div>
            <?php } ?>
        </div><!-- .container -->
    </div><!-- .jumbotron -->
</div>