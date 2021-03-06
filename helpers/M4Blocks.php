<?php
class M4Blocks
{
	private $blocks;

	function __construct()
	{
		add_action('acf/init', array($this, 'init_blocks'));
		$this->blocks = [
			[
				'name' => 'testimonials',
				'icon' => 'admin-comments'
			],
			[
				'name' => 'jumbotron',
				'icon' => 'welcome-view-site'
			],
			[
				'name' => 'steps',
				'icon' => 'money'
			],
			[
				'name' => 'about',
				'icon' => 'format-status'
			],
			[
				'name' => 'partners',
				'icon' => 'editor-ul'
			],
			[
				'name' => 'services',
				'icon' => 'admin-site-alt3'
			],
			[
				'name' => 'benefits',
				'icon' => 'saved'
			],
			[
				'name' => 'plans',
				'icon' => 'money-alt'
			],
			[
				'name' => 'action',
				'icon' => 'awards'
			],
			[
				'name' => 'blog',
				'icon' => 'welcome-write-blog'
			],
			[
				'name' => 'team__photo',
				'icon' => 'welcome-learn-more'
			],
			[
				'name' => 'who-we-are',
				'icon' => 'groups'
			],
			[
				'name' => 'why-choose',
				'icon' => 'products'
			],
			[
				'name' => 'principles',
				'icon' => 'album'
			],
			[
				'name' => 'counters',
				'icon' => 'admin-site-alt2'
			],
			[
				'name' => 'team-slider',
				'icon' => 'food'
			],
			[
				'name' => 'what-is',
				'icon' => 'list-view'
			],
			[
				'name' => 'testimonials-slider',
				'icon' => 'post-status',
				'dep_js' => ['fancynerds-vendor-swiper-js'],
				'dep_css' => ['fancynerds-vendor-swiper-css']
			],
			[
				'name' => 'skills',
				'icon' => 'buddicons-friends'
			],
			[
				'name' => 'results',
				'icon' => 'tide'
			],
			[
				'name' => 'services-list',
				'icon' => 'nametag'
			],
			[
				'name' => 'numbers',
				'icon' => 'heart'
			],
			[
				'name' => 'cases-slider',
				'icon' => 'chart-line'
			],
			[
				'name' => 'seo-form',
				'icon' => 'airplane'
			],
			[
				'name' => 'faq-list',
				'icon' => 'money'
			],
			[
				'name' => 'advantages',
				'icon' => 'superhero'
			],
			[
				'name' => 'support-form',
				'icon' => 'privacy'
			],
			[
				'name' => 'support',
				'icon' => 'calculator'
			],
			[
				'name' => 'job-list',
				'icon' => 'tide'
			],
		];
	}

	public function init_blocks()
	{
		if (function_exists('acf_register_block_type')) {
			foreach ($this->blocks as $block) :
				// register a testimonial block.
				acf_register_block_type(array(
					'name'              => $block['name'],
					'title'             => __($block['name'], 'fancynerds'),
					'description'       => __('A custom ' . $block['name'] . ' block.', 'fancynerds'),
					'render_template'   => 'components/blocks/' . $block['name'] . '/' . $block['name'] . '.php',
					'category'          => 'formatting',
					'icon'              => $block['icon'],
					'keywords'          => array($block['name']),
					'example'  => array(
						'attributes' => array(
							'mode' => 'preview',
							'data' => ['is_example' => true],
						)
					),
					'enqueue_assets'	=> function ($asset) {


						// $clos =	$asset['enqueue_assets'];

						// echo '<pre>';
						// print_r($asset);
						// print_r($this->blocks);

						// print_r($clos->this);
						// echo '</pre>';
						$dep_js = [];
						$dep_css = [];
						foreach ($this->blocks as $block) {
							if (isset($block['dep_js']) && $block['name'] === $asset['title']) {
								$dep_js = $block['dep_js'];
							}
							if (isset($block['dep_css']) && $block['name'] === $asset['title']) {
								$dep_css = $block['dep_css'];
							}
						}

						$file_path = TEMPLATEPATH . "/components/blocks/" . $asset['title'] . "/" . $asset['title'];

						// echo '<pre>';
						// print_r($dep_js);
						// print_r($dep_css);
						// echo '</pre>';


						if (file_exists($file_path . ".css")) {
							wp_enqueue_style("fancynerds-block-" . $asset['title'], get_template_directory_uri() . "/components/blocks/" . $asset['title'] . "/" . $asset['title'] . ".css", $dep_css, rand(1, 999999), "all");
						}
						if (file_exists($file_path . ".js")) {
							wp_enqueue_script("fancynerds-block-" . $asset['title'], get_template_directory_uri() . "/components/blocks/" . $asset['title'] . "/" . $asset['title'] . ".js", $dep_js, rand(1, 999999), true);
						}
					},
				));
			endforeach;
		}
	}
}

new M4Blocks;
