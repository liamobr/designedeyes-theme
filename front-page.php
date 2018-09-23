<?php get_header(); ?>

<div class="banner-feature-image">
	<div class="row full-width center-vertical">
		<div class="columns small-12 align-center">
			<h1 class="title"><b>Designed Eyes Rosebud</b></h1>
		</div>
		<div class="columns small-12 align-center">
			<h3 class="title">Spectacle Maker | Optometrist</h3>
		</div>
		<div class="columns small-12 align-center">
			<a href="/collection" class="button large"><i class="fas fa-mouse-pointer"></i> View our Collection</a>
		</div>
	</div>
</div>

<div class="banner-feature-text">
    <div class="row">
        <div class="columns small-12" data-aos="fade-right" data-aos-duration="2000" data-aos-once="true" data-aos-offset="-3000">
            <a id="scroll-text" class="black-text align-center"><h4><em><b>Read More</b></em></h4></a>
        </div>
        <div class="columns small-12" data-aos="fade-left" data-aos-duration="2000" data-aos-once="true" data-aos-offset="-3000">
            <h3 class="align-center"><a id="scroll-button" class="fas fa-angle-down"></a></h3>
        </div>
    </div>
</div>

<div class="main-content">
    <div class="row">
        <?php
        if(have_posts()):
            while(have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </div>
</div>

<div class="main-content">
    <div class="row">
        <?php
        if(have_rows('services')){
            while(have_rows('services')){
                the_row();

                $service_image = get_sub_field('service_image')['url'];
                $service_title = get_sub_field('service_title');
                $service_link = get_sub_field('service_link');
                $service_description = get_sub_field('service_description');

                ?>

                <div class="row columns small-12 align-center">
                    <div class="columns small-12 service-panel" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true" data-aos-offset="300">
                        <div class="row" data-equalizer>
                            <div class="columns small-12 medium-5" data-equalizer-watch>
                                <div class="service-image">
                                    <img src="<?= $service_image ?>" alt="">
                                </div>
                            </div>
                            <div class="columns small-12 medium-7" data-equalizer-watch>
                                <div class="service-container">
                                    <h4><b><?= $service_title ?></b></h4><br>
                                    <p><?= $service_description ?></p><br>
                                    <a class="button" href="<?= $service_link ?>"><i class="fas fa-mouse-pointer"></i> Read more</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php
            }
        }
        ?>

    </div>
</div>

<?php get_footer(); ?>