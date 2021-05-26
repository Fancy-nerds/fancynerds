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
    <?= $blockInnerStart ?>
    <div class="container">
        <form class="form support-form__form">
            <div class="heading">
                <h4 class="subtitle subtitle__dot-before subtitle__dot-after">Submit a ticket</h4>
                <h2 class="title">Not Found Your Answer? Just Ask Us!</h2>
            </div>
            <div class="form__group">
                <div class="support-form__split">
                    <input placeholder="Your Name *" type="text" class="form__control" />
                    <input placeholder="Your Email *" type="text" class="form__control" />
                </div>
            </div>
            <div class="form__group">
                <input placeholder="Website" type="text" class="form__control" />
            </div>
            <div class="form__group">
                <textarea placeholder="Message..." type="text" class="form__control"></textarea>
            </div>
            <div class="form__buttons">
                <button type="submit" class="button button--orange button--image">
                    Send Message
                    <span>
                        <i class="flaticon-right-arrow-1"></i>
                    </span>
                </button>
            </div>
        </form>
    </div>
</section>