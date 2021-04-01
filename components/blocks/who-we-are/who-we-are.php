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
$id = 'who-we-are-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'who-we-are';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$image = get_field('image');
$advisors_count = get_field('advisors_count') ?: 'Your Advisors count here...';
$advisors_text = get_field('advisors_text') ?: 'Your Advisors text here...';
$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description') ?: 'Your description here...';
$paragraph = get_field('paragraph') ?: 'Your paragraph here...';
$url = get_field('url') ?: 'Your url here...';
$videoshowcase = get_field('videoshowcase') ?: 'Your videoshowcase here...';


?>


<div id="<?php echo esc_attr($id); ?>" class="main__content <?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="row who-we-are">
			<div class="col col-50">
				<div class="who-we-are__image">
					<?php
					if($image):
						echo M4Helpers::getImgHtml([ 'img_id'=>$image, 'size'=>'medium_large']);
					endif;?>
					<div class="who-we-are__advisors">
						<div class="who-we-are__advisors_content">
							<span class="who-we-are__advisors_count"><?= $advisors_count; ?></span>
							<span class="who-we-are__advisors_text"><?= $advisors_text; ?></span>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-50">
				<div class="who-we-are__content">
					<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
					<h2 class="title"><?= $title; ?></h2>
					<p class="description"><?= $description; ?></p>
					<p class="paragraph"><?= $paragraph; ?></p>
					<div class="who-we-are__video">
						<a href="<?= $url; ?>" class="button button--play button--circle">
							<span class="circle circle-1"></span>
							<span class="circle circle-2"></span>
						</a>
						<?= $videoshowcase; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>