<?php

/**
 * Support Form Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
extract(M4Helpers::prepBlock($block));

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$bg_image = get_field('bg_image') ?: null;
$list = get_field('list');

/* Render screenshot for preview */
if (get_field('is_example', $block['id'])) :
	echo "<img src='" . get_template_directory_uri() . "/components/blocks/" . $block['title'] . "/" . $block['title'] . ".png'/>";
	return;
endif;
?>
<section <?= $style; ?> id="<?php echo esc_attr($id); ?>" class="section <?php echo esc_attr($className); ?>">

	<div class="support__bg">
		<?php
		if ($bg_image) :
			echo M4Helpers::getImgHtml(['img_id' => $bg_image, 'size' => 'full']);
		else: ?>
			<img src="<?php bloginfo('template_directory'); ?>/assets/images/support-bg.png">
		<?php
		endif; ?>
	</div>

	<div class="container">
		<div class="heading">
			<h4 class="subtitle subtitle__dot-before subtitle__dot-after">
				<?= $subtitle; ?>
			</h4>
			<h2 class="title">
				<?= $title; ?>
			</h2>
		</div>
		<?php
		if (is_array($list) && count($list) > 0) :?>
		<div class="support__grid">
			<?php
			$icons=[
				'flaticon-startup',
				'flaticon-system',
				'flaticon-internet',
				'flaticon-report'
			];
			$c=0;
			foreach ($list as $item):
				// echo '<pre>';
				// print_r($item);
				// echo '</pre>';
				?>
				<div class="support__col">
					<div class="support__card">
						<div class="support__overlay"></div>
						<div class="support__image">
							<span class="<?= $icons[$c]; ?>"></span>
						</div>
						<div class="support__title"><?= $item['title']; ?></div>
						<p class="paragraph">
							<?= $item['paragraph']; ?>
						</p>
						<?php
						if ($item['button_label']): ?>
							<a href="<?= $item['button_url']; ?>" class="button button--orange button--image">
								<?= $item['button_label']; ?>
								<span>
									<i class="flaticon-right-arrow-1"></i>
								</span>
							</a>
						<?php
						endif ?>
					</div>
				</div>
			<?php
			$c++;
			endforeach ?>
		</div>
		<?php
		endif; ?>

	</div>
</section>