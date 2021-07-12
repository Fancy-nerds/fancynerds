<?

class Post_Tags_Widget extends WP_Widget
{

    function __construct()
    {

        parent::__construct(
            'post_tags',  // Base ID
            'Post Tags'   // Name
        );

        add_action('widgets_init', function () {
            register_widget('Post_Tags_Widget');
        });
    }

    public function widget($args, $instance)
    {
        $tags = wp_get_post_tags(get_the_ID());
        if (!count($tags)) return $instance;

        echo $args['before_widget'];

        $default_title = __('Tags');
        $title         = !empty($instance['title']) ? $instance['title'] : $default_title;

        $title = apply_filters('widget_title', $title, $instance, $this->id_base);


        if ($title) {
            echo $args['before_title'] . $title . $args['after_title'];
        }

        echo '<ul class="tag-list">';
        foreach ($tags as $tag) {
            echo '<li class="tag">';
?>
            <a href="<?= get_tag_link($tag->term_id) ?>" class="tag__link"><?= esc_html__($tag->name) ?></a>
<?
            echo '</li>';
        }
        echo '</ul?';

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

new Post_Tags_Widget();
