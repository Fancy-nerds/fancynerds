<?
require_once 'fancy_categories_widget.php';
require_once 'fancy_tags_cloud_widget.php';
require_once 'fancy_search_widget.php';
require_once 'fancy_recent_post_widget.php';


add_action('widgets_init', function () {
    register_widget('Fancy_Categories_Widget');
    unregister_widget('WP_Widget_Categories');

    register_widget('Fancy_Serach_Widget');
    unregister_widget('WP_Widget_Search');

    register_widget('Fancy_Tags_Cloud_Widget');
    unregister_widget('WP_Widget_Tag_Cloud');

    register_widget('Fancy_Recent_Post_Widget');
    unregister_widget('WP_Widget_Recent_Posts');
    
});