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
$id = 'jumbotron-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'jumbotron';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description') ?: 'Your description here...';
$url = get_field('url') ?: '#';
$button = get_field('button') ?: 'Button Text';?>



<section id="<?php echo esc_attr($id); ?>" class="section jumbotron <?php echo esc_attr($className); ?>">
	<div class="container container--fluid">
		<div class="row">
			<div class="col col-54">
				<div class="jumbotron_typographic">
					<div class="jumbotron_image">
						<img src="<?php bloginfo('template_directory');?>/assets/images/jumbotron-image.svg">
					</div>
					<div class="jumbotron_image--way">
						<img src="<?php bloginfo('template_directory');?>/assets/images/way.svg">
					</div>
					<div class="jumbotron_image--arrow">
						<img src="<?php bloginfo('template_directory');?>/assets/images/arrow.svg">
					</div>
				</div>
			</div>
			<div class="col col-46">
				<div class="jumbotron_content">
					<h4 class="subtitle"><?= $subtitle;?></h4>
					<h1 class="title"><?= $title;?></h1>
					<p class="description"><?= $description;?></p>
					<a href="<?= $url; ?>" class="button button--orange button--image"><?= $button;?></a>
				</div>
			</div>
		</div>
	</div>
	<div class="jumbotron__bg--gray-big">
		<img src="<?php bloginfo('template_directory');?>/assets/images/bg_jumbotron_right_big_gray.svg">
	</div>
</section>