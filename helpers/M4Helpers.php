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

	/**
	 * [prepBlock prepare gutenberg's custom blocks variables]
	 * @param  [type] $args [description]
	 * @return [type]       [description]
	 */
	static function prepBlock( $block, $css=[] ){
		$bgColor = get_field('background_color');
		$return=[];
		$return['style'] = 'style="';

		// Create id attribute allowing for custom "anchor" value.
		$return['id'] = $block['title'] . '-' . $block['id'];
		if( !empty($block['anchor']) )
			$return['id'] = $block['anchor'];

		// Create class attribute allowing for custom "className" and "align" values.
		$return['className'] = $block['title'];
		if( !empty($block['className']) )
			$return['className'] .= ' ' . $block['className'];

		if( !empty($block['align']) )
			$return['className'] .= ' align' . $block['align'];

		if( $bgColor )
			$return['className'] .= ' block-bg block-bg--' . $bgColor;
			
		#allowing custom paddings
		$return['ind_top'] = get_field('ind_top',$block['id']);
		$return['ind_btm'] = get_field('ind_btm',$block['id']);

		if ( isset($return['ind_top']) && trim($return['ind_top']) !== '' )
			$return['style'].= "padding-top:".$return['ind_top']."px; ";

		if ( isset($return['ind_btm']) && trim($return['ind_btm']) !== '' )
			$return['style'].= "padding-bottom:".$return['ind_btm']."px; ";

		#if custom css provided for block
		if(is_array($css) && count($css)>0):
			foreach ($css as $k => $v):
				$return['style'].= $k . ':' . $v . '; ';
			endforeach;
		endif;
		$return['style'].='"';

		return $return;
	}
}