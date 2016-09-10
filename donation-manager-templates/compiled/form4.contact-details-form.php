<?php
use \LightnCandy\SafeString as SafeString;use \LightnCandy\Runtime as LR;return function ($in = null, $options = null) {
    $helpers = array();
    $partials = array();
    $cx = array(
        'flags' => array(
            'jstrue' => false,
            'jsobj' => false,
            'spvar' => true,
            'prop' => false,
            'method' => false,
            'lambda' => false,
            'mustlok' => false,
            'mustlam' => false,
            'echo' => false,
            'partnc' => false,
            'knohlp' => false,
            'debug' => isset($options['debug']) ? $options['debug'] : 1,
        ),
        'constants' => array(),
        'helpers' => isset($options['helpers']) ? array_merge($helpers, $options['helpers']) : $helpers,
        'partials' => isset($options['partials']) ? array_merge($partials, $options['partials']) : $partials,
        'scopes' => array(),
        'sp_vars' => isset($options['data']) ? array_merge(array('root' => $in), $options['data']) : array('root' => $in),
        'blparam' => array(),
        'partialid' => 0,
        'runtime' => '\LightnCandy\Runtime',
    );
    
    return '<form action="" method="post">
	<div class="row">
		<div class="form-group col-xs-4">
			<label>First Name <span class="red">*</span></label>
			<input type="text" class="form-control" name="donor[address][name][first]" value="'.htmlentities((string)((is_array($in) && isset($in['donor_name_first'])) ? $in['donor_name_first'] : null), ENT_QUOTES, 'UTF-8').'">
		</div>
		<div class="form-group col-xs-4">
			<label>Last Name <span class="red">*</span></label>
			<input type="text" class="form-control" name="donor[address][name][last]" value="'.htmlentities((string)((is_array($in) && isset($in['donor_name_last'])) ? $in['donor_name_last'] : null), ENT_QUOTES, 'UTF-8').'">
		</div>
	</div>

	<div class="row">
		<div class="form-group col-xs-12">
			<label>Address <span class="red">*</span></label>
			<input type="text" class="form-control" name="donor[address][address]" value="'.htmlentities((string)((is_array($in) && isset($in['donor_address'])) ? $in['donor_address'] : null), ENT_QUOTES, 'UTF-8').'">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-5">
			<label>City <span class="red">*</span></label>
			<input type="text" class="form-control" name="donor[address][city]" value="'.htmlentities((string)((is_array($in) && isset($in['donor_city'])) ? $in['donor_city'] : null), ENT_QUOTES, 'UTF-8').'">
		</div>
		<div class="form-group col-xs-4">
			<label>State <span class="red">*</span></label>
			'.((is_array($in) && isset($in['state'])) ? $in['state'] : null).'
		</div>
		<div class="form-group col-xs-3">
			<label>ZIP <span class="red">*</span></label>
			<input type="text" class="form-control" name="donor[address][zip]" value="'.htmlentities((string)((is_array($in) && isset($in['donor_zip'])) ? $in['donor_zip'] : null), ENT_QUOTES, 'UTF-8').'">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-6">Pickup address is different from above address?</div>
		<div class="form-group col-xs-2"><label><input type="radio" value="Yes"'.htmlentities((string)((is_array($in) && isset($in['checked_yes'])) ? $in['checked_yes'] : null), ENT_QUOTES, 'UTF-8').' name="donor[different_pickup_address]"> Yes</label></div>
		<div class="form-group col-xs-2"><label><input type="radio" value="No"'.htmlentities((string)((is_array($in) && isset($in['checked_no'])) ? $in['checked_no'] : null), ENT_QUOTES, 'UTF-8').' name="donor[different_pickup_address]"> No</label></div>
	</div>
<div id="different-pickup-address">
	<div class="row">
		<div class="form-group col-xs-12">
			<label>Pickup Address <span class="red">*</span></label>
			<input type="text" class="form-control" name="donor[pickup_address][address]" value="'.htmlentities((string)((is_array($in) && isset($in['donor_pickup_address'])) ? $in['donor_pickup_address'] : null), ENT_QUOTES, 'UTF-8').'">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-5">
			<label>Pickup City <span class="red">*</span></label>
			<input type="text" class="form-control" name="donor[pickup_address][city]" value="'.htmlentities((string)((is_array($in) && isset($in['donor_pickup_city'])) ? $in['donor_pickup_city'] : null), ENT_QUOTES, 'UTF-8').'">
		</div>
		<div class="form-group col-xs-4">
			<label>Pickup State <span class="red">*</span></label>
			'.((is_array($in) && isset($in['pickup_state'])) ? $in['pickup_state'] : null).'
		</div>
		<div class="form-group col-xs-3">
			<label>Pickup ZIP <span class="red">*</span></label>
			<input type="text" class="form-control" name="donor[pickup_address][zip]" value="'.htmlentities((string)((is_array($in) && isset($in['donor_pickup_zip'])) ? $in['donor_pickup_zip'] : null), ENT_QUOTES, 'UTF-8').'">
		</div>
	</div>
</div>
	<div class="row">
		<div class="form-group col-xs-5">
			<label>Contact Email <span class="red">*</span></label>
			<input type="email" class="form-control" name="donor[email]" value="'.htmlentities((string)((is_array($in) && isset($in['donor_email'])) ? $in['donor_email'] : null), ENT_QUOTES, 'UTF-8').'">
		</div>
		<div class="form-group col-xs-5">
			<label>Contact Phone <span class="red">*</span></label>
			<input type="tel" class="form-control" name="donor[phone]" value="'.htmlentities((string)((is_array($in) && isset($in['donor_phone'])) ? $in['donor_phone'] : null), ENT_QUOTES, 'UTF-8').'">
		</div>
	</div>
	<div class="row">
		<div class="form-group col-xs-6">Preferred method of contact:</div>
		<div class="form-group col-xs-2"><label><input type="radio" value="Phone"'.htmlentities((string)((is_array($in) && isset($in['checked_phone'])) ? $in['checked_phone'] : null), ENT_QUOTES, 'UTF-8').' name="donor[preferred_contact_method]"> Phone</label></div>
		<div class="form-group col-xs-2"><label><input type="radio" value="Email"'.htmlentities((string)((is_array($in) && isset($in['checked_email'])) ? $in['checked_email'] : null), ENT_QUOTES, 'UTF-8').' name="donor[preferred_contact_method]"> Email</label></div>
	</div>
	<div class="row">
		<div class="form-group col-xs-12">
			<label>Preferred Donor Code</label>
			<input type="text" class="form-control" name="donor[preferred_code]" value="'.htmlentities((string)((is_array($in) && isset($in['preferred_code'])) ? $in['preferred_code'] : null), ENT_QUOTES, 'UTF-8').'" style="max-width: 150px;">
			<p class="help-block">Got a <em>Preferred Donor Code</em>? Enter it here (<em>optional</em>).</p>
		</div>
	</div>
	<p class="text-right"><button type="submit" class="btn btn-primary">Continue to Final Step</button></p>
	<input type="hidden" name="nextpage" value="'.htmlentities((string)((is_array($in) && isset($in['nextpage'])) ? $in['nextpage'] : null), ENT_QUOTES, 'UTF-8').'" />
</form>';
};
?>