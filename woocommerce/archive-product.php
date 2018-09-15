<?php get_header();

    $titleMarkup = "<h2>Our Collection</h2>";
    $descriptionMarkup = "<span>Not all of our stock is listed on this website. To view our full collection please come and <a href=\"/contact\">visit us</a>.</span>";

?>

<!-- Image banner -->
<div class="banner-feature-image small">
	<div class="row">
		<div class="columns small-12">
			<h2 class="title centered"><b></b></h2>
		</div>
	</div>
</div>

<div class="row full-width main-content">
    <!-- Breadcrumbs -->
    <div class="breadcrumbs-container row full-width white center-children-vertical">
        <nav class="margin-05" aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
                <li><a href="<?php echo home_url() ?>">Home</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> Our Collection
                </li>
            </ul>
        </nav>
    </div>

	<div class="columns medium-12 large-3">
        <div class="hide-for-large align-center">
            <?php
            echo $titleMarkup;
            echo $descriptionMarkup
            ?>
        </div>

        <form id="ajax-filter-form" class="padded" autocomplete=off>
            <div>
                <label>Filters:</label>
                <!-- Filter for large screens -->
                <ul class="vertical menu transparent show-for-large" data-accordion-menu>
		            <?php
		            $taxonomies = array("pa_brand", "pa_colour", "pa_shape", "pa_material", "pa_gender", "pa_size");
		            $names = array("Brand", "Colour", "Shape", "Material", "Gender", "Size");

		            foreach ($taxonomies as $key => $taxonomy){ ?>
                        <li class="columns small-6 medium-10 float-left">
                            <a><?php
					            if($names[$key] == 'Brand'){
						            ?> <span class="fas fa-tags"></span> <?php
					            }elseif($names[$key] == 'Colour'){
						            ?> <span class="fas fa-palette"></span> <?php
					            }elseif($names[$key] == 'Shape'){
						            ?> <span class="fas fa-shapes"></span> <?php
					            }elseif($names[$key] == 'Material'){
						            echo "<span class=\"fas fa-glasses\"></span> ";
					            }elseif($names[$key] == 'Gender'){
						            echo "<span class=\"fas fa-transgender\"></span> ";
					            }elseif($names[$key] == 'Size'){
						            echo "<span class=\"fas fa-object-group\"></span> ";
					            }

					            echo $names[$key]; ?>
                            </a>


                            <ul class="menu vertical">
                                <li>
                                    <select name="<?php echo $names[$key]; ?>" class="ajax-filter-select" multiple>
                                        <option value="" class="filter-option-any">Any</option>
							            <?php
							            $terms = get_terms(array(
								            'taxonomy' => $taxonomy
							            ));

							            foreach($terms as $term){
								            echo "<option value=\"" . $term->name . "\">";
								            echo $term->name;
								            echo "</option>";

							            }?>
                                    </select>
                                </li>
                            </ul>
                        </li>

		            <?php }
		            ?>

                </ul>
            </div>

            <!-- Filter for small screens (tabulated) -->
            <div class="hide-for-large">
                <ul class="tabs row" data-tabs id="filter-tabs" data-active-collapse="true">
                    <?php
                        foreach($taxonomies as $key => $taxonomy){
	                        echo "<li class=\"tabs-title columns small-2 align-center\"><a  class=\"tabs-button\" href=\"#". $names[$key] . "_panel\"><h6>";

	                        if($names[$key] == 'Brand'){
		                        echo "<span class=\"fas fa-tags\"></span> ";
	                        }elseif($names[$key] == 'Colour'){
		                        echo "<span class=\"fas fa-palette\"></span> ";
	                        }elseif($names[$key] == 'Shape'){
		                        echo "<span class=\"fas fa-shapes\"></span> ";
	                        }elseif($names[$key] == 'Material'){
                                echo "<span class=\"fas fa-glasses\"></span> ";
                            }elseif($names[$key] == 'Gender'){
                                echo "<span class=\"fas fa-transgender\"></span> ";
                            }elseif($names[$key] == 'Size'){
                                echo "<span class=\"fas fa-object-group\"></span> ";
                            }

	                        echo "<br><span class='show-for-medium'>" . $names[$key] . "</span></h6></a>";
                        }
                    ?>
                </ul>

                <div class="tabs-content" data-tabs-content="filter-tabs">
                    <?php
                        foreach($taxonomies as $key => $taxonomy){
                            echo "<div class=\"tabs-panel\" id=\"" . $names[$key] . "_panel\">";
                            echo "<h4 class='show-for-small-only'>" . $names[$key] . "</h4>";
                            ?>

                            <select name="<?php echo $names[$key]; ?>" class="ajax-filter-select" multiple>
                                    <option value="" class="filter-option-any">Any</option>
		                            <?php
		                            $terms = get_terms(array(
			                            'taxonomy' => $taxonomy
		                            ));

		                            foreach($terms as $term){
			                            echo "<option value=\"" . $term->name . "\">";
			                            echo $term->name;
			                            echo "</option>";

		                            }?>
                             </select>

                             <?php echo "</div>";
                        }
                    ?>
                </div>
            </div>

            <div>
                <!-- Field for number of posts -->
                <label>Show:</label>
                <ul class="no-left-margin">
                    <select class="ajax-filter-select small-width" name="posts_per_page">
                        <option value="10">10</option>
                        <option value="20" selected="selected">20</option>
                        <option value="30">30</option>
                        <option value="60">60</option>
                        <option value="1000">All</option>
                    </select>
                </ul>
            </div>

        </form>
	</div>


    <!-- Container for products -->
	<div class="columns small-12 large-9">
        <div class="main-container woocommerce">
            <div class="show-for-large">
                <?php
                    echo $titleMarkup;
                    echo $descriptionMarkup
                ?>
            </div>

            <span id="active-filters"></span>

            <div id="products-container" class="row">
                <?php woocommerce_product_loop_start(); ?>

                <div class="row"> <?php

	                if($_SERVER['REQUEST_METHOD'] == 'POST'){
		                $product_query = new WP_Query($_POST['query']);
	                }else{
		                $product_query = fetch_products();
	                }

                    if ( $product_query->have_posts() ) {
                        while ( $product_query->have_posts() ) {

                            $product_query->the_post();
                            $product = wc_get_product(get_post(get_the_ID(), OBJECT));?>

                            <div class="columns large-3 medium-4 small-12 collection-container" data-aos="fade" data-aos-duration="2000" data-aos-once="true" data-aos-offset="-1000">
                                <div class="row">

                                    <div class="columns small-12">
                                        <a href="/product/<?php echo $product->get_slug(); ?>">
                                            <?php echo $product->get_image('full'); ?>
                                        </a>
                                        <hr class="show-for-medium">
                                    </div>

                                    <div class="columns small-6">
                                        <a class="black-text" href="/product/<?php echo $product->get_slug(); ?>"><?php echo $product->get_short_description(); ?></a>
                                    </div>

                                </div>
                            </div>
                        <?php } ?>

                        <?php wp_reset_postdata();

                    } else {

                    echo "<p class=\"no-products\"'>Sorry, we could not find any products to match the applied filters.</p>";

                    }?>
                </div>
                <?php woocommerce_product_loop_end(); ?>

            </div>
        </div>
	</div>
</div>

<?php get_footer(); ?>