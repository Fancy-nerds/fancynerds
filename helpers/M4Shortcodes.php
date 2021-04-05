<?php 
/**
 * 
 */
class M4Shortcodes
{
	private $path = '';
	private $dirs = [];

	function __construct($args){
		$this->path = get_template_directory().'/components/shortcodes/';
		$this->dirs = array_filter(glob($this->path.'*'), 'is_dir');
		foreach ($this->dirs as $key => $value) {
			$folder = str_replace($this->path,'',$value);
			add_shortcode( $folder, array( $this, 'shortcodesInit') );
		}
	}

	public function shortcodesInit( $atts, $content, $tag ){
		$path = $this->path . $tag . '/';
		$template = 'layout1';
		ob_start();
		include_once $this->path . $tag . '/' . 'index.php';
		$html = ob_get_clean();
		return $html;
	}

	public function getPath(){
		return $this->path;
	}
	public function getDirs(){
		return $this->dirs;
	}
}
$deb = new M4Shortcodes([]);
