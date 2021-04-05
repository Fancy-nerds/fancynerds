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
$id = 'principles-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'principles';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$principles = get_field('principles');?>


<?php
if (is_array($principles) && count($principles)>0):?>
	<div class="principles" style="top: 80px;">
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