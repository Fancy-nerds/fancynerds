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
$benefits = get_field('benefits');

/* Render screenshot for preview */
if (get_field('is_example', $block['id'])) :
	echo "<img src='" . get_template_directory_uri() . "/components/blocks/" . $block['title'] . "/" . $block['title'] . ".png'/>";
	return;
endif;
?>
<section <?= $style; ?> id="<?php echo esc_attr($id); ?>" class="section <?php echo esc_attr($className); ?>">
	<div class="benefits__container">
		<div class="benefits__grid">
			<div class="benefits__col">
				<div class="benefits__image">
					<?php
					if ($image) :
						echo M4Helpers::getImgHtml(['img_id' => $image, 'size' => 'full']);
					endif; ?>
				</div>
			</div>
			<div class="benefits__col">
				<div class="benefits__bg">
					<img class="benefits__bg-bkp" src="<?php bloginfo('template_directory'); ?>/assets/images/bg_jumbotron_right_big_gray.jpg" width="1374" height="825">
					<img class="benefits__bg-tri" src="<?php bloginfo('template_directory'); ?>/assets/images/testimonials-bg-2.png" srcset="<?php bloginfo('template_directory'); ?>/assets/images/benefits-bg-2-120w.png 120w,
					<?php bloginfo('template_directory'); ?>/assets/images/benefits-bg-2.png 306w" sizes="(max-width: 1199px) 120px,
								306px" width="205" height="406">
				</div>
				<div class="benefits__content">
					<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
					<h2 class="title"><?= $title; ?></h2>
					<div class="benefits__items">
						<?php
						if (is_array($benefits) && count($benefits) > 0) :
							foreach ($benefits as $benefit) : ?>
								<div class="benefits__item">
									<div class="benefits__count"><?= $benefit['count']; ?></div>
									<div class="benefits__title"><?= $benefit['title']; ?></div>
									<p class="paragraph">
										<?= $benefit['paragraph']; ?>
									</p>
								</div>
						<?php
							endforeach;
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>