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
$id = 'team-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team-slider';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$paragraph = get_field('paragraph') ?: 'Your paragraph here...';
$button = get_field('button') ?: 'All Team';
$url = get_field('url') ?: '#';
$button = get_field('button') ?: 'All Team';

$shortcode = get_field('shortcode');

// $bars = get_field('bars');
// $image = get_field('image');

?>
<div class="<?= $className;?>" id="<?= $id;?>">
	<div class="container">
		<div class="row">
			<div class="col col-50">
				<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
				<h2 class="title"><?= $title; ?></h2>
				<p class="paragraph">
					<?= $paragraph; ?>
				</p>
			</div>
			<div class="col col-50 col-right">
				<a href="<?= $url; ?>" class="button button--orange button--image"><?= $button; ?></a>
			</div>
		</div>

		<?= $shortcode; ?>
		
	</div>
</div>