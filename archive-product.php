<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woo.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.4.0
 */

defined( 'ABSPATH' ) || exit;

get_header();
?>
	<div class="b2-ip-banner">
		<canvas width="1920" height="390"></canvas>
	</div>

	<main id="primary" class="site-main">
        <?php
            if ( function_exists('yoast_breadcrumb') && !is_front_page()) {
                yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
            }
        ?>

        <h1>Shop</h1>

        <section class="ip-ecom-products">
            <div class="b2-inner-content">
                <ul class="ip-ecom-products-list">
                <?php
                    if ( have_posts() ) :
                        while ( have_posts() ) :
                            the_post();
                            global $product;

                            $hide_class = '';

                            // Get details
                            $product_link = get_the_permalink();
                            $product_name = get_the_title();
                            $product_image_url = get_the_post_thumbnail_url( get_the_ID(), 'thumbnail' );
                            $product_categories = get_the_terms( get_the_ID(), 'product_cat' );
                            $product_id = esc_attr( $product->get_id() );
                            $product_categories_text = '';

                            // Get categories
                            if (count($product_categories) > 1) {
                                $ctr = 0;
                                foreach ( $product_categories as $product_category ) {
                                    $ctr++;
                                    if ($ctr > 1) {
                                        $product_categories_text .= ' | ';
                                    }
                                    $product_categories_text .= esc_html( $product_category->name );
                                }
                            } else {
                                foreach ( $product_categories as $product_category ) {
                                    $product_categories_text .= esc_html( $product_category->name );
                                }
                            }

                            // Get price
                            $regular_price = '';
                            $old_price_class = '';
                            $product_regular_price = wc_price( $product->get_regular_price() );
                            $product_sale_price = wc_price( $product->get_sale_price() );

                            if ($product_regular_price) {
                                $regular_price = $product_regular_price;
                            } else {
                                $regular_price = wc_price( $product->get_price() );
                            }

                            if (!$product->is_on_sale()) {
                                $hide_class = 'b2-hidden';
                            } else {
                                $old_price_class = 'striked';
                            }

                            // Detect if has variations
                            if ($product->is_type('variable') && $product->has_child()) {
                                // Hide sale price
                                $hide_class = 'b2-hidden';
                                $old_price_class = '';

                                // Loop through each variation
                                foreach ($product->get_available_variations() as $variation) {
                                    $variation_prices[] = $variation['display_price']; // Get the variation price
                                }

                                // Sort the prices in ascending order
                                sort($variation_prices);

                                // Get the lowest price
                                $lowest_price = reset($variation_prices);

                                $regular_price = '<small>Starts at</small> ' . wc_price($lowest_price);
                            }

                            echo '<li>
                                <div class="ip-ecom-products-item">
                                    <div class="ip-ecom-products-item-img">
                                        <a href="'. $product_link .'">
                                            <img src="'. $product_image_url .'" alt="Featured Product" class="b2-img-responsive">
                                        </a>
                                        <ul class="ip-ecom-products-item-options">
                                            <li>
                                                <a href="'. $product_link .'">
                                                    <i class="fa-solid fa-eye"></i>
                                                </a>
                                            </li>
											<li class="'. $hide_class .'">
                                                <a href="?add-to-cart='. get_the_ID() .'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="'. get_the_ID() .'">
                                                    <i class="fa-solid fa-plus"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="/product-details/">
                                                    <i class="fa-regular fa-heart"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="ip-ecom-products-item-dets b2-text-center">
                                        <br/>
                                        <h4>'. $product_name .'</h4>
                                        <br/>
                                        <h5>'. $product_categories_text .'</h5>
                                        <div class="b2-flex">
                                            <p class="'. $old_price_class .'">'. $regular_price .'</p>
                                            <p class="'. $hide_class .'">'. $product_sale_price .'</p>
                                        </div>
                                    </div>
                                </div>
                            </li>';
                       endwhile;
                    
                        wp_reset_postdata(); 
                    else :
                        echo '<p>No products found</p>';
                    endif;
                ?>
                </ul>
            </div>
        </section>

    </main><!-- #main -->

<?php
get_footer();
