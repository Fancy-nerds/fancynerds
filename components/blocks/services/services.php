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
$id = 'services-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'services';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$services = get_field('services');

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$background = get_field('background');
?>


<section id="<?php echo esc_attr($id); ?>" class="section services <?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="row">
			<div class="heading">
				<h4 class="subtitle subtitle__dot-before subtitle__dot-after"><?= $subtitle; ?></h4>
				<h2 class="title"><?= $title; ?></h2>
			</div>
		</div>
		<div class="services__slider slider row">
			<?php
			if (is_array($services) && count($services)>0):
				foreach ($services as $service):?>
					<div class="col col-33">
						<div class="services__item">
							<div class="services__image">
								<?= M4Helpers::getImgHtml([ 'img_id'=>$service['image'], 'size'=>'medium']); ?>
							</div>
							<div class="services__title"><?= $service['title']; ?></div>
							<p class="paragraph"><?= $service['paragraph']; ?></p>
							<a href="<?= get_permalink( $service['url'] ); ?>" class="button button--orange button--image"><?= $service['more']; ?></a>
						</div>
					</div>
				<?php
				endforeach;
			endif ?>
		</div>
		<div class="services__bg">
			<?php 
			if($background):
				echo M4Helpers::getImgHtml([ 'img_id'=>$background, 'size'=>'full']);
			endif;?>
		</div>
	</div>
</section>