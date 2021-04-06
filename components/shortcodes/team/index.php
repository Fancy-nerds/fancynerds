<?php
if (!defined( 'ABSPATH' ))
exit('Direct access not allowed!');

if( !isset($atts['user_id']) || $atts['user_id'] == '' )
	return;

if( isset($atts['template']) && trim($atts['template']) !== '' )
	$template = $atts['template'];

wp_enqueue_style( 'fancynerds-shortcode-team-css' );

include_once $path . $template . '.php';