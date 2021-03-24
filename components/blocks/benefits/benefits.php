<?php

/**
 * Services Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'benefits-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'benefits';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$image = get_field('image');
$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$benefits = get_field('benefits');
?>


<section id="<?php echo esc_attr($id); ?>" class="section benefits <?php echo esc_attr($className); ?>">
	<div class="container container--fluid">
		<div class="row">
			<div class="col col-50">
				<div class="benefits__image">
					<?php
					if($image):
						echo M4Helpers::getImgHtml([ 'img_id'=>$image, 'size'=>'full']);
					endif;?>
				</div>
			</div>
			<div class="col col-50">
				<div class="benefits__bg">
					<img src="<?php bloginfo('template_directory');?>/assets/images/bg_jumbotron_right_big_gray.svg">
				</div>
				<div class="benefits__content">
					<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
					<h2 class="title"><?= $title; ?></h2>
					<div class="benefits__items">
						<?php
						if (is_array($benefits) && count($benefits)>0):
							foreach ($benefits as $benefit): ?>
								<div class="benefits__item">
									<div class="benefits__count"><?= $benefit['count']; ?></div>
									<div class="benefits__title"><?= $benefit['title']; ?></div>
									<p class="paragraph">
										<?= $benefit['paragraph']; ?>
									</p>
								</div>
							<?php
							endforeach;
						endif;?>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>