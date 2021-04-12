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

	<div class="section plans">
		<div class="container">
			<div class="row">
				<div class="heading">
					<h4 class="subtitle subtitle__dot-before subtitle__dot-after">Choose your plan</h4>
					<h2 class="title">Flexible Pricing Plans</h2>
					<p class="paragraph">We have experience working with large and small businesses and are ready to develop a targeted strategy and plan that’s just right for you.</p>
				</div>
			</div>
			<div class="row">
				<div class="col col-33">
					<div class="plans__item plans__item--standard">
						<div class="plans__label">Standard</div>
						<div class="plans__image">
							<img src="<?= get_template_directory_uri(); ?>/assets/images/pricing1.png">
						</div>
						<div class="plans__price"><sup>$</sup> 69.99</div>
						<div class="plans__package">Monthly Package</div>
						<div class="plans__points">
							<p class="plans__point">Social Media Marketing</p>
							<p class="plans__point">2.100 Keywords</p>
							<p class="plans__point">One Way Link Building</p>
							<p class="plans__point">5 Free Optimization</p>
							<p class="plans__point">3 Press Releases</p>
						</div>
						<div class="plans__action">
							<a href="#" class="button button--blue button--image">Choose Plane
								<span>
									<i class="flaticon-right-arrow-1"></i>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="col col-33">
					<div class="plans__item plans__item--filled plans__item--economy">
						<div class="plans__label">Economy</div>
						<div class="plans__image">
							<img src="<?= get_template_directory_uri(); ?>/assets/images/pricing2.png">
						</div>
						<div class="plans__price"><sup>$</sup> 79.99</div>
						<div class="plans__package">Monthly Package</div>
						<div class="plans__points">
							<p class="plans__point">Social Media Marketing</p>
							<p class="plans__point">3.100 Keywords</p>
							<p class="plans__point">One Way Link Building</p>
							<p class="plans__point">10 Free Optimization</p>
							<p class="plans__point">5 Press Releases</p>
						</div>
						
						<div class="plans__action">
							<a href="#" class="button button--orange-revert button--image">Choose Plane
								<span>
									<i class="flaticon-right-arrow-1"></i>
								</span>
							</a>
						</div>
					</div>
				</div>
				<div class="col col-33">
					<div class="plans__item plans__item--executive">
						<div class="plans__label">Executive</div>
						<div class="plans__image">
							<img src="<?= get_template_directory_uri(); ?>/assets/images/pricing3.png">
						</div>
						<div class="plans__price"><sup>$</sup> 89.99</div>
						<div class="plans__package">Monthly Package</div>
						<div class="plans__points">
							<p class="plans__point">Social Media Marketing</p>
							<p class="plans__point">5.100 Keywords</p>
							<p class="plans__point">One Way Link Building</p>
							<p class="plans__point">15 Free Optimization</p>
							<p class="plans__point">10 Press Releases</p>
						</div>
						
						<div class="plans__action">
							<a href="#" class="button button--blue-dark button--image">Choose Plane
								<span>
									<i class="flaticon-right-arrow-1"></i>
								</span>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<section class="section partners">
		<div class="container">
			<div class="row">
				<div class="col col-16">
					<div class="partners__item">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/c-logo2-2.png" alt="SEO Mind">
					</div>
				</div>
				<div class="col col-16">
					<div class="partners__item">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/c-logo2-1.png" alt="IBM Media">
					</div>
				</div>
				<div class="col col-16">
					<div class="partners__item">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/c-logo2-6.png" alt="Greenhost">
					</div>
				</div>
				<div class="col col-16">
					<div class="partners__item">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/c-logo2-5.png" alt="Yodgy">
					</div>
				</div>
				<div class="col col-16">
					<div class="partners__item">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/c-logo2-4.png" alt="Atomic SEO">
					</div>
				</div>
				<div class="col col-16">
					<div class="partners__item">
						<img src="<?= get_template_directory_uri(); ?>/assets/images/c-logo2-3.png" alt="Boosterio">
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- testimonials slider -->

</div>


<?php
endwhile;
endif;
get_footer();