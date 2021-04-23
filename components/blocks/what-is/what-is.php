<?php
/**
 * What is Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

extract(M4Helpers::prepBlock($block));

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$switcher = get_field('switcher');
$image = get_field('image');

/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
	return;
endif; ?>

<div <?= $style;?> id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
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
							<button data-target="<?= $block['id'].'_tab'.$i; ?>" class="button button--blue<?php echo ($i==0) ? ' active' : ''; ?>"><?= ucfirst($v['target']); ?></button>
						<?php
						$i++;
						endforeach ?>
					</div>
				<?php
				endif;
				if(is_array($switcher) && count($switcher)>0): ?>
					<div class="switcher__tabs">
						<?php
						$i=0;
						foreach ($switcher as $k => $v): ?>
							<div class="switcher__tab <?php echo ($i==0) ? 'active' : ''; ?>" data-name="<?= $block['id'].'_tab'.$i; ?>">
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