<?
function new_excerpt_more( $more ) {
	return '...';
}
add_filter('excerpt_more', 'new_excerpt_more');

function excerpt($limit, $post = NULL) {
    $excerpt = explode(' ', get_the_excerpt($post), $limit);
    if (count($excerpt)>=$limit) {
      array_pop($excerpt);
      $excerpt = implode(" ",$excerpt).'...';
    } else {
      $excerpt = implode(" ",$excerpt);
    }	
    $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
    return $excerpt;
  }