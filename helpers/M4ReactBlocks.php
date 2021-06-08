<?php
include_once 'M4GetDirs.php';

class M4ReactBlocks
{
    private $blocks;
    private $exlude_blocks;
    private $sys_dir;
    private $files_dir;
    private $blocks_type;
    private $current_block;
    public function __construct()
    {
        $this->blocks_type = 'fancy-blocks';
        $this->exlude_blocks = [];
        $this->sys_dir = get_template_directory() . "/components/react-blocks";
        $this->files_dir = get_template_directory_uri() . "/components/react-blocks";
        add_action('init', [$this, 'init']);
        add_filter('block_categories', [$this, 'create_custom_categories'], 10, 1);
    }
    public function init()
    {
        $this->create_block_list();
        $this->init_blocks();
    }
    private function create_block_list()
    {
        $this->blocks = getDirs($this->sys_dir, false, $this->exlude_blocks);
    }
    private function init_blocks()
    {
        foreach ($this->blocks as $block) {
            $this->current_block = $block;
            $this->init_block($block);
        }
        $this->current_block = '';
    }
    private function init_block($block)
    {
        $block_config = $this->get_block_config($block);
        $this->register_block_assets($block_config);
        $this->register_block();
    }
    private function register_block_assets($block_config)
    {
        if (!$block_config['editor']['js']) return;

        $this->register_front_assets($block_config['front']);
        $this->register_editor_assets($block_config['editor']);
    }
    private function register_front_assets($block_front_config)
    {
        $this->register_front_script([
            "js" => $block_front_config['js'],
            "dep" => $block_front_config['js_dep']
        ]);
        $this->register_front_style([
            "style" => $block_front_config['style'],
            "dep" => $block_front_config['style_dep']
        ]);
    }
    private function register_front_script($block_front_js_config)
    {

        if (!$block_front_js_config['js']) return;
        wp_register_script(
            $this->current_block . '-front-js',
            $block_front_js_config['js'],
            $block_front_js_config['dep'],
            $this->get_filetime($block_front_js_config['js'])
        );
    }
    private function register_front_style($block_front_style_config)
    {
        if (!$block_front_style_config['style']) return;
        wp_register_style(
            $this->current_block . '-front-style',
            $block_front_style_config['style'],
            $block_front_style_config['dep'],
            $this->get_filetime($block_front_style_config['style'])
        );
    }
    private function register_editor_assets($block_editor_config)
    {
        $this->register_editor_script([
            "js" => $block_editor_config['js'],
            "dep" => $block_editor_config['js_dep']
        ]);
        $this->register_editor_style([
            "style" => $block_editor_config['style'],
            "dep" => $block_editor_config['style_dep']
        ]);
    }
    private function register_editor_script($block_editor_js_config)
    {
        if (!$block_editor_js_config['js']) return;
        wp_register_script(
            $this->current_block . '-editor-js',
            $block_editor_js_config['js'],
            $block_editor_js_config['dep'],
            $this->get_filetime($block_editor_js_config['js'])
        );
    }
    private function register_editor_style($block_editor_style_config)
    {
        if (!$block_editor_style_config['style']) return;
        wp_register_style(
            $this->current_block . '-editor-style',
            $block_editor_style_config['style'],
            $block_editor_style_config['dep'],
            $this->get_filetime($block_editor_style_config['style'])
        );
    }

    public function register_block()
    {
        register_block_type($this->blocks_type . '/' . $this->current_block, [
            'api_version' => 2,
            'editor_script' =>  $this->current_block . '-editor-js',
            'editor_style' => $this->current_block . '-editor-style',
            'script' => $this->current_block . '-front-js',
            'style' => $this->current_block . '-front-style',
        ]);
    }

    public function create_custom_categories($categories)
    {
        return array_merge(
            $categories,
            array(
                array(
                    'slug'  => 'fancy-containers',
                    'title' => 'Fancy Blocks',
                ),
            )
        );
    }

    private function get_block_config($block)
    {
        $file_path = $this->sys_dir . '/' . $block . "/";
        $link = $this->files_dir . '/' . $block . "/" . $block;
        $sys_link = $this->sys_dir . '/' . $block . "/" . $block;

        $config = [
            "front" => [
                "js" => file_exists($sys_link . '.js') ? $link . '.js' : '',
                "style" => file_exists($sys_link . '.css') ? $link . '.css' : '',
                "style_dep" => [],
                "js_dep" => []
            ],
            "editor" => [
                "js" => file_exists($sys_link . '.component.js') ? $link . '.component.js' : '',
                "style" => file_exists($sys_link . '.component.css') ? $link . '.component.css' : '',
                "style_dep" => ['wp-edit-blocks'],
                "js_dep" => ['wp-blocks', 'wp-element', 'wp-editor']
            ]
        ];

        if (file_exists($file_path . "config.json")) {
            $customConfigRaw = file_get_contents($file_path . "config.json");
            $customConfig = json_decode($customConfigRaw, true);
            $config = array_merge_recursive($config, $customConfig);
        }
        return $config;
    }
    private function get_filetime($file_link)
    {
        $link = $this->files_dir . '/' . $this->current_block . "/";
        $sys_link = $this->sys_dir . '/' . $this->current_block . "/";
        return str_replace($sys_link, $link, $file_link);
    }
}

new M4ReactBlocks;
