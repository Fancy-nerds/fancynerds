<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

extract(M4Helpers::prepBlock($block));

$partners = get_field('partners');

/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
	return;
endif;
?>
<section <?= $style;?> id="<?php echo esc_attr($id); ?>" class="section <?php echo esc_attr($className); ?>">
	<div class="container container--fluid">
		<div class="slider row">
			<?php 
			if(is_array($partners) && count($partners)>0): 
				foreach ($partners as $partner): ?>
					<div class="col col-16 col-tablet-33">
						<div class="partners__item">
							<?= M4Helpers::getImgHtml([ 'img_id'=>$partner['logo'], 'size'=>'medium']); ?>
						</div>
					</div>
				<?php
				endforeach;
			endif; ?>
		</div>
	</div>
</section>
