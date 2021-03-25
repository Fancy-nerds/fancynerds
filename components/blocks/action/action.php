<?php

/**
 * Services Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'action-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'action';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$title = get_field('title') ?: 'title here...';
$button = get_field('button') ?: 'button name...';
$url = get_field('url') ?: 'url here...';

?>

<section id="<?php echo esc_attr($id); ?>" class="section action <?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="action__content" style="
position: absolute;
left: 50%;
transform: translateX(-50%);
top: 87px;
">
			<div class="action__title"><?= $title;?></div>
			<a href="<?= $url; ?>" class="button button--orange button--image"><?= $button;?></a>
		</div>
	</div>
</section>