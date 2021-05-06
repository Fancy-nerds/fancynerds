<?php

/**
 * Cases-slider Block Template.
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
$button = get_field('button') ?: 'Button...';
$url = get_field('url');

$items = get_field('items');

/* Render screenshot for preview */
if (get_field('is_example', $block['id'])) :
	echo "<img src='" . get_template_directory_uri() . "/components/blocks/" . $block['title'] . "/" . $block['title'] . ".png'/>";
	return;
endif;
?>
<div <?= $style; ?> id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="cases-slider__intro">
			<div class="cases-slider__header">
				<div class="heading">
					<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
					<h2 class="title"><?= $title; ?></h2>
					<p class="paragraph">
						<?= $paragraph; ?>
					</p>
				</div>
			</div>
			<div class="cases-slider__nav cases-slider__nav--top">
				<?php
				if ($button) : ?>
					<a href="<?= get_permalink($url); ?>" class="button button--orange button--image">
						<?= $button; ?>
						<span>
							<i class="flaticon-right-arrow-1"></i>
						</span>
					</a>
				<?php
				endif ?>
			</div>
		</div>
	</div>

	<?php
	if (is_array($items) && count($items) > 0) : ?>
		<div class="cases-slider__swiper-container">
			<div class="swiper-container cases-slider__swiper">
				<!-- Additional required wrapper -->
				<div class="swiper-wrapper">
					<?php
					foreach ($items as $item) : ?>
						<div class="swiper-slide">
							<a href="<?= get_permalink($item['url']); ?>" class="portfolio__item">
								<?php
								if ($item['thumb']) :
									echo M4Helpers::getImgHtml(['img_id' => $item['thumb'], 'size' => 'large']);
								endif; ?>
								<div class="portfolio__item_information">
									<div class="portfolio__item_name"><?= $item['name']; ?></div>
									<div class="portfolio__item_category"><?= $item['category']; ?></div>
								</div>
							</a>
						</div>
					<?php
					endforeach; ?>
				</div>
				<!-- If we need pagination -->
				<div class="swiper-pagination"></div>
			</div>
		</div>
	<?php
	endif; ?>
	<div class="container">
		<div class="cases-slider__nav cases-slider__nav--bottom">
			<a href="<?= get_permalink($url); ?>" class="button button--orange button--image"><?= $button; ?>
				<span>
					<i class="flaticon-right-arrow-1"></i>
				</span>
			</a>
		</div>
	</div>
</div>