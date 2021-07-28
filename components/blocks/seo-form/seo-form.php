<?php

/**
 * Seo Form Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
extract(M4Helpers::prepBlock($block));

/* Render screenshot for preview */
if (get_field('is_example', $block['id'])) :
	echo "<img src='" . get_template_directory_uri() . "/components/blocks/" . $block['title'] . "/" . $block['title'] . ".png'/>";
	return;
endif;
?>

<div class="<?php echo esc_attr($className); ?>" <?= $style; ?> id="<?php echo esc_attr($id); ?>">
	<div class="container">
		<div class="seo-form__wrapper">
			<div class="seo-form__bg">
				<img src="<?php bloginfo('template_directory'); ?>/assets/images/seo-form-bg.png">
			</div>
			<div class="seo-form__rocket-man">
				<img src="<?php bloginfo('template_directory'); ?>/assets/images/rocket-man.svg" width="258" height="350">
			</div>
			<div class="seo-form__content">
				<h6 class="seo-form__title">Know your SEO Score!</h6>
				<form class="seo-form__form">
					<div class="seo-form__inner">
						<span class="seo-form__item">
							<input type="text" name="SITE_URL" placeholder="Your Website URL" />
						</span>
						<span class="seo-form__item">
							<input type="text" name="EMAIL" placeholder="Email" />
						</span>
						<span class="seo-form__item">
							<button type="submit" class="button button--orange button--image seo-form__submit">Start Now
								<span>
									<i class="flaticon-right-arrow-1"></i>
								</span>
							</button>
						</span>
					</div>
					<div class="form-ajx__result form-ajx__result--white_box"></div>
				</form>
			</div>
		</div>
	</div>
</div>