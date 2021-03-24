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
$id = 'plans-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'plans';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$paragraph = get_field('paragraph') ?: 'Your paragraph here...';
$benefits = get_field('benefits');

$classes=[
	'plans__item plans__item--standard',
	'plans__item plans__item--filled plans__item--economy',
	'plans__item plans__item--executive'
];

?>


<section id="<?php echo esc_attr($id); ?>" class="section plans <?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="row">
			<div class="heading">
				<h4 class="subtitle subtitle__dot-before subtitle__dot-after"><?= $subtitle;?></h4>
				<h2 class="title"><?= $title;?></h2>
				<p class="paragraph"><?= $paragraph;?></p>
			</div>
		</div>
		<div class="row">
			<?php
			if (is_array($benefits) && count($benefits)>0):
				$i=0;
				foreach ($benefits as $benefit): ?>
					<div class="col col-33">
						<div class="<?= $classes[$i]; ?>">
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
							<a href="<?=$benefit['url'];?>" class="button button--orange button--image"><?= $benefit['button'];?></a>
						</div>
					</div>
				<?php
				$i++;
				endforeach;
			endif;?>


		</div>
	</div>
</section>