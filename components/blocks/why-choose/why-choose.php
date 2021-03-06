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
$paragraph = get_field('paragraph') ?: 'Your paragraph here...';
$bars = get_field('bars');
$image = get_field('image');

/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
	return;
endif; ?>
<div <?= $style;?> id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="why-choose__grid">
			<div class="why-choose__col">
				<h4 class="subtitle subtitle__dot-before">
					<?=$subtitle;?>
				</h4>
				<h2 class="title">
					<?=$title;?>
				</h2>
				<p class="paragraph">
					<?=$paragraph;?>
				</p>
				<?php
				if (is_array($bars) && count($bars)>0):?>
					<div class="progress-bars">
						<?php
						foreach ($bars as $bar): ?>
							<div class="bar" data-percent="<?= $bar['percent'];?>">
								<div class="bar__status">
									<div class="bar__title"><?= $bar['title'];?></div>
									<div class="bar__value"><?= $bar['percent'];?></div>
								</div>
								<div class="bar__scale">
									<div class="bar__progress"></div>
								</div>
							</div>
						<?php
						endforeach; ?>
					</div>
				<?php
				endif;?>

			</div>
			<div class="why-choose__col">
				<div class="why-choose__image">
					<?php
					if($image):
						echo M4Helpers::getImgHtml([ 'img_id'=>$image, 'size'=>'full']);
					endif;?>
				</div>
			</div>
		</div>
	</div>
</div>
