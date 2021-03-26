<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'about-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'about';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description') ?: 'Your description here...';
$paragraph = get_field('paragraph') ?: 'Your paragraph here...';
$url = get_field('url') ?: '#';
$icon = get_field('icon') ?: null;
$snippet_title = get_field('snippet_title') ?: 'Your snippet title here...';
$snippet_rating = get_field('snippet_rating') ?: 2;
$bg_image = get_field('bg_image') ?: null; ?>



<section id="<?php echo esc_attr($id); ?>" class="section about <?php echo esc_attr($className); ?>">
	<div class="container container--fluid">
		<div class="row">
			<div class="col col-50">
				<div class="about__bg">
					<img src="<?php bloginfo('template_directory');?>/assets/images/bg_jumbotron_right_big_gray.svg" width="1471" height="883">
				</div>
				<div class="about__ellipse about__ellipse--big"></div>
				<div class="about__ellipse about__ellipse--small"></div>
				<div class="about__content">
					<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
					<h2 class="title"><?= $title ?></h2>
					<p class="description"><?= $description; ?></p>
					<p class="paragraph"><?= $paragraph; ?></p>
					<a href="<?= $url; ?>">
						<div class="snippet">
							<?php
							if ($icon):?>
								<div class="snippet__image">
									<?= M4Helpers::getImgHtml([ 'img_id'=>$icon]); ?>
								</div>
							<?php
							endif; ?>
							<div class="snippet__content">
								<div class="snippet__title"><?= $snippet_title; ?></div>
								<div class="snippet__result">
									<span class="snippet__rating"><?= $snippet_rating; ?></span>
									<div class="snippet__stars">
										<span class="snippet__star"></span>
										<span class="snippet__star"></span>
										<span class="snippet__star"></span>
										<span class="snippet__star"></span>
										<span class="snippet__star"></span>
									</div>
								</div>
							</div>
						</div>
					</a>
				</div>
			</div>
			<div class="col col-50">
				<?php
				if ($bg_image):?>
					<div class="about__image">
						<?= M4Helpers::getImgHtml([ 'img_id'=>$bg_image, 'size'=>'full']); ?>
					</div>
				<?php
				endif; ?>

			</div>
		</div>
	</div>
</section>