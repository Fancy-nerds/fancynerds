<?

/**
 * args: post_id
 */
$card_post = get_post($args['post_id']);
$author_id = $card_post->post_author;
$user_display_name = get_the_author_meta('display_name', $author_id);
$categories_top = wp_get_post_categories($args['post_id'], [
    'fields' => 'all',
]);

?>

<div class="card">
    <div class="category-cloud-list card__category-list">
        <? foreach ($categories_top as $cat) { ?>
            <a href="<?= get_term_link($cat->term_id) ?>" class="category-cloud-label card__category-label"><?= $cat->name ?></a>
        <? } ?>
    </div>
    <a href="<?= get_permalink($args['post_id']) ?>" class="card__image">
        <?= get_the_post_thumbnail($card_post, [1024, 0]) ?>
        </a>
    <div class="card__content">
        <div class="article-state">
            <a href="<?= get_author_posts_url($author_id) ?>" class="article-state__item article-state__author">
                <i class="flaticon-user"></i>
                <?= __("By") ?> <?= $user_display_name ?>
            </a>
            <div class="article-state__item article-state__date">
                <i class="flaticon-clock"></i>
                <?= get_the_date('', $card_post) ?>
            </div>
        </div>
        <a href="<?= get_permalink($args['post_id']) ?>" class="card__title"><?= get_the_title($card_post) ?></a>
        <div class="card__excerpt paragraph"><?= excerpt(20, $card_post) ?></div>
    </div>
</div>