<?php
/*
Plugin Name: Simple Text Only Countdown
Plugin URI: https://deuts.net/simple-text-only-countdown-wordpress-plugin/
Description: A simple countdown shortcode plugin that displays just the text. No flash nor javascript for live timer effect, nor styles, just plain text. Perfect for in-line text-based countdown timer. Visitors need to refresh the browsers in order to update the countdown.
Version: 1.2.0
Author: deuts
Author URI: http://deuts.net/
*/

function stoc_noun ( $count, $zerolar = '', $singular = '1 pc.', $plural = '% pcs.' ) { 
	if ($count==0) {$noun_form = $zerolar;}
	elseif ($count==1) {$noun_form=$singular;} 
	else {
		$noun_form=$plural;
		$noun_form = str_replace ("%",$count,$noun_form); 
		}
	return $noun_form; 
	}

function stoc_scode( $atts ) {
	$atts = shortcode_atts(
		array(
			'todate' => '29 February 2020 20:00',
			'timeoff' => 0,
			'sep' => ', ',
			'showhours' => 1,
			'showmins' => 1,
			'showsecs' => 0,
			'pretext' => 'The event starts in ',
			'posttext' => '.',
			'donemsg' => 'The countdown is done.',
		), $atts, 'cntdwn' );

	$targetDate = strtotime($atts['todate']) ;
	$secondsOffset = $atts['timeoff'] * 60 * 60;
	$targetDate -= $secondsOffset ; // Target date is expressed in GMT time
	$actualDate = strtotime(gmdate("j F Y G:i:s")); // Actual date is expressed in GMT time
	
	if ($targetDate > $actualDate) {
		
		// Now let's compute for those differences
		$yearsDiff = date("Y",$targetDate) - date("Y",$actualDate);
		$monthsDiff = date("n",$targetDate) - date("n",$actualDate);
		$daysDiff = date("j",$targetDate) - date("j",$actualDate);
		$hoursDiff = date("G",$targetDate) - date("G",$actualDate);
		$minDiff = date("i",$targetDate) - date("i",$actualDate);
		$secDiff = date("s",$targetDate) - date("s",$actualDate);

		// Start borrowing as may be necessary
		if ($secDiff < 0) {$secDiff += 60; --$minDiff;}
		if ($minDiff < 0) {$minDiff += 60; --$hoursDiff;}
		if ($hoursDiff < 0) {$hoursDiff += 24; --$daysDiff;}
		if ($daysDiff < 0) {
			$daysDiff += date ("j", $targetDate - (date("j",$targetDate)*24*60*60)) ;
			--$monthsDiff;
			}
		if ($monthsDiff < 0) {$monthsDiff += 12; --$yearsDiff;}
		
		// And let's Pluralize
		$hoursDiff *= $atts['showhours'];
		$minDiff *= $atts['showmins'];
		$secDiff *= $atts['showsecs'];
		$sep = $atts['sep'];
		$yearsDiff = stoc_noun($yearsDiff,'','1 year'.$sep,'% years'.$sep);
		$monthsDiff = stoc_noun($monthsDiff,'','1 month'.$sep,'% months'.$sep);
		$daysDiff = stoc_noun($daysDiff,'','1 day'.$sep,'% days'.$sep);
		$hoursDiff = stoc_noun($hoursDiff,'','1 hour'.$sep,'% hours'.$sep);
		$minDiff = stoc_noun($minDiff,'','1 minute'.$sep,'% minutes'.$sep);
		$secDiff = stoc_noun($secDiff,'','1 second'.$sep,'% seconds'.$sep);
		
		// And now, let's finalize everything
		$countdown = $yearsDiff.$monthsDiff.$daysDiff.$hoursDiff.$minDiff.$secDiff;
		$countdown = substr($countdown, 0, -strlen($sep));
		$countdown = preg_replace('/,([^,]*)$/', ' and \1', $countdown); // replace the last comma with ' and ' if comma is used in $sep
		$countdown = $atts['pretext'].$countdown.$atts['posttext'];
	}
	else {$countdown = $atts['donemsg'];}
	return $countdown;
}
add_shortcode( 'cntdwn', 'stoc_scode' );

?>
