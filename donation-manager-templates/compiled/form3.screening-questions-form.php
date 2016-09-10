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
    
    return '<form action="" method="post" name="screening-questions">
	<table class="table table-striped"><colgroup><col style="width: 70%;" /><col style="width: 15%" /><col style="width: 15%" /></colgroup>

'.LR::sec($cx, ((is_array($in) && isset($in['questions'])) ? $in['questions'] : null), null, $in, true, function($cx, $in) {return '	<tr>
		<td>'.htmlentities((string)((is_array($in) && isset($in['question'])) ? $in['question'] : null), ENT_QUOTES, 'UTF-8').'<input type="hidden" name="donor[questions]['.htmlentities((string)((is_array($in) && isset($in['key'])) ? $in['key'] : null), ENT_QUOTES, 'UTF-8').']" value="'.htmlentities((string)((is_array($in) && isset($in['question_esc_attr'])) ? $in['question_esc_attr'] : null), ENT_QUOTES, 'UTF-8').'"><input type="hidden" name="donor[question][ids][]" value="'.htmlentities((string)((is_array($in) && isset($in['key'])) ? $in['key'] : null), ENT_QUOTES, 'UTF-8').'" /></td>
		<td><label ><input type="radio" name="donor[answers]['.htmlentities((string)((is_array($in) && isset($in['key'])) ? $in['key'] : null), ENT_QUOTES, 'UTF-8').']" value="Yes"'.htmlentities((string)((is_array($in) && isset($in['checked_yes'])) ? $in['checked_yes'] : null), ENT_QUOTES, 'UTF-8').' /> Yes</label></td>
		<td><label ><input type="radio" name="donor[answers]['.htmlentities((string)((is_array($in) && isset($in['key'])) ? $in['key'] : null), ENT_QUOTES, 'UTF-8').']" value="No"'.htmlentities((string)((is_array($in) && isset($in['checked_no'])) ? $in['checked_no'] : null), ENT_QUOTES, 'UTF-8').' /> No</label></td>
	</tr>
';}).'	</table>
	<div id="additional-details">
		<label>Please provide additional detail about your items for which you answered "Yes" above:</label>
		<textarea class="form-control" rows="4" name="donor[additional_details]">'.htmlentities((string)((is_array($in) && isset($in['additional_details'])) ? $in['additional_details'] : null), ENT_QUOTES, 'UTF-8').'</textarea>
		<span class="help-block">Please be considerate of the costs associated with large item pick ups to our organization. We will gladly and thankully pick up items that will help us further the mission of our organization. However we must respectfully deny items that create an additional disposal liability.</span>
	</div>
	<p class="text-right"><button type="submit" class="btn btn-primary">Continue to Step 3</button></p>
	<input type="hidden" name="nextpage" value="'.htmlentities((string)((is_array($in) && isset($in['nextpage'])) ? $in['nextpage'] : null), ENT_QUOTES, 'UTF-8').'" />
	<input type="hidden" name="provide_additional_details" value="'.htmlentities((string)((is_array($in) && isset($in['provide_additional_details'])) ? $in['provide_additional_details'] : null), ENT_QUOTES, 'UTF-8').'" />
</form>';
};
?>