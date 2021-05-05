<?php

/**
 * Numbers Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

extract(M4Helpers::prepBlock($block));

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$before = get_field('before') ?: 'Your before here...';
$after = get_field('after') ?: 'Your after here...';
$numbers = get_field('numbers');
$counters = get_field('counters');


/* Render screenshot for preview */
if (get_field('is_example', $block['id'])) :
	echo "<img src='" . get_template_directory_uri() . "/components/blocks/" . $block['title'] . "/" . $block['title'] . ".png'/>";
	return;
endif;
?>

<div <?= $style; ?> id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="heading">
			<h4 class="subtitle subtitle__dot-before subtitle__dot-after"><?= $subtitle; ?></h4>
			<h2 class="title"><?= $title; ?></h2>
		</div>
		<div class="row">
			<div class="toggle__wrapper">
				<div class="toggle__text toggle__text--active toggle__text--before"><?= $before; ?></div>
				<label class="toggle">
					<input type="checkbox">
					<span class="toggle__slider"></span>
				</label>
				<div class="toggle__text toggle__text--after"><?= $after; ?></div>
			</div>
		</div>
		<?php
		if (is_array($numbers) && count($numbers) > 0) : ?>
			<div class="numbers__grid">
				<?php
				foreach ($numbers as $number) : ?>
					<div class="numbers__col">
						<div class="numbers__item">
							<div class="numbers__count" data-before="<?= $number['before']; ?>" data-after="<?= $number['after']; ?>">
								<?= $number['before']; ?>
							</div>
							<div class="numbers__text"><?= $number['text']; ?></div>
						</div>
					</div>
				<?php
				endforeach; ?>
			</div>
		<?php
		endif;

		if (is_array($counters) && count($counters) > 0) : ?>
			<div class="row">
				<div class="counters">
					<div class="container">
						<div class="row">
							<?php
							foreach ($counters as $counter) : ?>
								<div class="col col-25">
									<div class="counters__item">
										<div class="subtitle subtitle__dot-before"><?= $counter['subtitle']; ?></div>
										<div class="counters__count">
											<span data-counter="<?= $counter['counter']; ?>">0</span>+
										</div>
									</div>
								</div>
							<?php
							endforeach; ?>
						</div>
					</div>
				</div>
			</div>
		<?php
		endif; ?>
	</div>
</div>