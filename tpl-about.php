<?php
/* Template Name: About
Template Post Type: post, page */

get_header();
$pid = get_the_ID();
// $subtitle = get_field('subtitle',$pid);
// $title = get_field('title',$pid);
// $paragraph = get_field('paragraph',$pid);
// $teams = get_field('teams',$pid);

if ( have_posts() ) : while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/jumbotron__inner', null, [
		'title' => get_the_title(),
	] );

	the_content();

endwhile;
endif;
get_footer();