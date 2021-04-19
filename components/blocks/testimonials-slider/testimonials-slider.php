<?php /**
 * testimonials-slider Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'testimonials-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'testimonials-slider';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

// $image = get_field('image');
$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$testimonials = get_field('testimonials');
?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="row">
			<div class="col col-25 centered-y">
				<div class="heading">
					<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
					<h2 class="title"><?= $title; ?></h2>
					<div class="testimonials-slider__buttons">
						<div class="testimonials-slider__button testimonials-slider__button-prev">
							<i class="flaticon-arrow-pointing-to-left"></i>
						</div>
						<div class="testimonials-slider__button testimonials-slider__button-next">
							<i class="flaticon-arrow-pointing-to-right"></i>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-75">
				<div class="testimonials-slider__content">
					<div class="testimonials-slider__bg"></div>
					<?php
					if (is_array($testimonials) && count($testimonials)>0):?>
							<div class="testimonials-slider__slider">
								<div class="swiper-container">
									<div class="swiper-wrapper">
									<?php
									foreach ($testimonials as $value):  ?>
										<div class="swiper-slide">
											<div class="testimonial">
												<?php
												$thumb_id =	get_post_thumbnail_id($value['tesimonial']);
												if($thumb_id):?>
												<div class="testimonial__photo">
													<?php echo M4Helpers::getImgHtml([ 'img_id'=>$thumb_id, 'size'=>'thumbnail']); ?>
												</div>
												<?php
												endif;?>
												<div class="testimonial__text">
													<?= get_post_field('post_content', $value['tesimonial']); ?>
												</div>
												<div class="testimonial__actions">
													<div class="testimonial__author"><?= get_the_title($value['tesimonial']); ?></div>
													<div class="testimonial__work"><?= $value['role']; ?></div>
												</div>
											</div>
										</div>
									<?php
									endforeach;?>
									</div>
								</div>
							</div>
					<?php
					endif;?>
				</div>
			</div>
		</div>
	</div>
</div>