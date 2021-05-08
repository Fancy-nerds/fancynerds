<?php

/**
 * FAQ list Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

extract(M4Helpers::prepBlock($block));
?>
<div class="<?= $className; ?>" id="<?php echo esc_attr($id); ?>" <?= $style; ?>>
    <div class="container">
        <div class="faq-list__header">
            <div class="heading heading--left">
                <h4 class="subtitle subtitle__dot-before">FAQ</h4>
                <h2 class="title">Read Most <br> Frequent Questions </h2>
            </div>
        </div>
        <div class="faq-list__grid">
            <div class="faq-list__col">
                <a href="#" class="faq-list__item">
                    <div class="faq-list__title">Best Practices for Keyword Density</div>
                    <div class="faq-list__text">
                        Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability.
                    </div>
                    <div class="faq-list__arrow">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/faq_arrow.png">
                    </div>
                </a>
            </div>
            <div class="faq-list__col">
                <a href="#" class="faq-list__item">
                    <div class="faq-list__title">Social Media’s Role in SEO</div>
                    <div class="faq-list__text">
                        Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability.
                    </div>
                    <div class="faq-list__arrow">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/faq_arrow.png">
                    </div>
                </a>
            </div>
            <div class="faq-list__col">
                <a href="#" class="faq-list__item">
                    <div class="faq-list__title">Best SEO Practices for Page Layouts</div>
                    <div class="faq-list__text">
                        Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability. Google has said for years that the most important single factor to
                    </div>
                    <div class="faq-list__arrow">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/faq_arrow.png">
                    </div>
                </a>
            </div>
            <div class="faq-list__col">
                <a href="#" class="faq-list__item">
                    <div class="faq-list__title">How Does Off Site SEO Work?</div>
                    <div class="faq-list__text">
                        Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability. Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability. Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability. Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability.
                    </div>
                    <div class="faq-list__arrow">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/faq_arrow.png">
                    </div>
                </a>
            </div>
            <div class="faq-list__col">
                <a href="#" class="faq-list__item">
                    <div class="faq-list__title">What is off page SEO link building?</div>
                    <div class="faq-list__text">
                        Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability.
                    </div>
                    <div class="faq-list__arrow">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/faq_arrow.png">
                    </div>
                </a>
            </div>
            <div class="faq-list__col">
                <a href="#" class="faq-list__item">
                    <div class="faq-list__title">Why is SEO Link Building Important?</div>
                    <div class="faq-list__text">
                        Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability. Google has said for years
                    </div>
                    <div class="faq-list__arrow">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/faq_arrow.png">
                    </div>
                </a>
            </div>
            <div class="faq-list__col">
                <a href="#" class="faq-list__item">
                    <div class="faq-list__title">Best SEO Practices for High Quality Content</div>
                    <div class="faq-list__text">
                        Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability. Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability. Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability.
                    </div>
                    <div class="faq-list__arrow">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/faq_arrow.png">
                    </div>
                </a>
            </div>
            <div class="faq-list__col">
                <a href="#" class="faq-list__item">
                    <div class="faq-list__title">Why is Researching Keywords Important?</div>
                    <div class="faq-list__text">
                        Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability. Google has said for years that the most important single factor to them is high quality content.
                        Now more than ever, they have the ability.
                    </div>
                    <div class="faq-list__arrow">
                        <img src="<?php bloginfo('template_directory'); ?>/assets/images/faq_arrow.png">
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>