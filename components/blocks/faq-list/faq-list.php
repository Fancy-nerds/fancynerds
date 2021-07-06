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

$label = get_field('label');
$title = get_field('title');
$list = get_field('list');

?>
<div class="<?= $className; ?>" id="<?php echo esc_attr($id); ?>" <?= $style; ?>>
    <div class="container">
        <? if ($label || $title) { ?>
            <div class="faq-list__header">
                <div class="heading heading--left">
                    <? if ($label) { ?>
                        <h4 class="subtitle subtitle__dot-before"><?= $label ?></h4>
                    <? } ?>
                    <? if ($title) { ?>
                        <h2 class="title"><?= $title ?></h2>
                    <? } ?>
                </div>
            </div>
        <? } ?>
        <?
        if ($list) { ?>
            <div class="faq-list__grid">
                <?
                foreach ($list as $faq) {
                    $title = $faq['title'];
                    $text = $faq['text'];
                ?>
                    <div class="faq-list__col">
                        <div class="faq-list__item">
                            <div class="faq-list__title"><?= $title ?>
                                <div class="faq-list__arrow">
                                    <img src="<?php bloginfo('template_directory'); ?>/assets/images/faq_arrow.png">
                                </div>
                            </div>
                            <div class="faq-list__text">
                                <?= $text ?>
                            </div>
                        </div>
                    </div>
                <? } ?>
            </div>
        <? }
        ?>
    </div>
</div>