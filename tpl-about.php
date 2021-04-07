<?php
/* Template Name: About
Template Post Type: post, page */

get_header();

if ( have_posts() ) : while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/jumbotron__inner', null, [
		'title' => get_the_title(),
	] );

	the_content();

endwhile;
endif;
get_footer();