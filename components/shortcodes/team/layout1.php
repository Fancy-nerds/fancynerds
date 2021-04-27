<?php
if (!defined('ABSPATH'))
	exit('Direct access not allowed!');

if (is_array($user_ids) && count($user_ids) > 0) : ?>
	<div class="team__grid">
		<?php
		foreach ($user_ids as $k => $v) :
			$all_meta = get_user_meta($v);
			if (!$all_meta)
				continue; ?>
			<div class="team__card">
				<?php
				if ($all_meta['user_photo'][0]) :
					echo M4Helpers::getImgHtml(['img_id' => $all_meta['user_photo'][0], 'size' => 'team', 'class' => 'image--rounded']);
				endif; ?>
				<div class="team__card_info">
					<div class="team__name"><?= $all_meta['first_name'][0] . ' ' . $all_meta['last_name'][0]; ?></div>
					<div class="team__work"><?= $all_meta[$description][0]; ?></div>
					<div class="team__social">
						<a href="#" class="team__social_item team__social_add"></a>
					</div>
				</div>
			</div>
		<?php
		endforeach ?>
	</div>
<?php
endif; ?>