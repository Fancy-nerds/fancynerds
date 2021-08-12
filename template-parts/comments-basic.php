<? if (comments_open() || get_comments_number()) { ?>
    <div class="comments-block">
        <h2 class="title">
            <?= __("Comments") ?>
            <span class="comments__count">(<?= get_comments_number() ?>)</span>
        </h2>
        <div class="comments__inner">
            <?= comments_template(); ?>
        </div>
    </div>
<? } ?>