<?

class Fancy_Tags_Cloud_Widget extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            'fancy_tags_cloud',  // Base ID
            'Fancy Tags Cloud'   // Name
        );

    }

    public function form($instance)
    {

        $title = !empty($instance['title']) ? $instance['title'] : esc_html__('');
        $taxonomy = !empty($instance['taxonomy']) ? $instance['taxonomy'] : 'post_tag';
?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php echo esc_html__('Title:'); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('taxonomy')); ?>"><?php echo esc_html__('Taxonomy:'); ?></label>
            <select class="widefat" id="<?php echo esc_attr($this->get_field_id('taxonomy')); ?>" name="<?php echo esc_attr($this->get_field_name('taxonomy')); ?>">
                <option value="category" <?= $taxonomy === 'category' ? 'selected' : '' ?>>
                    Categories </option>
                <option value="post_tag" <?= $taxonomy === 'post_tag' ? 'selected' : '' ?>>
                    Tags </option>
                <option value="link_category" <?= $taxonomy === 'link_category' ? 'selected' : '' ?>>
                    Link Categories </option>
                <option value="jobs_category" <?= $taxonomy === 'jobs_category' ? 'jobs_category' : '' ?>>
                    Job Categories </option>
            </select>
        </p>
        <?php

    }

    public function widget($args, $instance)
    {
        $tags = get_terms([
            'taxonomy' => $instance['taxonomy'],
            'hierarchical' => false,
            'hide_empty' => false,
        ]);

        if (!count($tags)) return $instance;

        echo $args['before_widget'];

        $default_title = __('Tags');
        $title         = !empty($instance['title']) ? $instance['title'] : $default_title;

        $title = apply_filters('widget_title', $title, $instance, $this->id_base);


        if ($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<div class="tag-list">';
        foreach ($tags as $tag) {
        ?>
            <a href="<?= get_tag_link($tag->term_id) ?>" class="tag-item"><?= esc_html__($tag->name) ?></a>
<?
        }
        echo '</div>';

        echo $args['after_widget'];
    }

    public function update($new_instance, $old_instance)
    {

        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['taxonomy'] = !empty($new_instance['taxonomy']) ? $new_instance['taxonomy'] : 'post_tag';

        return $instance;
    }
}
