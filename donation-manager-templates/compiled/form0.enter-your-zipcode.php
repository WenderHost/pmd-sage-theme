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
    
    return '<div class="" style="text-align: center;">
	<form action="" method="get" class="form-inline" style="" role="form">
	    <div class="form-group">
			<label class="sr-only" for="pickupcode">Enter a Zip or Donation Code:</label>
		    <input type="text" class="form-control input-lg" name="pickupcode" id="pickupcode" style="" placeholder="Zip/Donation Code">
	    </div>
	    <div class="form-group">
	    	<button type="submit" class="btn btn-primary btn-block btn-lg">Submit</button>
	    </div>
	    <input type="hidden" name="nextpage" value="'.htmlentities((string)((is_array($in) && isset($in['nextpage'])) ? $in['nextpage'] : null), ENT_QUOTES, 'UTF-8').'" />
	</form>
</div>';
};
?>