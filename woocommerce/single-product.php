<?php get_header(); ?>

<div class="row main-content">
    <div class=" breadcrumbs-container row full-width white">
        <nav class="margin-05" aria-label="You are here:" role="navigation">
            <ul class="breadcrumbs">
                <li><a href="<?php echo home_url(); ?>">Home</a></li>
                <li><a href="<?php echo home_url();?>/collection">Our Collection</a></li>
                <li>
                    <span class="show-for-sr">Current: </span> Product
                </li>
            </ul>
        </nav>
    </div>

	<?php 
		if(have_posts()){
			while(have_posts()){
				the_post();
				$product = wc_get_product(get_post(get_the_ID(), OBJECT)); ?>

				<div class="columns small-12 medium-7 padded">
                    <?php echo $product->get_image('full')?>
                </div>
                <div class="columns small-12 medium-5">
                    <div class="border-bottom">
                        <h3><?php echo $product->get_title(); ?></h3>
                    </div>
                    <div>
                        <p><?php echo $product->get_description(); ?></p>
                    </div>
                    <div class="row full-width">
                        <?php
                            $attributes = $product->get_attributes();
                            foreach($attributes as $attribute){
                                echo "<div class='columns small-12 padding-0'>";
                                    echo "<b class='blue-text'>" . get_taxonomy($attribute->get_taxonomy())->labels->singular_name . "</b> : ";

                                    $output = '';
                                    $terms = $attribute->get_terms();

                                    foreach($terms as $term){

                                        $output .= $term->name . ", ";

                                    }

                                    echo substr($output, 0, -2);

                                echo "</div>";
                            }
                        ?>
                    </div>
                    <div>
                        <span>
                            <br>
                            Not all of our stock is listed on this website. To view our full collection please come and <a href="/contact">visit us</a>.
                            <br><br>
                            <a href="callto:+0359821582">
                                <span class="fas fa-phone"></span> (03) 5982 1582
                            </a>
                            <br>
                                <a href="https://www.facebook.com/designedeyes/" target="_blank"><span class="fab fa-facebook-square"></span> Designed Eyes Rosebud</a>
                            <br><br>
                        </span>
                    </div>
                </div>
			<?php }
		}
	?>
</div>

<?php get_footer(); ?>