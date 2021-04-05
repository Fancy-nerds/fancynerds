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
$id = 'counters-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'counters';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$counters = get_field('counters');?>


<?php
if (is_array($counters) && count($counters)>0):?>
	<div class="<?= $className; ?>" style="top: -130px;">
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