<?php
/**
 * Services Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

extract(M4Helpers::prepBlock($block,[
	'top'=>'-130px',
]));

$counters = get_field('counters');
// $style.= " top:-130px;";
/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
	return;
endif;

if (is_array($counters) && count($counters)>0):?>
	<div class="<?= $className; ?>" id="<?php echo esc_attr($id); ?>" <?= $style;?>>
		<div class="container">
			<div class="counters__bg"></div>
			<div class="row">
				<?php
				foreach ($counters as $counter): ?>
					<div class="col col-25">
						<div class="counters__item">
							<div class="subtitle subtitle__dot-before"><?= $counter['subtitle'];?></div>
							<div class="counters__count">
								<span data-counter="<?= $counter['to'];?>">0</span>+
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
