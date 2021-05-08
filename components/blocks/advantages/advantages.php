<?php

/**
 * Advantages Block Template.
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
        <div class="advantages__grid">
            <div class="advantages__col">
                <div class="advantages__image">
                    <img src="<?= get_template_directory_uri() . '/assets/images/advantages-img.svg' ?>">
                </div>
            </div>
            <div class="advantages__col">
                <div class="advantages__content">
                    <div class="heading heading--left">
                        <div class="subtitle subtitle__dot-before">Content Marketing</div>
                        <h2 class="title">If You Can Dream It, We Can Rank It</h2>
                    </div>

                    <p class="paragraph">
                        Our approach to SEO is uniquely built around what we know works…and what we know doesn’t work.
                        With over 200 verified factors in play within Google’s search algorithm, most agencies will
                        rely on old tactics that no longer work, or guess with new tactics that they hope will stick.
                    </p>
                    <div class="advantages__counters">
                        <div class="advantages__counters_item">
                            <div class="advantages__counters_count">330+</div>
                            <div class="advantages__counters_text">Active Clients</div>
                        </div>
                        <div class="advantages__counters_item">
                            <div class="advantages__counters_count">850+</div>
                            <div class="advantages__counters_text">Projects Done</div>
                        </div>
                        <div class="advantages__counters_item">
                            <div class="advantages__counters_count">25+</div>
                            <div class="advantages__counters_text">Team Advisors</div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>