<?php
class M4Blocks
{
	private $blocks;

	function __construct()
	{
		add_action('acf/init', array($this,'init_blocks'));
		$this->blocks = [
			['name'=>'testimonials',
			 'icon'=>'admin-comments'],
			['name'=>'jumbotron',
				'icon'=>'welcome-view-site'],
			['name'=>'steps',
				'icon'=>'money'],
			['name'=>'about',
				'icon'=>'format-status'],
			['name'=>'partners',
				'icon'=>'editor-ul'],
			['name'=>'services',
				'icon'=>'admin-site-alt3'],
			['name'=>'benefits',
				'icon'=>'saved'],
			['name'=>'plans',
				'icon'=>'money-alt'],
		];
	}

	public function init_blocks(){
		if( function_exists('acf_register_block_type') ) {
			foreach ($this->blocks as $block) :
				// register a testimonial block.
				acf_register_block_type(array(
					'name'              => $block['name'],
					'title'             => __( $block['name'] ),
					'description'       => __('A custom '.$block['name'].' block.'),
					'render_template'   => 'components/blocks/'.$block['name'].'/'.$block['name'].'.php',
					'category'          => 'formatting',
					'icon'              => $block['icon'],
					'keywords'          => array( $block['name'] ),
					'enqueue_assets'	=> function($block){
						wp_enqueue_style( "fancynerds-".$block['title']."-css", get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".css", array(), rand( 1, 999999 ),"all" );
					},
				));
			endforeach;
		}
	}
}

new M4Blocks;