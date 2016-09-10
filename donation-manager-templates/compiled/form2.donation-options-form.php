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
    
    return ''.((is_array($in) && isset($in['step_one_note'])) ? $in['step_one_note'] : null).'
<p class="lead"><strong>Step 1 of 4:</strong> What Items do you have to donate? (<em>Check all that apply</em>)</p>
<form action="" method="post">
	<table class="table table-striped">
'.LR::sec($cx, ((is_array($in) && isset($in['checkboxes'])) ? $in['checkboxes'] : null), null, $in, true, function($cx, $in) {return '		<tr>
			<td>
				<div class="checkbox">
					<label style="font-size: 18px; font-weight: bold;">
						<input style="height: 21px;" type="checkbox" name="donor[options]['.htmlentities((string)((is_array($in) && isset($in['key'])) ? $in['key'] : null), ENT_QUOTES, 'UTF-8').'][field_value]" value="'.htmlentities((string)((is_array($in) && isset($in['value'])) ? $in['value'] : null), ENT_QUOTES, 'UTF-8').'"'.htmlentities((string)((is_array($in) && isset($in['checked'])) ? $in['checked'] : null), ENT_QUOTES, 'UTF-8').' /> '.htmlentities((string)((is_array($in) && isset($in['name'])) ? $in['name'] : null), ENT_QUOTES, 'UTF-8').'
					</label>
					<span class="help-block">'.htmlentities((string)((is_array($in) && isset($in['desc'])) ? $in['desc'] : null), ENT_QUOTES, 'UTF-8').'</span>
					<input type="hidden" name="donor[options]['.htmlentities((string)((is_array($in) && isset($in['key'])) ? $in['key'] : null), ENT_QUOTES, 'UTF-8').'][pickup]" value="'.htmlentities((string)((is_array($in) && isset($in['pickup'])) ? $in['pickup'] : null), ENT_QUOTES, 'UTF-8').'" />
				 	<input type="hidden" name="donor[options]['.htmlentities((string)((is_array($in) && isset($in['key'])) ? $in['key'] : null), ENT_QUOTES, 'UTF-8').'][skipquestions]" value="'.htmlentities((string)((is_array($in) && isset($in['skip_questions'])) ? $in['skip_questions'] : null), ENT_QUOTES, 'UTF-8').'" />
				 	<input type="hidden" name="donor[options]['.htmlentities((string)((is_array($in) && isset($in['key'])) ? $in['key'] : null), ENT_QUOTES, 'UTF-8').'][term_id]" value="'.htmlentities((string)((is_array($in) && isset($in['term_id'])) ? $in['term_id'] : null), ENT_QUOTES, 'UTF-8').'" />
				</div>
			</td>
		</tr>
';}).'	</table>
	<label>Brief description of items:</label>
	<textarea class="form-control" rows="4" name="donor[description]">'.htmlentities((string)((is_array($in) && isset($in['description'])) ? $in['description'] : null), ENT_QUOTES, 'UTF-8').'</textarea>
	<span class="help-block">Example: I have a couch and three boxes of household items from spring cleaning.</span>
	<p class="text-right"><button type="submit" class="btn btn-primary">Continue to Step 2</button></p>
	<input type="hidden" name="nextpage" value="'.htmlentities((string)((is_array($in) && isset($in['nextpage'])) ? $in['nextpage'] : null), ENT_QUOTES, 'UTF-8').'" />
</form>';
};
?>