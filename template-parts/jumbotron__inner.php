<?php wp_enqueue_style( 'fancynerds-part-jumbo-css' );

global $post;
$breads = [
	[
		'href'=>get_home_url(),
		'title'=>get_the_title( get_option('page_on_front')),
	]
];

#If on child page
if ( is_page() && $post->post_parent )
$breads[]=[
	'href' => get_permalink( $post->post_parent ),
	'title' => get_the_title( $post->post_parent )
]; ?>

<section class="section jumbotron__inner">
	<div class="container">
		<div class="row">
			<div class="heading">
				<h1 class="title"><?= $args['title']; ?></h1>
				<div class="breadcrumbs">
					<?php
					foreach ($breads as $bread): ?>
						<a class="breadcrumbs__item active" href="<?= $bread['href']; ?>"><?= $bread['title']; ?></a> >
					<?php
					endforeach; ?>
					<span class="breadcrumbs__item"><?= $args['title']; ?></span>
				</div>
			</div>
		</div>
	</div>
</section>