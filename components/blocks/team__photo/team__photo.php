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
$id = 'team__photo-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team__photo';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$image = get_field('image');
$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description') ?: 'Your description here...';
?>
<div id="<?php echo esc_attr($id); ?>" class="team__photo  <?php echo esc_attr($className); ?>">
	<?php
	if($image):
		echo M4Helpers::getImgHtml([ 'img_id'=>$image, 'size'=>'large']);
	endif;?>
	<div class="team__heading">
		<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
		<h2 class="title"><?= $title; ?></h2>
		<p class="description"><?= $description; ?></p>
	</div>
</div>
