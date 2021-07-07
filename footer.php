<?php

/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fancynerds
 */
?>

</main>

<footer class="footer">
	<div class="container">
		<div class="row">
			<div class="col col-50">
				<div class="footer__column">
					<h6 class="footer__title">
						<?= pll_e('Imprint'); ?>
					</h6>
					<?php
					if (is_active_sidebar('footer_widget_1')) :
						dynamic_sidebar('footer_widget_1');
					endif; ?>
				</div>
			</div>
			<div class="col col-25">
				<div class="footer__column">
					<h6 class="footer__title">
						<?= pll_e('Services'); ?>
					</h6>
					<?php wp_nav_menu(array(
						'theme_location'  => 'menu-footer-1',
						'menu_class'      => 'footer__menu',
						'container'       => '',
					)); ?>
				</div>
			</div>
			<div class="col col-25">
				<div class="footer__column">
					<h6 class="footer__title">
						<?= pll_e('Information'); ?>
					</h6>
					<?php wp_nav_menu(array(
						'theme_location'  => 'menu-footer-2',
						'menu_class'      => 'footer__menu',
						'container'       => '',
					)); ?>
				</div>
			</div>
		</div>
	</div>
</footer>

</div><!-- #page -->


<div id="contactUsModal" class="modal contact-modal">
	<!-- Modal content -->
	<div class="modal-content">
		<div class="modal-header clearfix">
			<p class="modal-header__title">
				<? _e('Contact our team!', 'fancynerds'); ?>
			</p>
			<span class="close">&times;</span>
		</div>
		<div class="modal-body">
			<form id="global-contact-form" class="form-ajx contact-modal__form" novalidate>
				<div class="contact-modal__grid">
					<input name="TITLE" value="Fancy-nerds.com Contact us Form" type="hidden" />
					
					<!-- Hidden input with Language value for Bitrix24 lead -->
					<?= M4Html::getLangHidden(['curr_lang'=>pll_current_language()]); ?>

					<?= (isset($_COOKIE['wp_affiliates']) ? "<input name='" . C_REST_AFF_ID . "' value='" . $_COOKIE['wp_affiliates'] . "' type='hidden'/>" : ""); ?>
					<div class="contact-modal__col form__control-box">
						<label class="form__label">
							<? _e('First Name', 'fancynerds'); ?>*
						</label>
						<input name="NAME" value="" class="form__control form__control--outlined form__control--small" required />
					</div>
					<div class="contact-modal__col form__control-box">
						<label class="form__label"><? _e('Last Name', 'fancynerds'); ?>*</label>
						<input name="LAST_NAME" value="" class="form__control form__control--outlined form__control--small" required />
					</div>

					<div class="contact-modal__col form__control-box">
						<label class="form__label"><? _e('Email', 'fancynerds'); ?>*</label>
						<input name="EMAIL" value="" class="form__control form__control--outlined form__control--small" required />
					</div>

					<div class="contact-modal__col form__control-box">
						<label class="form__label"><? _e('Phone', 'fancynerds'); ?></label>
						<input name="PHONE" value="" class="form__control form__control--outlined form__control--small" />
					</div>

					<div class="contact-modal__col contact-modal__col--fluid form__control-box">
						<label class="form__label"><? _e('Comments', 'fancynerds'); ?></label>
						<textarea name="COMMENTS" class="form__control form__control--outlined form__control--small" rows="5"></textarea><br />
					</div>
					<div class="contact-modal__col contact-modal__col--fluid contact-modal__recaptcha">
					</div>
					<div class="contact-modal__col contact-modal__col--fluid form__submit-box form__submit-box--centered">
						<button class="button button--small button--orange modal-body__btn form__submit"><? _e('Send', 'fancynerds'); ?></button>
					</div>
					<p class="form-ajx__result contact-modal__col contact-modal__col--fluid"></p>
				</div>
			</form>

		</div>
	</div>
</div>
<template id="video-modal">
	<div class="video-modal">
		<div class="video-modal__box">
			<button class="video-modal__close" aria-label="close">×</button>
			<div class="video-modal__inner">
			</div>
		</div>
	</div>
</template>

<? wp_footer(); ?>
</body>

</html>