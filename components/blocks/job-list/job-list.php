<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
// Create id attribute allowing for custom "anchor" value.
extract(M4Helpers::prepBlock($block));

$shortcode = get_field('shortcode') ?: 'Shortcode of jobs categories list...';

/* Render screenshot for preview */
if (get_field('is_example',$block['id'])) :
	echo "<img src='".get_template_directory_uri()."/components/blocks/".$block['title']."/".$block['title'].".png'/>";
	return;
endif;?>

<section <?= $style;?> id="<?php echo esc_attr($id); ?>" class="section <?php echo esc_attr($className); ?>">
	<?= do_shortcode( $shortcode, true ); ?>
</section>