<?
$tags = wp_get_post_tags($args['post_id']);
?>
<div class="tag-list">
    <?
    foreach ($tags as $tag) { ?>
        <a href="<?= get_term_link($tag->term_id) ?>" class="tag-item"><?= $tag->name ?></a>
    <? } ?>
</div>