<?php
/**
 * What is Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'what-is-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'what-is';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$switcher = get_field('switcher');
$image = get_field('image');

// echo '<pre>';
// print_r($switcher);
// echo '</pre>';

?>



<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="row">
			<div class="col col-50">
				<h4 class="subtitle subtitle__dot-before"><?= $subtitle; ?></h4>
				<h2 class="title"><?= $title; ?></h2>

				<?php
				if(is_array($switcher) && count($switcher)>0): ?>
					<div class="switcher">
						<?php
						$i=0;
						foreach ($switcher as $k => $v): ?>
							<button data-target="<?= $v['target']; ?>" class="button button--blue <?php echo ($i==0) ? 'active' : ''; ?>"><?= $v['target']; ?></button>
						<?php
						$i++;
						endforeach ?>
					</div>
				<?php
				endif; ?>

				<!-- <div class="switcher">
					<button data-target="integration" class="button button--blue active">Integration</button>
					<button data-target="development" class="button">Development</button>
				</div> -->
				<?php
				if(is_array($switcher) && count($switcher)>0): ?>
					<div class="switcher__tabs">
						<?php
						$i=0;
						foreach ($switcher as $k => $v): ?>
							<div class="switcher__tab <?php echo ($i==0) ? 'active' : ''; ?>" data-name="<?= $v['target']; ?>">
								<p class="paragraph"><?= $v['paragraph'];?></p>
								<?= $v['list'];?>
							</div>
						<?php
						$i++;
						endforeach ?>
					</div>
				<?php
				endif; ?>

			</div>
			<div class="col col-50">
				<div class="what-is__image">
					<?php
					if($image):
						echo M4Helpers::getImgHtml([ 'img_id'=>$image, 'size'=>'full']);
					endif;?>
				</div>
			</div>
		</div>
	</div>
</div>