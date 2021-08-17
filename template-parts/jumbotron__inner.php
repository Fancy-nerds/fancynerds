<?php wp_enqueue_style('fancynerds-part-jumbo-css');

global $post; ?>

<section class="section jumbotron__inner">
	<div class="jumbotron__inner__bg">
		<img src="<?php bloginfo('template_directory'); ?>/assets/images/bg-page-header.jpg" width="1920" height="300">
	</div>
	<div class="container">
		<div class="heading">
			<h1 class="title"><?= $args['title']; ?></h1>
			<?
			if (function_exists('rank_math_the_breadcrumbs')) rank_math_the_breadcrumbs();
			?>
		</div>

	</div>
</section>