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
$id = 'who-we-are-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'who-we-are';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

// $image = get_field('image');
// $subtitle = get_field('subtitle') ?: 'Your subtitle here...';
// $title = get_field('title') ?: 'Your title here...';
// $benefits = get_field('benefits');
?>


<div id="<?php echo esc_attr($id); ?>" class="main__content <?php echo esc_attr($className); ?>">
	<div class="container">
		<div class="row who-we-are">
			<div class="col col-50">
				<div class="who-we-are__image">
					<img src="<?php bloginfo('template_directory');?>/assets/images/1227081424_huge.png">
					<div class="who-we-are__advisors">
						<div class="who-we-are__advisors_content">
							<span class="who-we-are__advisors_count">25+</span>
							<span class="who-we-are__advisors_text">professional advisors</span>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-50">
				<div class="who-we-are__content">
					<h4 class="subtitle subtitle__dot-before">Who we are</h4>
					<h2 class="title">We're on a Mission to Change Your View of SEO</h2>
					<p class="description">Onum is a values-driven SEO agency dedicated to empowering our customers.</p>
					<p class="paragraph">
						Over the years, we have worked with Fortune 500s and brand-new startups. 
						We help ambitious businesses like yours generate more profits by building awareness, 
						driving web traffic, connecting with customers, and growing overall sales. Give us a call.
					</p>
					<div class="who-we-are__video">
						<a href="#" class="button button--play button--circle">
							<span class="circle circle-1"></span>
							<span class="circle circle-2"></span>
						</a>
						video showcase
					</div>
				</div>
			</div>
		</div>
	</div>
</div>