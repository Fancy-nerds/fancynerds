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
$id = 'why-choose-' . $block['id'];
if( !empty($block['anchor']) ) {
	$id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'why-choose';
if( !empty($block['className']) ) {
	$className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
	$className .= ' align' . $block['align'];
}

// $image = get_field('image');
// $advisors_count = get_field('advisors_count') ?: 'Your Advisors count here...';
// $advisors_text = get_field('advisors_text') ?: 'Your Advisors text here...';
// $subtitle = get_field('subtitle') ?: 'Your subtitle here...';
// $title = get_field('title') ?: 'Your title here...';
// $description = get_field('description') ?: 'Your description here...';
// $paragraph = get_field('paragraph') ?: 'Your paragraph here...';
// $url = get_field('url') ?: 'Your url here...';
// $videoshowcase = get_field('videoshowcase') ?: 'Your videoshowcase here...';


?>



<div id="<?php echo esc_attr($id); ?>" class="why-choose <?php echo esc_attr($className); ?>">
	<div class="principles">
		<div class="container">
			<div class="row">
				<div class="col col-33">
					<div class="principles__item">
						<div class="principles__count">
							01
						</div>
						<div class="principles__content">
							<div class="principles__title">Radical Integrity</div>
							<div class="paragraph">Our people truly care for our work and for each other.</div>
						</div>
					</div>
				</div>
				<div class="col col-33">
					<div class="principles__item">
						<div class="principles__count">
							02
						</div>
						<div class="principles__content">
							<div class="principles__title">People First</div>
							<div class="paragraph">We believe that a culture  will build a thriving company.</div>
						</div>
					</div>
				</div>
				<div class="col col-33">
					<div class="principles__item">
						<div class="principles__count">
							03
						</div>
						<div class="principles__content">
							<div class="principles__title">Process Perfection</div>
							<div class="paragraph">We’re driven to becoming the best version of ourselves.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col col-50">
				<h4 class="subtitle subtitle__dot-before">Why choose us</h4>
				<h2 class="title">Work with a Dedicated SEO Company</h2>
				<p class="paragraph">
					From keyword research to technical auditing to site migration, our team of technical SEOs are true experts in their field.
				</p>
				<div class="progress-bars">
					<div class="bar" data-percent="70%">
						<div class="bar__status">
							<div class="bar__title">Keyword Research</div>
							<div class="bar__value">70%</div>
						</div>
						<div class="bar__scale">
							<div class="bar__progress"></div>
						</div>
					</div>

					<div class="bar" data-percent="80%">
						<div class="bar__status">
							<div class="bar__title">Technical SEO Audit</div>
							<div class="bar__value">80%</div>
						</div>
						<div class="bar__scale">
							<div class="bar__progress"></div>
						</div>
					</div>

					<div class="bar" data-percent="60%">
						<div class="bar__status">
							<div class="bar__title">Content Optimization</div>
							<div class="bar__value">60%</div>
						</div>
						<div class="bar__scale">
							<div class="bar__progress"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-50">
				<img src="<?php bloginfo('template_directory');?>/assets/images/about_image.png">
			</div>
		</div>
	</div>
</div>