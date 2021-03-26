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
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site home">

	<header class="header">
		<div class="header__top">
			<div class="header__links">

			</div>
		</div>
		<div class="header__main">
			<div class="header__logo">
				<a href="<?=home_url();  ?>">
					<img src="<?php bloginfo('template_directory');?>/assets/images/logo.png">
				</a>
			</div>

			<nav class="menu">
				<a href="#" class="menu-item">Home</a>
				<a href="#" class="menu-item">Services</a>
				<a href="#" class="menu-item">Pages</a>
				<a href="#" class="menu-item">Blog</a>
				<a href="#" class="menu-item">Portfolio</a>
				<a href="#" class="menu-item">Contacts</a>
			</nav>

			<div class="header__actions">
				<ul class="header__flags"><?php pll_the_languages(['show_flags' => 1,'show_names' => 0]);?></ul>
				<a href="#" class="button button--small button--blue-dark">Contact Us</a>
			</div>
		</div>
	</header>

	<main class="main">