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
$counts = get_field('counts');

/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
else : 
?>
	<div class=" <?php echo esc_attr($className); ?>" <?= $style;?> id="<?php echo esc_attr($id); ?>">
		<div class="container">
			<div class="heading">
				<h4 class="subtitle subtitle__dot-before subtitle__dot-after"><?= $subtitle; ?></h4>
				<h2 class="title">
					<?= $title; ?>
				</h2>
			</div>
			<div class="results__content">
				<div class="results__bg"></div>
				<div class="results__circle">
					<div class="results__logo">
						<img width="167" height="150" src="<?php bloginfo('template_directory');?>/assets/images/logo-fancy-nerds.svg">
					</div>
					<svg class="ot-cprocess-circle-chart" height="500" width="500">
						<circle cx="250" cy="250" r="225" stroke="url(#gradient)" stroke-width="50" fill="none"></circle>
						<linearGradient id="gradient" gradientTransform="rotate(45)">
							<stop offset="0%" stop-color="#015be6"></stop>
							<stop offset="100%" stop-color="#03baee"></stop>
						</linearGradient>
					</svg>
					<?php
					if (is_array($counts) && count($counts)>0):?>
						<div class="results__counts">
							<?php
							foreach ($counts as $count): ?>
								<div class="results__item">
									<div class="results__count"><?= $count['count'];?></div>
									<div class="results__item_inner">
										<div class="description"><?= $count['description'];?></div>
										<p class="paragraph">
											<?= $count['paragraph'];?>
										</p>
									</div>
								</div>
							<?php
							endforeach ?>
						</div>
					<?php
					endif; ?>
				</div>
			</div>
		</div>
	</div>
<?php
endif;