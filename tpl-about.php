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

<div class="why-choose">
	<div class="principles">
		<div class="container">
			<div class="row">
				<div class="col col-33">
					<div class="principles__item">
						<div class="principles__count">
							01
						</div>
						<div class="principles__content">
							<div class="principles__title">Radical Integrity</div>
							<div class="paragraph">Our people truly care for our work and for each other.</div>
						</div>
					</div>
				</div>
				<div class="col col-33">
					<div class="principles__item">
						<div class="principles__count">
							02
						</div>
						<div class="principles__content">
							<div class="principles__title">People First</div>
							<div class="paragraph">We believe that a culture  will build a thriving company.</div>
						</div>
					</div>
				</div>
				<div class="col col-33">
					<div class="principles__item">
						<div class="principles__count">
							03
						</div>
						<div class="principles__content">
							<div class="principles__title">Process Perfection</div>
							<div class="paragraph">We’re driven to becoming the best version of ourselves.</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col col-50">
				<h4 class="subtitle subtitle__dot-before">Why choose us</h4>
				<h2 class="title">Work with a Dedicated SEO Company</h2>
				<p class="paragraph">
					From keyword research to technical auditing to site migration, our team of technical SEOs are true experts in their field.
				</p>
				<div class="progress-bars">
					<div class="bar" data-percent="70%">
						<div class="bar__status">
							<div class="bar__title">Keyword Research</div>
							<div class="bar__value">70%</div>
						</div>
						<div class="bar__scale">
							<div class="bar__progress"></div>
						</div>
					</div>

					<div class="bar" data-percent="80%">
						<div class="bar__status">
							<div class="bar__title">Technical SEO Audit</div>
							<div class="bar__value">80%</div>
						</div>
						<div class="bar__scale">
							<div class="bar__progress"></div>
						</div>
					</div>

					<div class="bar" data-percent="60%">
						<div class="bar__status">
							<div class="bar__title">Content Optimization</div>
							<div class="bar__value">60%</div>
						</div>
						<div class="bar__scale">
							<div class="bar__progress"></div>
						</div>
					</div>
				</div>
			</div>
			<div class="col col-50">
				<img src="<?php bloginfo('template_directory');?>/assets/images/about_image.png">
			</div>
		</div>
	</div>
</div>




<div class="team-slider">
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