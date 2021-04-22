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

?>

<section <?= $style;?> id="<?php echo esc_attr($id); ?>" class="section <?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="action__content" style="
position: absolute;
left: 50%;
transform: translateX(-50%);
top: 87px;
">
			<div class="action__title"><?= $title;?></div>
			<a href="<?= $url; ?>" class="button button--orange-revert button--big button--image"><?= $button;?>
				<span>
					<i class="flaticon-right-arrow-1"></i>
				</span>
			</a>
		</div>
	</div>
</section>