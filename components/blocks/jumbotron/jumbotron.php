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
extract(M4Helpers::prepBlock($block));

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$description = get_field('description') ?: 'Your description here...';
$url = get_field('url') ?: '#';
$button = get_field('button') ?: 'Button Text';

/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
	return;
endif;
?>
<section <?= $style;?> id="<?php echo esc_attr($id); ?>" class="section <?php echo esc_attr($className); ?>">
	<div class="container container--fluid">
		<div class="jumbotron__grid">
			<div class="jumbotron__col">
				<div class="jumbotron_typographic">
					<div class="jumbotron_image">
						<img src="<?php bloginfo('template_directory');?>/assets/images/jumbotron-image.png" width="903" height="707">
					</div>
					<!--<div class="jumbotron_image--way">
						<img src="<?php bloginfo('template_directory');?>/assets/images/way.svg" width="299" height="421">
					</div>
					<div class="jumbotron_image--arrow">
						<img src="<?php bloginfo('template_directory');?>/assets/images/arrow.svg" width="41" height="46">
					</div>-->
				</div>
			</div>
			<div class="jumbotron__col">
				<div class="jumbotron_content">
					<h4 class="subtitle"><?= $subtitle;?></h4>
					<h1 class="title"><?= $title;?></h1>
					<p class="description"><?= $description;?></p>
					<a href="<?= $url; ?>" class="button button--orange button--image"><?= $button;?>
						<span>
							<i class="flaticon-right-arrow-1"></i>
						</span>
					</a>
				</div>
			</div>
		</div>
	</div>
	<div class="jumbotron__bg--gray-big">
		<img src="<?php bloginfo('template_directory');?>/assets/images/bg_jumbotron_right_big_gray.svg" width="1524" height="915">
	</div>
</section>