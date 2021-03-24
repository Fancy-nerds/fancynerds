<?php
/**
  *
  */
class M4Helpers
{

	/**
	 * [getImg description]
	 * @param  [type] $args [
	 *  'img_id' - int,
	 *  'size' - mixed ( string | array )
	 *  'class' - string
	 * ]
	 * @return [type]       [html string]
	 */
	static function getImgHtml( $args ){
		$class = "";
		extract( $args );
		unset( $args );
		$str = '<img src="%s" class="%s" alt="%s" title="%s" width="%d" height="%d">';
		if (!isset($size))
			$size='thumbnail';
		$img_data =	wp_get_attachment_image_src( $img_id, $size );
		return sprintf( $str,
										$img_data[0],
										$class,
										get_post_meta($img_id, '_wp_attachment_image_alt', TRUE),
										get_the_title($img_id),
										$img_data[1],
										$img_data[2] );
	}
}