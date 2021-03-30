<?php
/* Template Name: Team
Template Post Type: post, page */

get_header();
$pid = get_the_ID();
$subtitle = get_field('subtitle',$pid);
$title = get_field('title',$pid);
$paragraph = get_field('paragraph',$pid);
$teams = get_field('teams',$pid);

// echo '<pre>';
// print_r($teams);
// echo '</pre>';


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

			<?php 
			if(is_array($teams) && count($teams)>0): ?>
			<div class="row">
				<?php 
				foreach ($teams as $value): ?>
					<div class="col col-33">
						<div class="team__card">
							<?php 
							$all_meta = get_user_meta( $value['user'] );
 	 						// echo '<pre>';
 	 						// print_r( $all_meta ); 
 	 						// echo '</pre>';
							if($all_meta['user_photo'][0]):
								echo M4Helpers::getImgHtml([ 'img_id'=>$all_meta['user_photo'][0], 'size'=>'medium']);
							endif;?>
							<!-- <img src="<?php bloginfo('template_directory');?>/assets/images/091224867853_huge.png" alt=""> -->

							<div class="team__card_info">
								<div class="team__name">
									<?= $all_meta['first_name'][0] . ' ' . $all_meta['last_name'][0]; ?>
								</div>
								<div class="team__work"><?= $all_meta['description'][0]; ?></div>
								<div class="team__social">
									<a href="#" class="team__social_item team__social_add"></a>
								</div>
							</div>
						</div>
					</div>
				<?php 
				endforeach ?>
			</div>
			<?php 
			endif; ?>
		</div>
	</div>


</div>



<!-- post -->
<?php
endwhile;
endif;
get_footer();