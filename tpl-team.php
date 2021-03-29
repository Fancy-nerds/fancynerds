<?php
/* Template Name: Team
Template Post Type: post, page */

get_header();


if ( have_posts() ) : while ( have_posts() ) : the_post(); 
	
	get_template_part( 'template-parts/jumbotron__inner', null, [
		'title' => get_the_title(),
	] );
	?>






<!-- post -->
<?php
endwhile;
endif;
?>



<div class="main__content">
    <div class="team__info">
        <div class="container">
            <div class="team__group">

                <div class="team__photo">
                    <img src="<?php bloginfo('template_directory');?>/assets/images/2443423454.png" alt="">

                    <div class="team__heading">
                        <h4 class="subtitle subtitle__dot-before">Skilled team</h4>
                        <h2 class="title">Meet Our Executive Team Members</h2>
                        <p class="description">If we had a 'secret sauce' it would be our awesome people.</p>
                    </div>
                </div>

                <section class="section partners">
                    <div class="container container--fluid">
                        <div class="row">
                            <div class="col col-20">
                                <div class="partners__item">
                                    <img src="<?php bloginfo('template_directory');?>/assets/images/c-logo2-2.png" alt="SEO Mind">
                                </div>
                            </div>
                            <div class="col col-20">
                                <div class="partners__item">
                                    <img src="<?php bloginfo('template_directory');?>/assets/images/c-logo2-1.png" alt="IBM Media">
                                </div>
                            </div>
                            <div class="col col-20">
                                <div class="partners__item">
                                    <img src="<?php bloginfo('template_directory');?>/assets/images/c-logo2-6.png" alt="Greenhost">
                                </div>
                            </div>
                            <div class="col col-20">
                                <div class="partners__item">
                                    <img src="<?php bloginfo('template_directory');?>/assets/images/c-logo2-5.png" alt="Yodgy">
                                </div>
                            </div>
                            <div class="col col-20">
                                <div class="partners__item">
                                    <img src="<?php bloginfo('template_directory');?>/assets/images/c-logo2-4.png" alt="Atomic SEO">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <div class="team__list">
        <div class="container">
            <div class="row">
                <div class="heading">
                    <h4 class="subtitle subtitle__dot-before subtitle__dot-after">professional people</h4>
                    <h2 class="title">Our Leadership Team</h2>
                    <p class="paragraph">We have experience working with large and small businesses and are ready to develop a targeted strategy and plan that’s just right for you.</p>
                </div>
            </div>
            <div class="row">
                <div class="col col-33">
                    <div class="team__card">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/091224867853_huge.png" alt="">
                        <div class="team__card_info">
                            <div class="team__name">Gina Bruno</div>
                            <div class="team__work">WEB Designer</div>
                            <div class="team__social">
                                <a href="#" class="team__social_item team__social_add"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-33">
                    <div class="team__card">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/09220761288_xl-2015.png" alt="">
                        <div class="team__card_info">
                            <div class="team__name">David Ferry</div>
                            <div class="team__work">CTO of Company</div>
                            <div class="team__social">
                                <a href="#" class="team__social_item team__social_add"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-33">
                    <div class="team__card">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/09233064538_xl-2015.png" alt="">
                        <div class="team__card_info">
                            <div class="team__name">Christina Tores</div>
                            <div class="team__work">CEO of Company</div>
                            <div class="team__social">
                                <a href="#" class="team__social_item team__social_add"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-33">
                    <div class="team__card">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/09284358002_xl-2015.png" alt="">
                        <div class="team__card_info">
                            <div class="team__name">Regina Blackly </div>
                            <div class="team__work">WEB Developer</div>
                            <div class="team__social">
                                <a href="#" class="team__social_item team__social_add"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-33">
                    <div class="team__card">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/091396486544_huge.png" alt="">
                        <div class="team__card_info">
                            <div class="team__name">Olivia Chee</div>
                            <div class="team__work">General Manager</div>
                            <div class="team__social">
                                <a href="#" class="team__social_item team__social_add"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col col-33">
                    <div class="team__card">
                        <img src="<?php bloginfo('template_directory');?>/assets/images/091414526951_huge.png" alt="">
                        <div class="team__card_info">
                            <div class="team__name">Robert Cooper</div>
                            <div class="team__work">WEB Developer</div>
                            <div class="team__social">
                                <a href="#" class="team__social_item team__social_add"></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


</div>

<?php
get_footer();