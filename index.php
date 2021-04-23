<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fancynerds
 */
get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/jumbotron__inner', null, [
		'title' => get_the_title(),
	] );

	the_content();

endwhile;
endif;
get_footer();