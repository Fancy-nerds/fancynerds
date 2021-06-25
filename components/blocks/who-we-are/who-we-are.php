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
$advisors_count = get_field('advisors_count') ?: 'Your Advisors count here...';
$advisors_text = get_field('advisors_text') ?: 'Your Advisors text here...';
$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description') ?: 'Your description here...';
$paragraph = get_field('paragraph') ?: 'Your paragraph here...';
$url = get_field('url') ?: 'Your url here...';
$videoshowcase = get_field('videoshowcase') ?: 'Your videoshowcase here...';

/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
	return;
endif; ?>
<div <?= $style;?> id="<?php echo esc_attr($id); ?>" class="main__content <?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="who-we-are__grid">
			<div class="who-we-are__col">
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
			<div class="who-we-are__col">
				<div class="who-we-are__content">
					<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
					<h2 class="title"><?= $title; ?></h2>
					<p class="description"><?= $description; ?></p>
					<p class="paragraph"><?= $paragraph; ?></p>
					<div class="who-we-are__video" data-type="native" data-ratio="1.77777" data-ref="/wp-content/uploads/2021/06/freestock_2529101.mp4">
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