<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package fancynerds
 */

get_header();
$author_id = $post->post_author;
$user_meta =
	$user_display_name = get_the_author_meta('display_name', $author_id);
$user_desc = get_the_author_meta('user_description', $author_id);
$user_tw = get_the_author_meta('user_twitter_link', $author_id);
$user_fb = get_the_author_meta('user_facebook_link', $author_id);
$user_lkdn = get_the_author_meta('user_linkedin_link', $author_id);
$user_in = get_the_author_meta('user_instagram_link', $author_id);
$categories_top = wp_get_post_categories($post->ID, [
	'fields' => 'all',
	'parent' => 0
]);

?>
<main class="main">
	<?
	while (have_posts()) :
		the_post();
	?>
		<article class="article">
			<div class="article__hero">
				<?= get_the_post_thumbnail(null, [1920, 0], [
					'class' => 'article__thumbnail'
				]) ?>
				<div class="container">
					<div class="article__heading">
						<? if (count($categories_top)) { ?>
							<div class="article__categories">
								<div class="category-list">
									<? foreach ($categories_top as $cat) { ?>
										<div class="category-label"><?= $cat->name ?></div>
									<? } ?>

								</div>
							</div>
						<? } ?>
						<h1 class="title"><?= the_title() ?></h1>
						<div class="article-state">
							<div class="article-state__item article-state__author">
								<i class="flaticon-user"></i>
								<?= esc_html__('By', 'fancynerds') ?> <?= $user_display_name ?>
							</div>
							<div class="article-state__item article-state__date">
								<i class="flaticon-clock"></i>
								<?= get_the_date() ?>
							</div>
							<div class="article-state__item article-state__comments">
								<i class="flaticon-chat"></i>
								0 <?= esc_html__('Comments', 'fancynerds') ?>
							</div>
						</div>
					</div>
				</div>
			</div>


			<div class="container">
				<div class="article__content">
					<div class="article__main">
						<?= the_content() ?>

						<div class="article__footer">
							<div class="article__actions">
								<div class="article__tags">

								</div>
								<div class="article__socials">

								</div>
							</div>

							<div class="author">
								<div class="author__image">
									<img src="<?= get_avatar_url($author_id, [
													'size' => 250
												]); ?>">
								</div>
								<div class="author__content">
									<div class="author__work"><?= esc_html__('Author', 'fancynerds') ?></div>
									<div class="author__name"><?= $user_display_name ?></div>
									<div class="author__text"><?= $user_desc ?></div>
									<div class="author__social">
										<? if ($user_tw) { ?>
											<a href="<?= $user_tw ?>" class="author__social--icon author__social--tw">
												<svg xmlns="http://www.w3.org/2000/svg" width="13" height="11">
													<path fill="#a5b7d2" d="M12.883 1.698a5.475 5.475 0 01-1.518.393A2.537 2.537 0 0012.527.704a5.446 5.446 0 01-1.679.609 2.709 2.709 0 00-1.93-.79c-1.459 0-2.642 1.12-2.642 2.504 0 .197.023.388.068.57C4.148 3.496 2.2 2.498.896.98a2.4 2.4 0 00-.358 1.26c0 .87.467 1.636 1.176 2.087a2.762 2.762 0 01-1.197-.315v.032c0 1.213.91 2.227 2.12 2.456a2.815 2.815 0 01-1.194.044c.337.995 1.313 1.719 2.47 1.739A5.479 5.479 0 01.63 9.356c-.213 0-.424-.012-.63-.036a7.776 7.776 0 004.051 1.128c4.862 0 7.52-3.82 7.52-7.13 0-.11-.002-.216-.007-.324a5.236 5.236 0 001.319-1.296z" />
												</svg>
											</a>
										<? } ?>
										<? if ($user_fb) { ?>
											<a href="<?= $user_fb ?>" class="author__social--icon author__social--fb">
												<svg xmlns="http://www.w3.org/2000/svg" width="7" height="13">
													<path fill="#a5b7d2" d="M2.338 12.972V7.65H.672V5.255h1.704v-1.98S2.453.778 4.642.76h2.433v2.35H5.566s-.638 0-.638.702v1.486h2.185L6.85 7.69H4.966v5.281z" />
												</svg>
											</a>
										<? } ?>
										<? if ($user_lkdn) { ?>
											<a href="<?= $user_lkdn ?>" class="author__social--icon author__social--in">
												<svg xmlns="http://www.w3.org/2000/svg" width="14" height="13">
													<path fill="#a5b7d2" d="M11.178 12.205v-4.63s-.148-1.24-1.411-1.24c-1.263 0-1.495 1.179-1.495 1.179v4.691H5.668l.042-7.65h2.52l-.021.964s.526-1.26 2.505-1.26c1.98 0 2.873 1.08 3.042 3.096v4.85zM2.474 3.47c-.896 0-1.622-.607-1.622-1.357S1.578.754 2.474.754c.895 0 1.621.608 1.621 1.358 0 .75-.726 1.357-1.621 1.357zm1.608 8.744H.879V4.575l3.203-.02z" />
												</svg>
											</a>
										<? } ?>
										<? if ($user_in) { ?>
											<a href="<?= $user_in ?>" class="author__social--icon author__social--insta">
												<svg xmlns="http://www.w3.org/2000/svg" width="14" height="13">
													<path fill="#a5b7d2" d="M4.878.018h2.984c.481 0 1.088-.06 1.52.025h.65l1.004.128c.924.246 1.684.68 2.17 1.336.752 1.015.76 2.588.76 4.342v1.85c0 .297.03.671-.027.924v.616c-.08.349-.054.73-.163 1.054-.313.933-.828 1.64-1.628 2.107-1.024.597-2.68.563-4.34.564H5.855c-.314 0-.71.03-.977-.025h-.651c-.368-.075-.77-.051-1.112-.154-1.136-.342-2-.961-2.442-1.953-.212-.476-.22-1.01-.352-1.593v-.616C.264 8.37.294 7.996.294 7.698v-1.8c0-1.18-.074-2.472.244-3.389C.962 1.286 1.876.527 3.223.171L4.227.043c.196-.04.503.062.65-.025zM4.797 1.2c-.146.083-.988.044-1.221.102-.866.217-1.475.654-1.79 1.388-.307.713-.245 1.8-.245 2.773 0 2.23-.342 4.901 1.058 5.831 1.062.706 3.362.488 5.127.488 1.34 0 2.926.11 3.771-.385.367-.215.745-.585.922-.975.487-1.067.299-3.392.299-4.907 0-1.371.012-2.64-.597-3.416-.395-.504-1.023-.687-1.79-.848l-.868-.026C9.015 1.134 8.388 1.2 7.889 1.2H4.797zm5.832 1.051c1.194-.03 1.267 1.34.299 1.568-.574.137-1.155-.501-.95-1.027.135-.346.362-.353.651-.54zm-3.635.9c1.725-.015 2.818.862 3.337 2.005.32.706.428 1.781.081 2.57-.424.955-1.218 1.644-2.306 1.976-.26.079-.56.073-.84.129-.473.094-1.26-.19-1.547-.309-1.396-.572-2.716-2.35-1.872-4.263.378-.857 1.076-1.518 1.98-1.877.257-.1.561-.144.841-.205.113-.025.249.02.326-.025zm-.027 1.182c-.158.092-.527.082-.705.155a2.341 2.341 0 00-1.303 1.31c-.47 1.226.394 2.23 1.194 2.62.244.119.716.32 1.14.232.977-.205 1.6-.557 1.953-1.336.71-1.571-.682-2.992-2.28-2.98z" />
												</svg>
											</a>
										<? } ?>
									</div>
								</div>
							</div>
						</div>
						<div class="article__fb-nav">
							<div class="fb-nav-container">
								<?
								the_post_navigation(
									array(
										'prev_text' => '<span class="fb-nav__btn fb-nav__btn--prev"><span class="fb-nav__arr fb-nav__arr--prev"><i class="flaticon-left-arrow"></i></span>' . esc_html__('Previous', 'fancynerds'),
										'next_text' => '<span class="fb-nav__btn fb-nav__btn--next">' . esc_html__('Next', 'fancynerds') . '<span class="fb-nav__arr fb-nav__arr--next"><i class="flaticon-right-arrow-1"></i></span>',
									)
								);
								?>
							</div>

						</div>

						<div class="related-posts">
							<h2 class="title">Related Posts</h2>
							<div class="row">
								<div class="col col-50">
									<div class="card">
										<div class="category-label">Marketing</div>
										<div class="card__image">
											<img src="assets/images/31147.png">
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
								<div class="col col-50">
									<div class="card">
										<div class="category-label">Marketing</div>
										<div class="card__image">
											<img src="assets/images/31147.png">
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
							</div>
						</div>
					</div>

					<div class="article__sidebar">
						<div class="ceo">
							<div class="ceo__image">
								<img src="../../assets/images/author-image.png">
							</div>
							<div class="ceo__name">Kate Olson</div>
							<div class="ceo__description">She is the CEO. She's a big fan her cat Tux, & dinner parties.</div>
							<div class="ceo__social"></div>
						</div>
					</div>
				</div>

			</div>
		</article>
	<?
	endwhile; // End of the loop.
	?>
</main>
<!--<main id="primary" class="site-main">

		

	</main>-->
<!-- #main -->

<?php
get_sidebar();
get_footer();
