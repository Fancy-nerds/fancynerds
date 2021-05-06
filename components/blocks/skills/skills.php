<?php

/**
 * Skills Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


extract(M4Helpers::prepBlock($block));

$skills = get_field('skills');

/* Render screenshot for preview */
if (get_field('is_example', $block['id'])) :
	echo "<img src='" . get_template_directory_uri() . "/components/blocks/" . $block['title'] . "/" . $block['title'] . ".png'/>";
	return;
endif; ?>

<div <?= $style; ?> id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<?php
	if (is_array($skills) && count($skills) > 0) : ?>
		<div class="container">
			<div class="skills__grid">
				<?php
				foreach ($skills as $skill) : ?>
					<div class="skills__col">
						<div class="skills__item" data-percent="<?= $skill['percent']; ?>">
							<div class="skills__content">
								<div class="skills__round">
									<span>0</span>%
								</div>
								<svg width="100%" height="100%" viewBox="0 0 42 42" class="donut">
									<defs>
										<linearGradient id="skillsGradient" x1="0%" y1="0%" x2="0%" y2="100%">
											<stop offset="0%" stop-color="#ff403e" />
											<stop offset="100%" stop-color="#ff811b" />
										</linearGradient>
									</defs>
									<circle class="donut-segment" cx="21" cy="21" r="15.91549430918954" fill="transparent" stroke="url(#skillsGradient)" stroke-width="3.5" stroke-dasharray="0 100" stroke-dashoffset="25" stroke-linecap="none"></circle>
								</svg>
							</div>
							<div class="skills__name"><?= $skill['name']; ?></div>
						</div>
					</div>
				<?php
				endforeach; ?>
			</div>
		</div>
	<?php
	endif; ?>
</div>