<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */


extract(M4Helpers::prepBlock($block));

$steps = get_field('steps');

$icons = [
'flaticon-pie-chart-1',
'flaticon-document',
'flaticon-search-1',
'flaticon-pie-chart'
];?>

<section <?= $style;?> id="<?php echo esc_attr($id); ?>" class="section <?php echo esc_attr($className); ?>">
	<div class="container container--fluid">
		<div class="row">
			<?php
			if (is_array($steps) && count($steps)>0):
				$i=0;
				foreach ( $steps as $step ):?>
					<div class="col col-25">
						<a href="<?= $step['url']; ?>" class="steps__item">
							<div class="steps__overlay"></div>
							<div class="steps__icon">
								<div class="steps__icon_overlay"></div>
								<span class="<?= $icons[$i]; ?>"></span>
							</div>
							<div class="steps__content">
								<h6 class="steps__title"><?= $step['title'];?></h6>
								<p class="paragraph"><?= $step['paragraph'];?></p>
							</div>
							<div class="steps__count"><?= $step['count'];?></div>
						</a>
					</div>
				<?php
				$i++;
				endforeach;?>
			<?php
			endif ?>

		</div>
	</div>
</section>