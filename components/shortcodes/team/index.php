<?php
if (!defined( 'ABSPATH' ))
exit('Direct access not allowed!');

#if user ids not set up - get all user ids
if( !isset($atts['user_id']) || $atts['user_id'] == '' ):
	$all_users = get_users();
	foreach ($all_users as $k=>$v):
		$user_ids[] = $v->ID;
	endforeach;
else:
	$user_ids = explode(',',$atts['user_id']);
endif;

#choose custom template if user provides
if( isset($atts['template']) && trim($atts['template']) !== '' )
	$template = $atts['template'];

wp_enqueue_style( 'fancynerds-shortcode-team-css' );

$lang = pll_current_language();
$description = ($lang !== 'en') ? 'description'.'_'.$lang : 'description';

include_once $path . $template . '.php';