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
if(is_page_template('tpl-about.php'))
	$add_clss = 'about';
?>

  

<div id="page" class="site <?= $add_clss;?>">

	<header class="header">
		<div class="header__main">
			<a href="<?= home_url(); ?>" class="header__logo">
				<img width="89" height="80" src="<?php bloginfo('template_directory');?>/assets/images/logo-fancy-nerds.svg">
			</a>

			<div class="header__menu">
				<a href="#" class="header__close">
					<i class="flaticon-close"></i>
				</a>
				<?php wp_nav_menu( array(
					'theme_location'  => 'menu-1',
					'menu_class'      => 'menu',
					'container_class' => 'header__menu_container',
				) ); ?>
			</div>

			<div class="header__actions">
				<ul class="header__flags"><?php pll_the_languages(['show_flags' => 1,'show_names' => 0]);?></ul>
				<a href="#" class="button button--blue-dark">Contact Us</a>
			</div>

			<div class="header__mobile-menu">
				<svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 24.75 24.75" style="enable-background:new 0 0 24.75 24.75;" xml:space="preserve">
					<g>
						<path d="M0,3.875c0-1.104,0.896-2,2-2h20.75c1.104,0,2,0.896,2,2s-0.896,2-2,2H2C0.896,5.875,0,4.979,0,3.875z M22.75,10.375H2
							c-1.104,0-2,0.896-2,2c0,1.104,0.896,2,2,2h20.75c1.104,0,2-0.896,2-2C24.75,11.271,23.855,10.375,22.75,10.375z M22.75,18.875H2
							c-1.104,0-2,0.896-2,2s0.896,2,2,2h20.75c1.104,0,2-0.896,2-2S23.855,18.875,22.75,18.875z"></path>
					</g>
				</svg>

				<div class="header__overlay"></div>
			</div>
		</div>
	</header>

	<main class="main">