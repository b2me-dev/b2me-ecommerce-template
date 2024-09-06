<?php
	get_header();
?>
	<main id="primary" class="site-main">
		<article class="page type-page status-publish hentry">
			<div class="entry-content">
				<section class="ecom-banner">
					<canvas width="1920" height="916" style="background-image: url('<?= get_field('banner_image'); ?>')"></canvas>
					<div class="b2-inner-content ecom-banner-txt b2-text-white">
						<h1><?= get_field('banner_heading'); ?></h1>
						<p><?= get_field('banner_subheading'); ?></p>
						<a href="<?= get_field('banner_link_1_url'); ?>" class="b2-link bordered"><?= get_field('banner_link_1_text'); ?></a>
						<a href="<?= get_field('banner_link_2_url'); ?>" class="b2-link bordered"><?= get_field('banner_link_2_text'); ?></a>
					</div>
				</section>

				<section class="ecom-cta">
					<div class="b2-row b2-column-no-gutter">
						<?php if( have_rows('cta_list') ):
							while( have_rows('cta_list') ): the_row(); 
								$cta_item_image = get_sub_field('cta_item_image');
								$cta_item_text = get_sub_field('cta_item_text');
								$cta_item_link_url = get_sub_field('cta_item_link_url');
							?>
								<div class="b2-col col-3">
									<a href="<?= $cta_item_link_url; ?>" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
										<div class="ecom-cta-item">
											<img src="<?= $cta_item_image; ?>" alt="Product" class="b2-img-responsive">
											<p><?= $cta_item_text; ?></p>
										</div>
									</a>
								</div>
							<?php endwhile;
						endif; ?>
					</div>
				</section>

				<section class="ecom-products">
					<div class="b2-inner-content">
						<div class="ecom-products-heading b2-text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
							<h2><?= get_field('products_heading'); ?></h2>
							<p><?= get_field('products_subheading'); ?></p>
						</div>
						<div class="ecom-products-slide-wrap" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
							<div class="ecom-products-slide">
								<?php
									$args = array(
										'post_type' => 'product',
										'posts_per_page' => -1,
									);
									
									$prods = new WP_Query($args);

									if ( $prods->have_posts() ) :
										while ( $prods->have_posts() ) :
											$prods->the_post();
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

											echo '<div>
												<div class="ecom-products-item">
													<div class="ecom-products-item-img">
														<a href="'. $product_link .'">
															<img src="'. $product_image_url .'" alt="Featured Product" class="b2-img-responsive">
														</a>
														<ul class="ecom-products-item-options">
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
													<div class="ecom-products-item-dets b2-text-center">
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
											</div>';
										endwhile;
									
										wp_reset_postdata(); 
									else :
										echo '<p>No products found</p>';
									endif;
								?>
							</div>
							<div class="ecom-products-slide-arrows">
								<div class="prev">
									<i class="fa-solid fa-angle-left"></i>
								</div>
								<div class="next">
									<i class="fa-solid fa-angle-right"></i>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="ecom-ftr">
					<canvas width="1920" height="653" style="background-image: url('<?= get_field('featured_image'); ?>')"></canvas>
					<div class="b2-inner-content">
						<div class="b2-row">
							<div class="b2-col col-6"></div>
							<div class="b2-col col-6">
								<div class="ecom-ftr-txt" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
									<h2><?= get_field('featured_heading'); ?></h2>
									<span><?= get_field('featured_category'); ?></span>
									<p><?= get_field('featured_description'); ?></p>
									<del><?= get_field('featured_old_price'); ?></del>
									<div class="price"><?= get_field('featured_sale_price'); ?></div>
								</div>
							</div>
						</div>
					</div>
				</section>

				<section class="ecom-categ">
					<div class="b2-inner-content">
						<div class="ecom-categ-heading b2-text-center" data-aos="fade-up" data-aos-duration="1000" data-aos-once="true">
							<h2><?= get_field('categories_heading'); ?></h2>
							<p><?= get_field('categories_subheading'); ?></p>
						</div>
						<div class="b2-row">
							<?php if( have_rows('categories_list') ):
								while( have_rows('categories_list') ): the_row(); 
									$categories_item_heading = get_sub_field('categories_item_heading');
								?>
									<div class="b2-col col-3">
										<div class="ecom-categ-item" data-aos="zoom-in" data-aos-duration="1000" data-aos-once="true">
											<h3><?= $categories_item_heading; ?></h3>
											<ul>
												<li>
													<a href="#" title="Hydrate Silk Balm">Hydrate Silk Balm</a>
												</li>
												<li>
													<a href="#" title="Forest Scrub">Forest Scrub</a>
												</li>
												<li>
													<a href="#" title="Velvet Night Cream">Velvet Night Cream</a>
												</li>
												<li>
													<a href="#" title="Crystal Body Wash">Crystal Body Wash</a>
												</li>
												<li>
													<a href="#" title="Lush Shimmer Oil">Lush Shimmer Oil</a>
												</li>
											</ul>
										</div>
									</div>
								<?php endwhile;
							endif; ?>
						</div>
					</div>
				</section>

				<section class="ecom-reminders">
					<canvas width="1920" height="231" style="background-image: url('<?= get_field('services_image'); ?>')"></canvas>
					<div class="b2-inner-content">
						<ul>
							<?php if( have_rows('services_list') ):
								while( have_rows('services_list') ): the_row(); 
									$services_item = get_sub_field('services_item');
								?>
									<li><?= $services_item; ?></li>
								<?php endwhile;
							endif; ?>
						</ul>
					</div>
				</section>
			</div>
		</article>
	</main>
<?php
	get_footer();