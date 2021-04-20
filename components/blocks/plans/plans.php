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
extract(M4Helpers::prepBlock($block));


$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$paragraph = get_field('paragraph') ?: 'Your paragraph here...';
$benefits = get_field('benefits');

$classes=[
	'plans__item plans__item--standard',
	'plans__item plans__item--filled plans__item--economy',
	'plans__item plans__item--executive'
];

$buttonClasses=[
	'button--blue',
	'button--orange-revert',
	'button--blue-dark'
];

?>


<section <?= $style;?> id="<?php echo esc_attr($id); ?>" class="section <?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="row">
			<div class="heading">
				<h4 class="subtitle subtitle__dot-before subtitle__dot-after"><?= $subtitle;?></h4>
				<h2 class="title"><?= $title;?></h2>
				<p class="paragraph"><?= $paragraph;?></p>
			</div>
		</div>
		<div class="plans__slider slider row">
			<?php
			if (is_array($benefits) && count($benefits)>0):
				$i=0;
				foreach ($benefits as $benefit): ?>
					<div class="col col-33">
						<div class="<?= $classes[$i]; ?>">
							<div class="plans__before">
								<!-- <img src="<? //get_template_directory_uri() ?>/assets/images/plans-before.svg"> -->

								<svg viewBox="0 0 565.04 539.26" xmlns="http://www.w3.org/2000/svg">
									<g><g>
										<path class="plans__before_bg" d="M229.79,0c-34.34,0-73.73,6.29-90.54,40-16,32-12.77,70-29.45,101.8C96,168.07,70.33,185.56,47.43,204.48S2.27,247.43.16,277.06c-.92,13,2.23,26.07,7.33,38.08,11.14,26.23,36.32,55.3,64.65,63.6,29.78,8.72,59.23,26.48,76.65,53.14,12.94,19.79,18.23,43.49,22.63,66.72,1.31,6.89,2.6,13.93,5.92,20.12,7.08,13.21,22.64,20.33,37.64,20.54s29.47-5.52,42.6-12.77c20.07-11.08,37.86-25.69,57.29-37.79,17.22-10.72,42.19-22.13,62.39-13.58,10.27,4.35,18,13.56,28.46,17.37,6,2.18,12.45,2.46,18.77,2,22.24-1.69,43.09-12.52,59.85-27.23,26.3-23.09,47.79-56.09,58.4-89.43,10.52-33.05,13.19-67.89,17.49-102.12,6.71-53.46,10.79-107.21-18.75-155.36-18-29.37-46-51.63-76.7-67.31s-64.09-25.2-97.56-33.35C322.14,8.7,276.18,0,229.79,0Z"/>
									</g></g>
								</svg>
							</div>
							<div class="plans__label"><?= $benefit['label'];?></div>
							<div class="plans__image">
								<?php
								if($benefit['image']):
									echo M4Helpers::getImgHtml([ 'img_id'=>$benefit['image'], 'size'=>'medium']);
								endif;?>
							</div>
							<div class="plans__price">
								<sup><?= $benefit['currency'];?></sup>
								<?= $benefit['price'];?>
							</div>
							<div class="plans__package"><?= $benefit['package'];?></div>
							<div class="plans__points">
								<?php
								if( is_array($benefit['points']) && count($benefit['points'])>0 ):
									foreach( $benefit['points'] as $v ):?>
										<p class="plans__point"><?= $v['point']; ?></p>
									<?php
									endforeach;
								endif;?>
							</div>
							<div class="plans__action">
								<a href="<?=$benefit['url'];?>" class="button button--image <?= $buttonClasses[$i]; ?>"><?= $benefit['button'];?>
									<span>
										<i class="flaticon-right-arrow-1"></i>
									</span>
								</a>
							</div>
							
						</div>
					</div>
				<?php
				$i++;
				endforeach;
			endif;?>


		</div>
	</div>
</section>