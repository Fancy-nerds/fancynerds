<?
/**
 * args: post_id, posts_per_page
 */
$tags = wp_get_post_tags($args['post_id'] ?? get_the_ID(), [
    'fields' => 'ids'
]);
if ($tags) {
    $args = array(
        'tag__in' => $tags,
        'post__not_in' => [$args['post_id']],
        'posts_per_page' => $args['posts_per_page'] ? $args['posts_per_page'] : 2,
        'caller_get_posts' => 1
    );
    $my_query = new WP_Query($args);
    if ($my_query->have_posts()) {
?>
        <div class="related-posts">
            <h2 class="title"><?= __('Related Posts', 'fancynerds') ?></h2>
            <div class="related-posts__grid">
                <? while ($my_query->have_posts()) {
                    $my_query->the_post(); ?>
                    <?= get_template_part('template-parts/post', 'card', [
                        'post_id' => $post->ID
                    ]); ?>
                <? } ?>
            </div>
        </div>
    <?

    }
    wp_reset_query();
}
    ?>