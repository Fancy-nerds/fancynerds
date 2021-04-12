<?php
/* Template Name: Service
Template Post Type: post, page */

get_header();


if ( have_posts() ) : while ( have_posts() ) : the_post();

	get_template_part( 'template-parts/jumbotron__inner', null, [
		'title' => get_the_title(),
	] );

	?>

<div class="main__content">

	<?php the_content(); ?>

</div>


<?php
endwhile;
endif;
get_footer();