<?php 
/**
 * Class to Auto Manage shortcodes on the fly
 */
class M4Shortcodes
{
	#path to shortcodes
	private $path = '';
	
	#array of folders with names of shortcodes
	private $dirs=[];

	#shortcode
	private $shortcodes=[];

	function __construct($args){
		$this->path = get_template_directory().'/components/shortcodes/';
		$this->dirs = array_filter(glob($this->path.'*'), 'is_dir');
		// echo '<pre>';
		// print_r($this->dirs);
		// print_r(get_defined_constants());
		// echo '</pre>';
		
		$this->loadShortcodes();
		$this->addShortcodes();
		add_action( 'wp_enqueue_scripts', array( $this, 'scripts') );

		// $this->regScripts();
	}

	private function loadShortcodes(){

		foreach ($this->dirs as $v) {
			$this->shortcodes[] = str_replace($this->path,'',$v);
		}

		// echo '<pre>';
		// print_r($this->shortcodes);
		// echo '</pre>';
		// wp_die('Gogogo');
	}

	private function addShortcodes(){
		foreach ($this->shortcodes as $v) {
			add_shortcode( $v, array( $this, 'control') );
		}
	}


	#controller to manage 
	public function control( $atts, $content, $tag ){
		$path = $this->path . $tag . '/';
		$template = 'layout1';
		ob_start();
		include_once $this->path . $tag . '/' . 'index.php';
		$html = ob_get_clean();
		return $html;
	}

	# register scripts and styles related to shortcode
	public function scripts(){
		foreach ($this->shortcodes as $v) {
			wp_register_style( 'fancynerds-shortcode-'.$v.'-css', get_template_directory_uri().'/components/shortcodes/'.$v.'/'.$v.'.css', [], rand( 1, 999999 ), 'all' );

			// add_shortcode( $v, array( $this, 'control') );
		}
		// echo '<pre>';
		// print_r($this->shortcode);
		// echo '</pre>';
		
	}

	public function getPath(){
		return $this->path;
	}
	public function getDirs(){
		return $this->dirs;
	}


}
$deb = new M4Shortcodes([]);
