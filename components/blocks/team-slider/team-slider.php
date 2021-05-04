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

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$paragraph = get_field('paragraph') ?: 'Your paragraph here...';
$button = get_field('button') ?: 'All Team';
$url = get_field('url') ?: '#';
$button = get_field('button') ?: 'All Team';

$shortcode = get_field('shortcode');

// $bars = get_field('bars');
// $image = get_field('image');
/* Render screenshot for preview */
if (get_field('is_example', $block['id'])) :
	echo "<img src='" . get_template_directory_uri() . "/components/blocks/" . $block['title'] . "/" . $block['title'] . ".png'/>";
	return;
endif;
?>
<div class="<?= $className; ?>" id="<?= $id; ?>" <?= $style; ?>>
	<div class="container">
		<div class="team-slider__intro">
			<div class="team-slider__header">
				<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
				<h2 class="title"><?= $title; ?></h2>
				<p class="paragraph">
					<?= $paragraph; ?>
				</p>
			</div>
			<div class="team-slider__nav team-slider__nav--top">
				<a href="<?= $url; ?>" class="button button--orange button--image"><?= $button; ?>
					<span>
						<i class="flaticon-right-arrow-1"></i>
					</span>
				</a>
			</div>
		</div>

		<?= $shortcode; ?>
		<div class="team-slider__nav team-slider__nav--bottom">
			<a href="<?= $url; ?>" class="button button--orange button--image"><?= $button; ?>
				<span>
					<i class="flaticon-right-arrow-1"></i>
				</span>
			</a>
		</div>
	</div>
</div>