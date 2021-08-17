<?

class Fancy_Categories_Widget extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            'fancy_categories',
            'Fancy Categories'
        );
    }

    public function form($instance)
    {

        $title = !empty($instance['title']) ? $instance['title'] : '';
        $hie = !empty($instance['hie']) ? 1 : 0;
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:', 'fancynerds'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <input type="checkbox" id="<?php echo esc_attr($this->get_field_id('hie')); ?>" name="<?php echo esc_attr($this->get_field_name('hie')); ?>" <?= $hie ? 'checked' : '' ?>>
            <label for="<?php echo esc_attr($this->get_field_id('hie')); ?>"><?php echo esc_html__('enable hierarchy', 'fancynerds'); ?></label>
        </p>
        <?php

    }

    public function widget($args, $instance)
    {
        $hie = !empty($instance['hie']) ? 1 : 0;

        $cat_ids = get_terms([
            'taxonomy'     => 'category',
            'fields' => 'ids',
            'hierarchical' => $hie
        ]);

        if (!count($cat_ids)) return $instance;

        echo $args['before_widget'];


        $title = apply_filters('widget_title', !empty($instance['title']) ? esc_html__($instance['title'], 'fancynerds') : esc_html__('Categories', 'fancynerds'), $instance, $this->id_base);

        if ($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }


        if ($instance['hie']) {
            $hie_list = $this->gen_hie_arr($cat_ids);
            $this->get_hie_list($hie_list);
        } else {
            $flat_list = $this->gen_flat_arr($cat_ids);
            $this->get_flat_list($flat_list);
        }

        echo $args['after_widget'];
    }

    private function get_flat_list($flat_list)
    {
        echo '<ul class="category-list">';
        foreach ($flat_list as $cat) { ?>
            <li class="category-item">
                <a href="<?= get_category_link($cat->term_id) ?>">
                    <?= esc_html__($cat->name) ?>
                    <span>(<?= $cat->count ?>)</span>
                </a>
            </li>
        <?

        }

        echo '</ul>';
    }

    private function get_hie_list($hie_list)
    {
        $prefix = 'id-';
        echo '<ul class="category-list">';

        foreach ($hie_list as $raw_id => $children) {
            $cat_id = str_replace($prefix, '', $raw_id);
            $cat = get_category($cat_id);
            $link = get_category_link($cat_id);

        ?>
            <li class="category-item">
                <a href="<?= $link ?>">
                    <?= esc_html__($cat->name) ?>
                    <span>(<?= $cat->count ?>)</span>
                </a>
                <? if (count($children)) {
                    $this->get_hie_list($children);
                } ?>
            </li>
<?


        }

        echo '</ul>';
    }

    private function gen_flat_arr($cat_ids)
    {
        $aggr = [];
        foreach ($cat_ids as $cat_id) {
            $cat_raw = get_category($cat_id);
            $aggr[] = $cat_raw;
        }
        return $aggr;
    }

    private function gen_hie_arr($cat_ids)
    {
        $aggr = [];
        foreach ($cat_ids as $cat_id) {
            $cat_aggr = $this->make_hie($cat_id);
            $aggr = array_merge_recursive($aggr, $cat_aggr);
        }

        return  $aggr;
    }

    private function make_hie($cat_id)
    {
        $cat_raw = get_category($cat_id);
        $parent_id = $cat_raw->parent;
        $prefix = 'id-';
        $aggr = [
            "{$prefix}{$cat_id}" => []
        ];
        $flag = true;
        if ($parent_id) {
            $root_aggr = $this->make_hie($parent_id);
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


    public function update($new_instance, $old_instance)
    {

        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['hie'] = !!$new_instance['hie'];

        return $instance;
    }
}

