<?php

/**
 * Blog Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
extract(M4Helpers::prepBlock($block));
?>

<section id="<?php echo esc_attr($id); ?>" <?= $style; ?> class="section <?php echo esc_attr($className); ?>">
	<div class="blog__circles">
		<img src="<?php bloginfo('template_directory');?>/assets/images/blog-cicles.png" width="1742" height="601">
	</div>
	<div class="blog__container">
		<div class="blog__header">
			<div class="heading">
				<h4 class="subtitle subtitle__dot-before subtitle__dot-after">Our blog</h4>
				<h2 class="title">Our Latest Media</h2>
				<p class="paragraph">
					Our campaigns get your business in front of the right people at the
					right time to increase organic traffic and boost engagement.
				</p>
			</div>
		</div>
		<div class="blog__list">
			<div class="blog__col">
				<div class="card">
					<div class="article-label">Marketing</div>
					<div class="card__image">
						<img src="<?php bloginfo('template_directory');?>/assets/images/1837.png" width="370" height="280">
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
			<div class="blog__col">
				<div class="card">
					<div class="article-label">Marketing</div>
					<div class="card__image">
						<img src="<?php bloginfo('template_directory');?>/assets/images/14717.png" width="370" height="280">
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
			<div class="blog__col">
				<div class="card">
					<div class="article-label">Marketing</div>
					<div class="card__image">
						<img src="<?php bloginfo('template_directory');?>/assets/images/2447945.png" width="370" height="280">
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