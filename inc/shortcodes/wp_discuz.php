<?
function my_wpdiscuz_shortcode()
{
    $html = "";
    if (file_exists(ABSPATH . "wp-content/plugins/wpdiscuz/themes/default/comment-form.php")) {
        ob_start();
        include_once ABSPATH . "wp-content/plugins/wpdiscuz/themes/default/comment-form.php";
        $html = ob_get_clean();
    }
    return $html;
}
add_shortcode("wpdiscuz_comments", "my_wpdiscuz_shortcode");
