<?php

/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 *
 * @package fancynerds
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
?>

<?= get_template_part('template-parts/comments', 'basic', [
	'post_id' => $post->ID
]); ?>

