<?php

/**
 * Services-list Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

extract(M4Helpers::prepBlock($block));

$items = get_field('items');
$image = get_field('image');
$icons_list = [
	'flaticon-search-1',
	'flaticon-coding',
	'flaticon-cloud-computing',
	'flaticon-pie-chart',
	'flaticon-pie-chart-1',
	'flaticon-document'
];
/* Render screenshot for preview */
if (get_field('is_example', $block['id'])) :
	echo "<img src='" . get_template_directory_uri() . "/components/blocks/" . $block['title'] . "/" . $block['title'] . ".png'/>";
	return;
endif;
?>
<div <?= $style; ?> id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<?php
	if (is_array($items) && count($items) > 0) : ?>
		<div class="container">
			<div class="services-list__grid">
				<div class="services-list__col services-list__left">
					<?php
					$i = 0;
					foreach ($items as $item) :

						if ($i === 3) : ?>
				</div><!-- .services-list__left -->
				<div class="services-list__col services-list__center">
					<div class="services-list__photo">
						<svg class="clip-path">
							<clipPath id="services-list-clip-path" clipPathUnits="objectBoundingBox">
								<path d="M0.184,0.814 a0.398,0.505,0,0,1,-0.106,-0.074 C0.021,0.679,-0.005,0.577,0.001,0.482 S0.039,0.296,0.082,0.217 A0.433,0.549,0,0,1,0.228,0.042 A0.254,0.323,0,0,1,0.424,0.013 c0.043,0.018,0.082,0.054,0.127,0.068 C0.623,0.102,0.696,0.058,0.77,0.059 a0.235,0.298,0,0,1,0.193,0.139 c0.044,0.091,0.046,0.207,0.021,0.309 S0.911,0.699,0.859,0.783 C0.797,0.883,0.721,0.984,0.621,0.999 c-0.072,0.011,-0.142,-0.026,-0.209,-0.062"></path>
							</clipPath>
						</svg>
						<?php
							if ($image) :
								echo M4Helpers::getImgHtml(['img_id' => $image, 'size' => 'large', 'class' => 'services-list__clipped-image']);
							endif; ?>
						<div class="services-list__bg">
							<img src="<?= get_template_directory_uri() . '/assets/images/services-list-bg-gray.svg' ?>">
						</div>
					</div>
				</div>
				<div class="services-list__col services-list__right">
				<?php
						endif; ?>

				<a href="<?= get_permalink($item['link']); ?>" class="services-list__item">
					<div class="services-list__icon">
						<div class="services-list__icon_overlay"></div>
						<span class="<?= $icons_list[$i]; ?>"></span>
					</div>
					<div class="services-list__content">
						<h6 class="services-list__title"><?= $item['title']; ?></h6>
						<p class="paragraph">
							<?= $item['paragraph']; ?>
						</p>
					</div>
				</a>
			<?php
						$i++;
					endforeach; ?>
				</div><!-- .services-list__left || services-list__right -->
			</div><!-- .row centered-y -->
		</div><!-- .container -->
	<?php
	endif; ?>
</div>