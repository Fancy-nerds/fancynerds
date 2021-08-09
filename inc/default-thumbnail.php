<?
function default_post_thumbnail_html($html, $post_id, $post_thumbnail_id, $size, $attr)
{
    if (!$html) {
        $abs_path =  get_template_directory() . '/assets/images/default-image.png';
        $uri_path = get_template_directory_uri() . '/assets/images/default-image.png';
        if (!file_exists($abs_path)) return '';
        $ins_size = getimagesize($abs_path);
        return sprintf(
            '<img src="%s" height="%s" width="%s" class="%s" />',
            $uri_path,
            is_array($size) ? $size[0] : (is_string($size) && get_option($size . '_size_w') ? get_option($size . '_size_w') : $ins_size[0]),
            is_array($size) ? $size[0] : (is_string($size) && get_option($size . '_size_h') ? get_option($size . '_size_h') : $ins_size[1]),
            'thumb-mock' . (isset($attr['class']) ? ' ' . $attr['class'] : '')
        );
    }
    return $html;
}
add_filter('post_thumbnail_html', 'default_post_thumbnail_html', 10, 5);
