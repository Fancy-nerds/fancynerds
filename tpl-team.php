<?php
/* Template Name: Team
Template Post Type: post, page */

get_header();
$pid = get_the_ID();
$subtitle = get_field('subtitle',$pid);
$title = get_field('title',$pid);
$paragraph = get_field('paragraph',$pid);
$shortcode = get_field('shortcode',$pid);

if ( have_posts() ) : while ( have_posts() ) : the_post();
	get_template_part( 'template-parts/jumbotron__inner', null, [
		'title' => get_the_title(),
	] );
	?>
	<div class="main__content">
		<div class="team__info">
			<div class="container">
				<div class="team__group">
					<?php the_content(); ?>
				</div>
			</div>
		</div>
		<div class="team__list">
			<div class="container">
				<div class="row">
					<div class="heading">
						<h4 class="subtitle subtitle__dot-before subtitle__dot-after"><?= $subtitle; ?></h4>
						<h2 class="title"><?= $title; ?></h2>
						<p class="paragraph"><?= $paragraph; ?></p>
					</div>
				</div>
				<?=$shortcode;?>
			</div>
		</div>
	</div>
<!-- post -->
<?php
endwhile;
endif;
get_footer();