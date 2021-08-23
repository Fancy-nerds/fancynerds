<?php

/**
 * Blog Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
extract(M4Helpers::prepBlock($block));

$label = get_field('label');
$title = get_field('title');
$subtitle = get_field('subtitle');

$params = get_field('blog_config');
$posts = [];

if (!$params) return;

if ($params['type'] === 'recent') {
	$posts = wp_get_recent_posts([
		'numberposts'      => (int) $params['max_count'],
		'orderby'          => 'post_date',
		'order'            => 'DESC',
		'post_type'        => 'post',
		'post_status'      => 'publish',
		'suppress_filters' => false,
	], OBJECT);
} elseif ($params['type'] === 'random') {
	$posts = get_posts([
		'numberposts' => (int) $params['max_count'],
		'orderby'     => 'rand',
		'post_type'   => 'post',
		'post_status' => 'publish',
	]);
} elseif ($params['type'] === 'custom') {
	$posts = array_map(function ($a) {
		return $a['post'];
	}, $params['posts']);
}

if (!$posts || !count($posts)) return;

?>

<section id="<?php echo esc_attr($id); ?>" <?= $style; ?> class="section <?php echo esc_attr($className); ?>">
	<div class="blog__circles">
		<img src="<?php bloginfo('template_directory'); ?>/assets/images/blog-cicles.png" width="1742" height="601">
	</div>
	<div class="blog__container">
		<? if ($label || $title || $subtitle) { ?>
		<div class="blog__header">
			<div class="heading">
				<? if ($label) { ?>
					<h4 class="subtitle subtitle__dot-before subtitle__dot-after"><?= $label ?></h4>
				<? } ?>
				<? if ($title) { ?>
					<h2 class="title"><?= $title ?></h2>
				<? } ?>
				<? if ($subtitle) { ?>
					<p class="paragraph">
						<?= $subtitle ?>
					</p>
				<? } ?>
			</div>
		</div>
		<? } ?>
		<div class="blog__list">
			<? foreach ($posts as $post) {
					get_template_part('template-parts/post', 'card', [
					'post_id' => gettype($post) === 'object' ? $post->ID : $post,
				]);
			} ?>
		</div>
	</div>
</section>