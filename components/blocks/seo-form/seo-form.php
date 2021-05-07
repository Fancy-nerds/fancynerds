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

<div class="seo-form">
    <div class="seo-form__line"></div>
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
                    <span class="seo-form__item">
                        <input type="text" placeholder="Your Website URL" />
                    </span>
                    <span class="seo-form__item">
                        <input type="text" placeholder="Email">
                    </span>

                    <button type="submit" href="#" class="button button--orange button--image seo-form__submit">Start Now
                        <span>
                            <i class="flaticon-right-arrow-1"></i>
                        </span>
                    </a>
                </form>
            </div>
        </div>
    </div>
</div>