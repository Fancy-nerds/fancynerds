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


$principles = get_field('principles');?>


<?php
/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
	return;
endif;

if (is_array($principles) && count($principles)>0):?>
	<div class="<?php echo esc_attr($className); ?>" <?= $style;?> id="<?php echo esc_attr($id); ?>">
		<div class="container">
			<div class="row">
				<?php
				foreach ($principles as $principle): ?>
					<div class="col col-33">
						<div class="principles__item">
							<div class="principles__count">
								<?= $principle['count']; ?>
							</div>
							<div class="principles__content">
								<div class="principles__title">
									<?= $principle['title']; ?>
								</div>
								<div class="paragraph">
									<?= $principle['paragraph']; ?>
								</div>
							</div>
						</div>
					</div>
				<?php
				endforeach; ?>
			</div>
		</div>
	</div>
<?php
endif;