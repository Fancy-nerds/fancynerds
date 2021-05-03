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

$title = get_field('title') ?: 'title here...';
$button = get_field('button') ?: 'button name...';
$url = get_field('url') ?: 'url here...';

/* Render screenshot for preview */
if (get_field('is_example', $block['id'])) :
	echo "<img src='" . get_template_directory_uri() . "/components/blocks/" . $block['title'] . "/" . $block['title'] . ".png'/>";
	return;
endif;
?>
<section <?= $style; ?> id="<?php echo esc_attr($id); ?>" class="section <?php echo esc_attr($className); ?>">
	<div class="action__line action__line--fl"></div>
	<div class="action__container">
		<div class="action__content">
			<div class="action__bg">
				<img class="action__bg-image action__bg-image--mobile" src="<?php bloginfo('template_directory'); ?>/assets/images/economy_after.png">
				<img class="action__bg-image action__bg-image--desk" src="<?php bloginfo('template_directory'); ?>/assets/images/action_bg.png">
			</div>
			<div class="action__title"><?= $title; ?></div>
			<a href="<?= $url; ?>" class="button button--orange-revert button--big button--image"><?= $button; ?>
				<span>
					<i class="flaticon-right-arrow-1"></i>
				</span>
			</a>
		</div>
	</div>
</section>