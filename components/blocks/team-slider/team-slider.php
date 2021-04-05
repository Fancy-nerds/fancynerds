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
$id = 'team-slider-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'team-slider';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

$subtitle = get_field('subtitle') ?: 'Your subtitle here...';
$title = get_field('title') ?: 'Your title here...';
$paragraph = get_field('paragraph') ?: 'Your paragraph here...';
$bars = get_field('bars');
$image = get_field('image');

?>
<div class="<?= $className;?>" id="<?= $id;?>">
	<div class="container">
		<div class="row">
			<div class="col col-50">
				<h4 class="subtitle subtitle__dot-before">Professional team</h4>
				<h2 class="title">Meet Our Leadership Team</h2>
				<p class="paragraph">
					If we had a 'secret sauce' it would be our awesome people. <br> We have only professional team!
				</p>
			</div>
			<div class="col col-50 col-right">
				<a href="#" class="button button--orange button--image">All Team</a>
			</div>
		</div>

		<div class="team__slider slider row">
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/091224867853_huge.png" alt="">
					<div class="team__card_info">
						<div class="team__name">Gina Bruno</div>
						<div class="team__work">WEB Designer</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/09220761288_xl-2015.png" alt="">
					<div class="team__card_info">
						<div class="team__name">David Ferry</div>
						<div class="team__work">CTO of Company</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/09233064538_xl-2015.png" alt="">
					<div class="team__card_info">
						<div class="team__name">Christina Tores</div>
						<div class="team__work">CEO of Company</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/09284358002_xl-2015.png" alt="">
					<div class="team__card_info">
						<div class="team__name">Regina Blackly </div>
						<div class="team__work">WEB Developer</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/091396486544_huge.png" alt="">
					<div class="team__card_info">
						<div class="team__name">Olivia Chee</div>
						<div class="team__work">General Manager</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/091414526951_huge.png" alt="">
					<div class="team__card_info">
						<div class="team__name">Robert Cooper</div>
						<div class="team__work">WEB Developer</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>