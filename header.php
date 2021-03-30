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
<?php wp_body_open(); 
$add_clss = 'home';
if(is_page_template('tpl-team.php'))
	$add_clss = 'team';
?>

  

<div id="page" class="site <?= $add_clss;?>">

	<header class="header">
		<div class="header__main">
			<a href="<?= home_url(); ?>" class="header__logo">
				<img width="89" height="80" src="<?php bloginfo('template_directory');?>/assets/images/logo-fancy-nerds.svg">
			</a>

			<nav class="menu">
				<a href="#" class="menu-item">Home</a>
				<a href="#" class="menu-item">Services</a>
				<a href="#" class="menu-item">Team7</a>
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