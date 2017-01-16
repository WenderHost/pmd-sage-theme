<?php
$features = [
  'scheduling' => [
    'desc' => 'Donation Scheduling on your website',
    'content' => '&#10004;',
    'plan' => ['shared','exclusive']
  ],
  'brand' => [
    'desc' => 'PickUpMyDonation.com Brand Use',
    'content' => '&#10004;',
    'plan' => ['shared','exclusive']
  ],
  'referrals' => [
    'desc' => 'Donation Referrals',
    'content' => [
      'shared' => 'Shared',
      'exclusive' => 'Exclusive'
    ],
    'plan' => ['shared','exclusive']
  ],
  'report' => [
    'desc' => 'Monthly Donor Report',
    'content' => '&#10004;',
    'plan' => ['exclusive']
  ],
  'advertising' => [
    'desc' => 'Inclusion in National Advertising',
    'content' => '&#10004;',
    'plan' => ['exclusive']
  ],
];
?>
<form class="pricing-table" action="/sign-up/" method="get">
  <table class="pricing-table">
    <colgroup>
      <col style="width: 40%" />
      <col style="width: 30%" />
      <col style="width: 30%" />
    </colgroup>
    <thead>
      <tr>
        <th>Features &amp; Benefits</th>
        <th><h3>Join the Network</h3></th>
        <th><h3>Exclusive Partnership</h3></th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach( $features as $feature ){
        $shared_content = '&nbsp;';
        if( in_array( 'shared', $feature['plan'] ) ){
          if( is_array( $feature['content'] ) ){
            $shared_content = $feature['content']['shared'];
          } else {
            $shared_content = $feature['content'];
          }
        }

        $exclusive_content = '&nbsp;';
        if( in_array( 'exclusive', $feature['plan'] ) ){
          if( is_array( $feature['content'] ) ){
            $exclusive_content = $feature['content']['exclusive'];
          } else {
            $exclusive_content = $feature['content'];
          }
        }
        ?>
      <tr class="visible-xs" aria-hidden="true">
        <td>&nbsp;</td>
        <td colspan="2"><?= $feature['desc'] ?></td>
      </tr>
      <tr>
        <td><?= $feature['desc'] ?></td>
        <td><?= $shared_content ?></td>
        <td><?= $exclusive_content ?></td>
      </tr>
        <?php
      }
      ?>
      </tbody>
      <tfoot>
        <tr>
          <td>&nbsp;</td>
          <td><h3>$29/month</h3></td>
          <td>
              <h4>Starts at $99/month*</h4>
              <div class="form-group">
                <select name="market-size" class="form-control" style="max-width: 200px; margin: 0 auto;">
                  <option value="">Select your market size:</option>
                  <option value="exclusivesmallmarket_2_1month_99">Metro Population less than 100,000 &ndash; $99/month</option>
                  <option value="exclusivemediummarket_3_1month_199">Metro Population between 100K - 999,999 &ndash; $199/month</option>
                  <option value="exclusivekeymarket_4_1month_249">Metro Population over 1 million &ndash; $249/month</option>
                </select>
              </div>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
          <td><a class="btn btn-primary btn-lg" href="/join-our-network/">Sign Up</a></td>
          <td><input type="submit" value="Sign Up" class="btn btn-primary btn-lg" /></td>
        </tr>
      </tfoot>
  </table>
</form>
<hr>
  <p><sup>*</sup> Your metro area's population determines your market size:</p>
  <ul>
    <li>Small Market ($99/month) &ndash; Metro Population less than 100,000</li>
    <li>Medium Market ($199/month) &ndash; Metro Population between 100,000 - 999,999</li>
    <li>Key Market ($249/month) &ndash; Metro Population over 1 million</li>
  </ul>
