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

$services = get_field('services');

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$background = get_field('background');

/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
else :
?>
	<section id="<?php echo esc_attr($id); ?>" <?= $style;?> class="section <?php echo esc_attr($className); ?>">
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
								<div class="services__action">
									<a href="<?= get_permalink( $service['url'] ); ?>" class="button button--small button--orange button--image"><?= $service['more']; ?>
										<span>
											<i class="flaticon-right-arrow-1"></i>
										</span>
									</a>
								</div>
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
<?php
endif;