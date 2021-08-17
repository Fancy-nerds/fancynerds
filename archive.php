<?php

/**
 * The template for displaying archive pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fancynerds
 */

get_header(); ?>

<div class="archive">
	<div class="archive__banner">
		<? get_template_part('template-parts/jumbotron__inner', null, [
			'title' => get_the_archive_title(),
		]); ?>
	</div>
	<div class="container">
		<div class="archive__content">

			<? if (have_posts()) { ?>
				<div class="archive__grid">
					<? while (have_posts()) : the_post(); ?>
						<?= get_template_part('template-parts/post', 'card', [
							'post_id' => $post->ID
						]); ?>
					<?
					endwhile; ?>
				</div>
			<? } else {
			?>
				<h2 class="archive__empty-title"><?= __('Sorry, no posts found', 'fancynerds') ?></h2>
			<?
			};
			?>

			<div class="archive__sidebar">
				<?
				get_sidebar('archive');
				?>
			</div>
		</div>
	</div>
</div>

<?php
get_footer();
