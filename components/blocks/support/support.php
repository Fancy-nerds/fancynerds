<?php

/**
 * Support Form Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */
extract(M4Helpers::prepBlock($block));
?>
<section <?= $style; ?> id="<?php echo esc_attr($id); ?>" class="section <?php echo esc_attr($className); ?>">
    <div class="support__bg">
        <img src="<?php bloginfo('template_directory'); ?>/assets/images/support-bg.png">
    </div>
    <div class="container">
        <div class="heading">
            <h4 class="subtitle subtitle__dot-before subtitle__dot-after">More help</h4>
            <h2 class="title">Our Support Team <br> will Always Assist You 24/7</h2>
        </div>
        <div class="support__grid">
            <div class="support__col">
                <div class="support__card">
                    <div class="support__overlay"></div>
                    <div class="support__image">
                        <span class="flaticon-startup"></span>
                    </div>
                    <div class="support__title">For Customers</div>
                    <p class="paragraph">We have seen great successes with everyone companies.</p>
                    <a href="#" class="button button--orange button--image">
                        Learn More
                        <span>
                            <i class="flaticon-right-arrow-1"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="support__col">
                <div class="support__card">
                    <div class="support__overlay"></div>
                    <div class="support__image">
                        <span class="flaticon-system"></span>
                    </div>
                    <div class="support__title">For Partners</div>
                    <p class="paragraph">Every business and industry requires an approach.</p>
                    <a href="#" class="button button--orange button--image">
                        Learn More
                        <span>
                            <i class="flaticon-right-arrow-1"></i>
                        </span>
                    </a>
                </div>
            </div>

            <div class="support__col">
                <div class="support__card">
                    <div class="support__overlay"></div>
                    <div class="support__image">
                        <span class="flaticon-internet"></span>
                    </div>
                    <div class="support__title">For Business</div>
                    <p class="paragraph">You make sure you know how campaign is performing.</p>
                    <a href="#" class="button button--orange button--image">
                        Learn More
                        <span>
                            <i class="flaticon-right-arrow-1"></i>
                        </span>
                    </a>
                </div>
            </div>
            <div class="support__col">
                <div class="support__card">
                    <div class="support__overlay"></div>
                    <div class="support__image">
                        <span class="flaticon-report"></span>
                    </div>
                    <div class="support__title">For Startups</div>
                    <p class="paragraph">To generate highly focused leads ready to purchases.</p>
                    <a href="#" class="button button--orange button--image">
                        Learn More
                        <span>
                            <i class="flaticon-right-arrow-1"></i>
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>