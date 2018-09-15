
<div class="main-container woocommerce">
	<div class="row full-width center-children">
		<?php
		if ( woocommerce_product_loop() ) {
			woocommerce_product_loop_start(); ?>
			<div class="row center-children"><?php

				$params = array('post_type' => 'product',
                    'post_status' => 'publish',
                    'tax_query' => array(array(
                        'taxonomy' => 'pa_colour',
                        'field' => 'slug',
                        'terms' => array('red', 'green'),
                        'operation' => 'IN'
                    ))
                );

				$product_query = new WP_Query($params);
				if ( wc_get_loop_prop( 'total' ) ) {
					while ( $product_query->have_posts() ) {

						$product_query->the_post();
						$product = wc_get_product(get_post(get_the_ID(), OBJECT));?>

						<div class="columns large-3 medium-4 small-10 collection-container">
							<div class="row">
								<div class="columns small-12">
									<a href="/product/<?php echo $product->get_slug(); ?>">
										<?php echo $product->get_image('full'); ?>
									</a>
									<hr class="show-for-medium">
								</div>
								<div class="columns small-6">
									<?php echo $product->get_short_description(); ?>
								</div>
								<div class="columns small-6 align-right">
									<b>$<?php echo $product->get_price(); ?></b>
								</div>
							</div>
						</div>

						<?php wp_reset_postdata();
					}
				}?>
			</div> <?php
			woocommerce_product_loop_end();
		} else {
			/**
			 * Hook: woocommerce_no_products_found.
			 *
			 * @hooked wc_no_products_found - 10
			 */
			do_action( 'woocommerce_no_products_found' );
		}?>

	</div>
</div>