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
			<div class="archive__grid">
				<? if (have_posts()) :
					while (have_posts()) : the_post(); ?>
						<?= get_template_part('template-parts/post', 'card', [
							'post_id' => $post->ID
						]); ?>
				<?
					endwhile;
				endif;
				?>
			</div>
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
