<?php

/**
 * Services Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

extract(M4Helpers::prepBlock($block));

$image = get_field('image');
$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description') ?: 'Your description here...';
/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
	return;
endif; ?>
<div <?= $style;?> id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<?php
	if($image):
		echo M4Helpers::getImgHtml([ 'img_id'=>$image, 'size'=>'large', 'class'=>'image--rounded']); 
	endif;?>
	<div class="team__heading">
		<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
		<h2 class="title"><?= $title; ?></h2>
		<p class="description"><?= $description; ?></p>
	</div>
</div>
