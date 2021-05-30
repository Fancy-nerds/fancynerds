<?php

/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fancynerds
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php
	if (pll_current_language() == 'ru') { ?>
		<link rel="stylesheet" id="fontMonserrat-css" href="<?= get_template_directory_uri() . '/assets/styles/fontMonserrat.css' ?>" media="all">
	<?php }
	?>

	<?php wp_head(); ?>

	<!-- Global site tag (gtag.js) - Google Analytics -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-8K04121YRN"></script>
	<script type="text/javascript">
		const templateUrl = '<?= get_bloginfo("template_url"); ?>';
		const grePublicKey = '<?= get_field('gre_site_key', 'option') ?>';
	</script>
	<script>
		window.dataLayer = window.dataLayer || [];

		function gtag() {
			dataLayer.push(arguments);
		}
		gtag('js', new Date());

		gtag('config', 'G-8K04121YRN');
	</script>

	<style>
		/* The Modal (background) */
		.modal {
			display: none;
			/* Hidden by default */
			position: fixed;
			/* Stay in place */
			z-index: 9999;
			/* Sit on top */
			padding-top: 100px;
			/* Location of the box */
			left: 0;
			top: 0;
			width: 100%;
			/* Full width */
			height: 100%;
			/* Full height */
			overflow: auto;
			/* Enable scroll if needed */
			background-color: rgb(0, 0, 0);
			/* Fallback color */
			background-color: rgba(0, 0, 0, 0.4);
			/* Black w/ opacity */
		}

		/* Modal Content */
		.modal-content {
			position: relative;
			background-color: #fefefe;
			margin: auto;
			padding: 0;
			border: 1px solid #888;
			width: 100%;
			max-width: 500px;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			-webkit-animation-name: animatetop;
			-webkit-animation-duration: 0.4s;
			animation-name: animatetop;
			animation-duration: 0.4s;
			border-radius: 5px;
		}

		/* Add Animation */
		@-webkit-keyframes animatetop {
			from {
				top: -300px;
				opacity: 0
			}

			to {
				top: 0;
				opacity: 1
			}
		}

		@keyframes animatetop {
			from {
				top: -300px;
				opacity: 0
			}

			to {
				top: 0;
				opacity: 1
			}
		}

		.modal-header {
			position: relative;
		}

		.modal-header__title {
			font-size: 30px;
			text-align: center;
			margin-bottom: 10px;
			padding-top: 15px;
		}

		/* The Close Button */
		.close {
			position: absolute;
			right: 15px;
			top: 5px;
			color: red;
			/* float: right; */
			font-size: 28px;
			font-weight: bold;
		}

		.close:hover,
		.close:focus {
			color: #000;
			text-decoration: none;
			cursor: pointer;
		}

		.modal-body {
			padding: 25px;
		}

		.modal input,
		.modal textarea {
			width: 100%;
			resize: none;
		}
	</style>


</head>

<body <?php body_class(); ?>>
	<?php wp_body_open();
	$add_clss = 'home';
	if (is_page_template('tpl-team.php'))
		$add_clss = 'team';
	if (is_page_template('tpl-about.php'))
		$add_clss = 'about';
	if (is_page_template('tpl-service.php'))
		$add_clss = 'service';
	?>



	<div id="page" class="site <?= $add_clss; ?>">

		<header class="header">
			<div class="header__main">
				<a href="<?= home_url(); ?>" class="header__logo">
					<img width="89" height="80" src="<?php bloginfo('template_directory'); ?>/assets/images/logo-fancy-nerds.svg">
				</a>

				<div class="header__menu">
					<?php wp_nav_menu(array(
						'theme_location'  => 'menu-1',
						'menu_class'      => 'menu',
						'container_class' => 'header__menu_container',
					)); ?>
				</div>

				<div class="header__actions">
					<ul class="header__flags"><?php pll_the_languages(['show_flags' => 1, 'show_names' => 0]); ?></ul>
					<button class="button button--blue-dark header__contact-us" id="myBtn">
						<span>Contact Us</span>
						<img src="<?php bloginfo('template_directory'); ?>/assets/images/telephone.svg" width="25" height="25">

					</button>
					<a href="#" class="header__burger">
						<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24.75 24.75" style="enable-background:new 0 0 24.75 24.75;" xml:space="preserve">
							<g>
								<path d="M0,3.875c0-1.104,0.896-2,2-2h20.75c1.104,0,2,0.896,2,2s-0.896,2-2,2H2C0.896,5.875,0,4.979,0,3.875z M22.75,10.375H2
								c-1.104,0-2,0.896-2,2c0,1.104,0.896,2,2,2h20.75c1.104,0,2-0.896,2-2C24.75,11.271,23.855,10.375,22.75,10.375z M22.75,18.875H2
								c-1.104,0-2,0.896-2,2s0.896,2,2,2h20.75c1.104,0,2-0.896,2-2S23.855,18.875,22.75,18.875z"></path>
							</g>
						</svg>

						<div class="header__overlay"></div>
					</a>
				</div>
			</div>
		</header>
		<div class="header-mobile__menu">
			<div class="header__close">
				<a href="#" class="header__close_action">
					<i class="flaticon-close"></i>
				</a>
			</div>
			<?php wp_nav_menu(array(
				'theme_location'  => 'menu-1',
				'menu_class'      => 'menu',
				'container_class' => 'header__menu_container',
			)); ?>
		</div>
		<main class="main">