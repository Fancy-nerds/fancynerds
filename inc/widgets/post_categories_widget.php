<?

class Post_Categories_Widget extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            'post_categories',  // Base ID
            'Post Categories'   // Name
        );

        add_action('widgets_init', function () {
            register_widget('Post_Categories_Widget');
        });
    }

    public function widget($args, $instance)
    {
        $cat_ids = wp_get_post_categories(get_the_ID());

        if (!count($cat_ids)) return $instance;

        echo $args['before_widget'];
       
        $default_title = __('Categories');
        $title         = !empty($instance['title']) ? $instance['title'] : $default_title;

        $title = apply_filters('widget_title', $title, $instance, $this->id_base);


        if ($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        

        function get_list($hie_list)
        {
            $prefix = 'id-';
            echo '<ul>';
            
            foreach ($hie_list as $raw_id => $children) {
                $cat_id = str_replace($prefix, '', $raw_id);
                $cat = get_category($cat_id);
                $link = get_category_link($cat_id);

?>
                <li>
                    <a href="<?= $link ?>"><?= esc_html__($cat->name) ?></a>
                    <? if (count($children)) {
                        get_list($children);
                    } ?>
                </li>
<?


            }

            echo '</ul>';
        }


        function gen_hie_arr($cat_ids)
        {
            $aggr = [];
            foreach ($cat_ids as $cat_id) {
                $cat_aggr = make_hie($cat_id);
                $aggr = array_merge_recursive($aggr, $cat_aggr);
            }

            return  $aggr;
        }

        function make_hie($cat_id)
        {
            $cat_raw = get_category($cat_id);
            $parent_id = $cat_raw->parent;
            $prefix = 'id-';
            $aggr = [
                "{$prefix}{$cat_id}" => []
            ];
            $flag = true;
            if ($parent_id) {
                $root_aggr = make_hie($parent_id);
                $parent_aggr = &$root_aggr;
                while ($flag) {
                    $m =  &$parent_aggr;
                    foreach ($m as $key => &$parent) {
                        if ($key == "{$prefix}{$parent_id}") {
                            $parent["{$prefix}{$cat_id}"] = $aggr["{$prefix}{$cat_id}"];
                            $flag = false;
                            break;
                        } else $parent_aggr = &$parent;
                    }
                };
                echo $flag;
                return $root_aggr;
            };
            return $aggr;
        }

        $hie_list = gen_hie_arr($cat_ids);
        get_list($hie_list);

        echo $args['after_widget'];
    }

    /*public function form($instance)
    {

    }*/

    public function update($new_instance, $old_instance)
    {

        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';

        return $instance;
    }
}

new Post_Categories_Widget();
