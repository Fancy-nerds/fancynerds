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
	?>


<div class="counters">
	<div class="container">
		<div class="counters__bg"></div>
		<div class="row">
			<div class="col col-25">
				<div class="counters__item">
					<div class="subtitle subtitle__dot-before">Active clients</div>
					<div class="counters__count">
						<span data-counter="330">0</span>+
					</div>
				</div>
			</div>
			<div class="col col-25">
				<div class="counters__item">
					<div class="subtitle subtitle__dot-before">Projects Done</div>
					<div class="counters__count">
						<span data-counter="850">0</span>+
					</div>
				</div>
			</div>
			<div class="col col-25">
				<div class="counters__item">
					<div class="subtitle subtitle__dot-before">team advisors</div>
					<div class="counters__count">
						<span data-counter="25">0</span>+
					</div>
				</div>
			</div>
			<div class="col col-25">
				<div class="counters__item">
					<div class="subtitle subtitle__dot-before">Glorious Years</div>
					<div class="counters__count">
						<span data-counter="10">0</span>+
					</div>
				</div>
			</div>
		</div>
	</div>
</div>



<div class="team-slider">
	
	<div class="container">
		<div class="row">
			<div class="col col-50">
				<h4 class="subtitle subtitle__dot-before">Professional team</h4>
				<h2 class="title">Meet Our Leadership Team</h2>
				<p class="paragraph">
					If we had a 'secret sauce' it would be our awesome people. <br> We have only professional team!
				</p>
			</div>
			<div class="col col-50 col-right">
				<a href="#" class="button button--orange button--image">All Team</a>
			</div>
		</div>

		<div class="team__slider slider row">
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/091224867853_huge.png" alt="">
					<div class="team__card_info">
						<div class="team__name">Gina Bruno</div>
						<div class="team__work">WEB Designer</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/09220761288_xl-2015.png" alt="">
					<div class="team__card_info">
						<div class="team__name">David Ferry</div>
						<div class="team__work">CTO of Company</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/09233064538_xl-2015.png" alt="">
					<div class="team__card_info">
						<div class="team__name">Christina Tores</div>
						<div class="team__work">CEO of Company</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/09284358002_xl-2015.png" alt="">
					<div class="team__card_info">
						<div class="team__name">Regina Blackly </div>
						<div class="team__work">WEB Developer</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/091396486544_huge.png" alt="">
					<div class="team__card_info">
						<div class="team__name">Olivia Chee</div>
						<div class="team__work">General Manager</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-33">
				<div class="team__card">
					<img class="image--rounded" src="<?php bloginfo('template_directory');?>/assets/images/091414526951_huge.png" alt="">
					<div class="team__card_info">
						<div class="team__name">Robert Cooper</div>
						<div class="team__work">WEB Developer</div>
						<div class="team__social">
							<a href="#" class="team__social_item team__social_add"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>





<div class="partners">
	<div class="container">
		<div class="row">
			<div class="col col-16">
				<div class="partners__item">
					<img src="<?php bloginfo('template_directory');?>/assets/images/c-logo2-2.png" alt="SEO Mind">
				</div>
			</div>
			<div class="col col-16">
				<div class="partners__item">
					<img src="<?php bloginfo('template_directory');?>/assets/images/c-logo2-1.png" alt="IBM Media">
				</div>
			</div>
			<div class="col col-16">
				<div class="partners__item">
					<img src="<?php bloginfo('template_directory');?>/assets/images/c-logo2-6.png" alt="Greenhost">
				</div>
			</div>
			<div class="col col-16">
				<div class="partners__item">
					<img src="<?php bloginfo('template_directory');?>/assets/images/c-logo2-5.png" alt="Yodgy">
				</div>
			</div>
			<div class="col col-16">
				<div class="partners__item">
					<img src="<?php bloginfo('template_directory');?>/assets/images/c-logo2-4.png" alt="Atomic SEO">
				</div>
			</div>
			<div class="col col-16">
				<div class="partners__item">
					<img src="<?php bloginfo('template_directory');?>/assets/images/c-logo2-3.png" alt="Boosterio">
				</div>
			</div>
		</div>
	</div>
</div>


<!-- post -->
<?php
endwhile;
endif;
get_footer();