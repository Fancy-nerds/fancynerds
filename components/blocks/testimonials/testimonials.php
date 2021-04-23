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

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$text = get_field('text') ?: 'Your text here...';
$photo = get_field('photo');
$author = get_field('author') ?: 'Your author here...';
$work = get_field('work') ?: 'Your work here...';
$image = get_field('image');

/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
	return;
endif; ?>
<section id="<?php echo esc_attr($id); ?>" <?= $style;?> class="section <?php echo esc_attr($className); ?>">
	<div class="container container--fluid">
		<div class="row">
			<div class="col col-50">
				<div class="testimonials__bg">
					<img src="<?php bloginfo('template_directory');?>/assets/images/bg_jumbotron_right_big_gray.svg" width="1285" height="772">
				</div>
				<div class="testimonials__ellipse testimonials__ellipse--big"></div>
				<div class="testimonials__ellipse testimonials__ellipse--small"></div>
				<div class="testimonials__content">
					<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
					<h2 class="title"><?= $title; ?></h2>
					<div class="blockquote">
						<div class="blockquote__text"><?= $text; ?></div>
						<div class="blockquote__actions">
							<div class="blockquote__photo">
								<?php
								if($photo):
									echo M4Helpers::getImgHtml([ 'img_id'=>$photo, 'size'=>'thumbnail']);
								endif;?>
							</div>
							<div class="blockquote__content">
								<div class="blockquote__author"><?= $author; ?></div>
								<div class="blockquote__work"><?= $work; ?></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-50">
				<div class="testimonials__image">
					<?php
					if($image):
						echo M4Helpers::getImgHtml([ 'img_id'=>$image, 'size'=>'full']);
					endif;?>
				</div>
			</div>
		</div>
	</div>
</section>
