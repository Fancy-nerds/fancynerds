<?php wp_enqueue_style( 'fancynerds-part-jumbo-css' ); ?>

<section class="section jumbotron__inner">
	<div class="container">
		<div class="row">
			<div class="heading">
				<h1 class="title"><?= $args['title']; ?></h1>
				<div class="breadcrumbs">
					<a class="breadcrumbs__item active" href="<?php echo get_home_url(); ?>"><?php echo get_the_title( get_option('page_on_front') ); ?></a> >
					<span class="breadcrumbs__item"><?= $args['title']; ?></span>
				</div>
			</div>
		</div>
	</div>
</section>