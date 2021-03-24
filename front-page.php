<?php get_header();




	if ( have_posts() ) : while ( have_posts() ) : the_post(); 
		the_content();
	endwhile; 
	endif; ?>


			<section class="section blog">
				<div class="container">
					<div class="row">
						<div class="heading">
							<h4 class="subtitle subtitle__dot-before subtitle__dot-after">Our blog</h4>
							<h2 class="title">Our Latest Media</h2>
							<p class="paragraph">
								Our campaigns get your business in front of the right people at the
								right time to increase organic traffic and boost engagement.
							</p>
						</div>
					</div>
					<div class="row">
						<div class="col col-33">
							<div class="card">
								<div class="article-label">Marketing</div>
								<div class="card__image">
									<img src="<?php bloginfo('template_directory');?>/assets/images/1837.png">
								</div>
								<div class="card__content">
									<div class="article-state">
										<div class="article-state__item article-state__author">
											<i class="flaticon-user"></i>
											By Pablo Villalpando
										</div>
										<div class="article-state__item article-state__date">
											<i class="flaticon-clock"></i>
											October 10, 2019
										</div>
									</div>
									<div class="card__title">15 SEO Best Practices: Website Architecture</div>
									<div class="card__excerpt paragraph">Our campaigns get your business in front of the right people at the right time...</div>
								</div>
							</div>
						</div>
						<div class="col col-33">
							<div class="card">
								<div class="article-label">Marketing</div>
								<div class="card__image">
									<img src="<?php bloginfo('template_directory');?>/assets/images/14717.png">
								</div>
								<div class="card__content">
									<div class="article-state">
										<div class="article-state__item article-state__author">
											<i class="flaticon-user"></i>
											By Pablo Villalpando
										</div>
										<div class="article-state__item article-state__date">
											<i class="flaticon-clock"></i>
											October 10, 2019
										</div>
									</div>
									<div class="card__title">What Makes a Quality Backlink?</div>
									<div class="card__excerpt paragraph">Our campaigns get your business in front of the right people at the right time...</div>
								</div>
							</div>
						</div>
						<div class="col col-33">
							<div class="card">
								<div class="article-label">Marketing</div>
								<div class="card__image">
									<img src="<?php bloginfo('template_directory');?>/assets/images/2447945.png">
								</div>
								<div class="card__content">
									<div class="article-state">
										<div class="article-state__item article-state__author">
											<i class="flaticon-user"></i>
											By Pablo Villalpando
										</div>
										<div class="article-state__item article-state__date">
											<i class="flaticon-clock"></i>
											October 10, 2019
										</div>
									</div>
									<div class="card__title">A Guide to Google’s SEO Algorithm Updates</div>
									<div class="card__excerpt paragraph">Our campaigns get your business in front of the right people at the right time...</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="section action">
				<div class="container">
					<div class="action__content" style="
			position: absolute;
			left: 50%;
			transform: translateX(-50%);
			top: 87px;
		">
						<div class="action__title">Take Your Website to Next Level Right Now!</div>
						<a href="#" class="button button--orange button--image">Start Now</a>
					</div>
				</div>
			</section>


<?php get_footer();