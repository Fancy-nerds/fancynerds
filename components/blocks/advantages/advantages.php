<?php

/**
 * Advantages Block Template.
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
$bg_image = get_field('bg_image') ?: null;
$list = get_field('list');

/* Render screenshot for preview */
if (get_field('is_example', $block['id'])) :
	echo "<img src='" . get_template_directory_uri() . "/components/blocks/" . $block['title'] . "/" . $block['title'] . ".png'/>";
	return;
endif;
?>
<div class="<?= $className; ?>" id="<?php echo esc_attr($id); ?>" <?= $style; ?>>
	<div class="container">
		<div class="advantages__grid">
			<div class="advantages__col">
				<?php
				if ($bg_image) : ?>
					<div class="advantages__image">
						<?= M4Helpers::getImgHtml(['img_id' => $bg_image, 'size' => 'full']); ?>
					</div>
				<?php
				endif; ?>
			</div>
			<div class="advantages__col">
				<div class="advantages__content">
					<div class="heading heading--left">
						<div class="subtitle subtitle__dot-before">
							<?= $subtitle; ?>
						</div>
						<h2 class="title">
							<?= $title; ?>
						</h2>
					</div>
					<p class="paragraph"><?= $paragraph; ?></p>
					<?php
					if (is_array($list) && count($list) > 0) :?>
					<div class="advantages__counters">
						<?php
						foreach ($list as $item) : ?>
						<div class="advantages__counters_item">
							<div class="advantages__counters_count"><?= $item['count'];?></div>
							<div class="advantages__counters_text"><?= $item['text'];?></div>
						</div>
						<?php
						endforeach;?>
					</div>
					<?php
					endif; ?>
				</div>
			</div>
		</div>
	</div>
</div>