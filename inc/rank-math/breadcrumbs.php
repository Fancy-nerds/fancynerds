<?
/**
 * Filter to change breadcrumb settings.
 *
 * @param  array $settings Breadcrumb Settings.
 * @return array $setting.
 */
add_filter( 'rank_math/frontend/breadcrumb/settings', function( $settings ) {
	$settings = array(
		'home'           => true,
		'separator'      => '>',
		'remove_title'   => '',
		'hide_tax_name'  => '',
		'show_ancestors' => '',
	);
	return $settings;
});


/**
 * Filter to change breadcrumb strings.
 *
 * @param  array $settings Breadcrumb Strings.
 * @return array $strings.
 */
add_filter( 'rank_math/frontend/breadcrumb/strings', function( $strings ) {
	$strings = array(
		'prefix'         => '',
		'home'           => __('Home', 'fancynerds'),
		'error404'       => '',
		'archive_format' => '',
		'search_format'  => '',
	);
	return $strings;
});

/**
 * Allow changing or removing the Breadcrumb items
 *
 * @param array       $crumbs The crumbs array.
 * @param Breadcrumbs $this   Current breadcrumb object.
 */
add_filter( 'rank_math/frontend/breadcrumb/items', function( $crumbs, $class ) {
    if (is_category() || is_tag()) {
        array_splice( $crumbs, 1, 0, [[
            0 => get_the_title( get_option( 'page_for_posts' ) ),
            1 => get_permalink( get_option( 'page_for_posts' ) ),
            "hide_in_schema" => false
        ]]);
    }
	return $crumbs;
}, 10, 2);