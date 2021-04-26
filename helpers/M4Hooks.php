<?php
/**
 *
 */
class M4Hooks
{
	function __construct()
	{
		add_filter('acf/load_value/type=textarea', [$this,'rmvTags'], 10, 3);
		add_filter('acf/load_value/type=text', [$this,'rmvTags'], 10, 3);
	}
	#removing html tags from textareas and text fields
	public function rmvTags($value, $post_id, $field){
		return wp_strip_all_tags($value);
	}
}
new M4Hooks();