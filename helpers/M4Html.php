<?php 
/**
 * 
 */
class M4Html
{
	/**
	 * [getLangHidden gets input hidden with language]
	 * @param  [type] $args ['curr_lang'] - current_locale
	 * @return [type]       [description]
	 */
	static function getLangHidden($args){
		$value = 0;
		switch ($args['curr_lang']) {
			case 'de':
				$value = 3622;
				break;
			case 'ru':
				$value = 3624;
				break;
			default:
				$value = 3620;
				break;
		}
		return '<input name="UF_CRM_LANG" value="'.$value.'" type="hidden" />';
	}
}