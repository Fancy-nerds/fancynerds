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

$counters = get_field('counters');
// $style.= " top:-130px;";
/* Render screenshot for preview */
if (get_field('is_example', $block['id'])) :
	echo "<img src='" . get_template_directory_uri() . "/components/blocks/" . $block['title'] . "/" . $block['title'] . ".png'/>";
	return;
endif;

if (is_array($counters) && count($counters) > 0) : ?>
	<div class="<?= $className; ?>" id="<?php echo esc_attr($id); ?>" <?= $style; ?>>
		<div class="counters__line"></div>
		<div class="container">
			<div class="counters__inner">
				<div class="counters__bg"></div>
				<div class="counters__grid">
					<?php
					foreach ($counters as $counter) : ?>
						<div class="counters__col">
							<div class="counters__item">
								<div class="subtitle subtitle__dot-before"><?= $counter['subtitle']; ?></div>
								<div class="counters__count">
									<span data-counter="<?= $counter['to']; ?>">0</span>+
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
endif;
