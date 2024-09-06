<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woo.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header(); ?>

	<main id="primary" class="site-main">
		<?php
			while ( have_posts() ) :
				the_post();
				global $product;

				// Get details
				$product_link = get_the_permalink();
				$product_name = get_the_title();
				$product_description = $product->get_description();
				$gallery_image_ids = $product->get_gallery_image_ids();
				$product_categories = get_the_terms( get_the_ID(), 'product_cat' );
				$product_id = esc_attr( $product->get_id() );
				$product_sku = $product->get_sku();
				$product_categories_text = '';
				$product_stock = $product->get_stock_quantity();

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

					// Loop through each variation - get other details
					$variation_name = '<select class="ecom-pd-dets-vars">';
					$selected_size = isset($_GET['attribute_size']) ? $_GET['attribute_size'] : '';

					foreach ($product->get_available_variations() as $variation) {
						$variation_id = $variation['variation_id'];

						if ($variation['display_regular_price'] !== $variation['display_price']) {
							$variation_price = $variation['display_price'];
						} else {
							$variation_price = $variation['display_regular_price'];
						}
						
						$variation_name .= '<option id="' . $variation_id . '" data-price="'. $variation_price .'"';
						
						// Check if the current variation matches the selected size from URL
						if ($selected_size === $variation['attributes']['attribute_size']) {
							$variation_name .= ' selected';
						}
						
						$variation_name .= '>';
						
						$variation_attributes = $variation['attributes'];
						$normalized_attribute_values = array();

						foreach ($variation_attributes as $attribute_name => $attribute_value) {
							$normalized_attribute_value = ucwords($attribute_value);
							$normalized_attribute_values[] = $normalized_attribute_value;
						}

						$variation_name .= implode(' / ', $normalized_attribute_values);
						$variation_name .= '</option>';
					}
					$variation_name .= '</select>';

					foreach ($product->get_available_variations() as $variation) {
						$variation_prices[] = $variation['display_price'];
					}

					sort($variation_prices);
					$lowest_price = reset($variation_prices);

					rsort($variation_prices);
					$highest_price = reset($variation_prices);

					$low_price = wc_price($lowest_price);
					$high_price = wc_price($highest_price);

					$regular_price = $low_price . '-' . $high_price;
				}

				// Get tag
				$tag_ids = $product->get_tag_ids();
				$tags_text = '';
				if ( !empty( $tag_ids ) ) {
					// Loop through each tag term ID to get the tag name
					foreach ( $tag_ids as $tag_id ) {
						$tag = get_term( $tag_id, 'product_tag' );
			
						if ( !empty( $tag ) && !is_wp_error( $tag ) ) {
							$tags_text .= '<span>' . $tag->name . '</span>';
						}
					}
				}

				// Get attributes
				$product_attributes = $product->get_attributes();
		?>
		<div class="ecom-pd">
			<section class="ecom-pd-dets">
				<div class="ecom-pd-bc">
				<?php
					if ( function_exists('yoast_breadcrumb') && !is_front_page()) {
						yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
				?>
				</div>
				<div class="b2-inner-content">
					<div class="b2-row">
						<div class="b2-col col-4">
							<div class="ecom-pd-dets-gallery-main-slide-wrap">
								<div class="ecom-pd-dets-gallery-main-slide">
									<?php
										foreach ( $gallery_image_ids as $image_id ) {
											$image_url = wp_get_attachment_image_src( $image_id, 'full' );
								
											if ( !empty( $image_url ) ) {
												echo '<div>
													<a href="#" class="ecom-pd-dets-gallery-main-item">
														<img src="'. $image_url[0] .'" alt="'. $product_name .'" class="b2-img-responsive">
													</a>
												</div>';
											}
										}
									?>
								</div>
							</div>
							<div class="ecom-pd-dets-gallery-thumb-slide-wrap">
								<div class="ecom-pd-dets-gallery-thumb-slide">
									<?php
										foreach ( $gallery_image_ids as $image_id ) {
											$image_url = wp_get_attachment_image_src( $image_id, 'full' );
								
											if ( !empty( $image_url ) ) {
												echo '<div>
													<a href="#" class="ecom-pd-dets-gallery-thumb-item">
														<img src="'. $image_url[0] .'" alt="'. $product_name .'" class="b2-img-responsive">
													</a>
												</div>';
											}
										}
									?>
								</div>
							</div>
						</div>
						<div class="b2-col col-8">
							<div class="ecom-pd-dets-txt">
								<h1><?= $product_name; ?></h1>
								<p><?= $product_categories_text; ?></p>
								<div class="b2-flex ecom-pd-dets-price">
									<p class="<?= $old_price_class; ?>"><?= $regular_price; ?></p>
									<p class="<?= $hide_class; ?>"><?= $product_sale_price; ?></p>
								</div>
								<p class="ecom-pd-dets-stock <?= $hide_class; ?>"><strong><?= $product_stock; ?></strong> left in stock.</p>
								<?= $variation_name; ?>
								<p><?= $product_description; ?></p>
								<div class="ecom-pd-controls">
									<div>
										<div class="ecom-pd-qty">
											<button class="less">-</button>
											<input type="text" value="1" class="product-qty">
											<button class="add">+</button>
										</div>
									</div>
									<div>
										<button href="?add-to-cart=<?= get_the_id(); ?>" data-quantity="1" class="ecom-pd-addtocart button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="<?= get_the_id(); ?>">Add to Cart</button>
									</div>
								</div>
								<a href="#" class="ecom-pd-addtowish">
									<i class="fa-regular fa-heart"></i> Add to Wishlist
								</a>
								<ul class="ecom-pd-info">
									<li><strong>SKU: <?= $product_sku; ?></strong></li>
									<li><strong>Category: <?= $product_categories_text; ?></strong></li>
									<li><strong>Tag(s): <?= $tags_text; ?></strong></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<section class="ecom-pd-tab">
				<div class="b2-inner-content">
					<ul class="ecom-pd-tab-control">
						<li>
							<a href="#" title="Additional Information" class="add-info active-control">Additional Information</a>
						</li>
						<li>
							<a href="#" title="Reviews" class="reviews">Reviews</a>
						</li>
					</ul>
					<div id="add-info" class="ecom-pd-tab-panel active-panel">
						<table>
							<?php
								if (!empty($product_attributes)) {
					
									foreach ($product_attributes as $attribute) {
										$attribute_name = $attribute->get_name();
										$attribute_value = $product->get_attribute($attribute_name);
										if (!empty($attribute_value)) {
											echo '<tr>
												<td>
													<p><strong>'. wc_attribute_label($attribute_name) .'</strong></p>
												</td>
												<td>
													<p>'. $attribute_value .'</p>
												</td>
											</tr>';
										}
									}
								} else {
									echo '<tr>
											<td>
												<p><strong>No details here...</strong></p>
											</td>
										</tr>';
								}
							?>
						</table>
					</div>
					<div id="reviews" class="ecom-pd-tab-panel">
						<ul class="ecom-pd-reviews">
							<?php
								$product_reviews = array(
									'post_type'   => 'product',
									'post_id'     => $product_id,
									'status'      => 'approve', 
									'posts_per_page' => -1, 
								);

								$comments = get_comments( $product_reviews );

								if (empty($comments)) {
									echo '<p>No reviews found...</p>';
								} else {
									foreach ( $comments as $comment ) {	
										$comment_name = $comment->comment_author;
										$comment_message = $comment->comment_content;
										$comment_avatar_url = get_avatar_url( $comment->comment_author_email, array( 'size' => 100 ) );
										$comment_date = date( 'Y M d', strtotime( $comment->comment_date ) );

										$comment_rating_star = '';
										$comment_rating = get_comment_meta( $comment->comment_ID, 'rating', true );
										for ($i = 0; $i < $comment_rating; $i++) {
											$comment_rating_star .= '<li><i class="fa-solid fa-star"></i></li>';
										}

										if ($comment_rating < 5) {
											$comment_rating_blank = 5 - $comment_rating;
											for ($j = 0; $j < $comment_rating_blank; $j++) {
												$comment_rating_star .= '<li><i class="fa-regular fa-star"></i></li>';
											}
										}

										echo '<li>
											<div class="ecom-pd-reviews-item">
												<div>
													<img src="'. $comment_avatar_url .'" alt="'. $comment_name .'" class="b2-img-responsive">
												</div>
												<div>
													<ul class="rating">
														'. $comment_rating_star .'
													</ul>
													<p><strong>'. $comment_name .' - '. $comment_date .'</strong></p>
													<p>'. $comment_message .'</p>
												</div>
											</div>
										</li>';
									}
								}

							?>
						</ul>
						<?php
							// Ensure that comments are open for the product
							if (comments_open()) {
								// Display the WooCommerce review form
								comment_form(array(
									'title_reply' => __('Leave a review', 'woocommerce'),
									'label_submit' => __('Submit', 'woocommerce'),
									'class_submit' => 'submit',
									'fields' => array(
										'rating' => '<p class="comment-form-rating">
											<label for="rating">' . __('Rating', 'woocommerce') . '</label>
											<select name="rating" id="rating" required>
												<option value="">' . __('Rate&hellip;', 'woocommerce') . '</option>
												<option value="5">' . __('Perfect', 'woocommerce') . '</option>
												<option value="4">' . __('Good', 'woocommerce') . '</option>
												<option value="3">' . __('Average', 'woocommerce') . '</option>
												<option value="2">' . __('Not that bad', 'woocommerce') . '</option>
												<option value="1">' . __('Very poor', 'woocommerce') . '</option>
											</select></p>',
										'author' => '<p class="comment-form-author"><label for="author">' . __('Name', 'domain') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="author" name="author" type="text" value="' . esc_attr($commenter['comment_author']) . '" size="30"' . $aria_req . ' /></p>',
										'email' => '<p class="comment-form-email"><label for="email">' . __('Email', 'domain') . '</label> ' . ( $req ? '<span class="required">*</span>' : '' ) . '<input id="email" name="email" type="text" value="' . esc_attr($commenter['comment_author_email']) . '" size="30"' . $aria_req . ' /></p>',
									),
									'comment_field' => '<p class="comment-form-comment"><label for="comment">' . __('Message', 'woocommerce') . '</label><textarea id="comment" name="comment" cols="45" rows="8" required></textarea></p>',
									'logged_in_as' => '',
									'comment_notes_before' => '',
									'comment_notes_after' => '',
									'id_form' => 'commentform',
									'id_submit' => 'submit',
									'class_form' => 'comment-form',
									'class_submit' => 'submit',
									'submit_button' => '<button type="submit" class="button" name="submit" id="submit">' . __('Submit', 'woocommerce') . '</button>',
									'submit_field' => '<p class="form-submit">%1$s %2$s</p>',
									'format' => 'xhtml'
								));
							} else {
								echo '<p class="woocommerce-verification-required">' . __('Only logged in customers who have purchased this product may leave a review.', 'woocommerce') . '</p>';
							}
						?>
					</div>
				</div>
			</section>
			<section class="ecom-products">
				<div class="b2-inner-content">
					<div class="ecom-products-heading b2-text-center">
						<h2>
							<span>Related</span> Products
						</h2>
						<p>Lorem ipsum, dolor sit amet consectetur<br/>adipisicing elit</p>
					</div>
					<div class="ecom-products-slide-wrap">
						<div class="ecom-products-slide">
							<?php
								$related_ids = wc_get_related_products( $product->get_id(), 10 );
								if ( $related_ids ) :
									foreach ( $related_ids as $related_id ) :
										$related_product = wc_get_product( $related_id );

										$hide_class = '';

										// Get details
										$product_id = esc_attr( $related_product->get_id() );
										$product_link = get_the_permalink($product_id);
										$product_name = get_the_title($product_id);
										$product_image_url = get_the_post_thumbnail_url( $product_id, 'thumbnail' );
										$product_categories = get_the_terms( $product_id, 'product_cat' );
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
										$product_regular_price = wc_price( $related_product->get_regular_price() );
										$product_sale_price = wc_price( $related_product->get_sale_price() );

										if ($product_regular_price) {
											$regular_price = $product_regular_price;
										} else {
											$regular_price = wc_price( $related_product->get_price() );
										}

										if (!$related_product->is_on_sale()) {
											$hide_class = 'b2-hidden';
										} else {
											$old_price_class = 'striked';
										}

										// Detect if has variations
										if ($related_product->is_type('variable') && $related_product->has_child()) {
											// Hide sale price
											$hide_class = 'b2-hidden';
											$old_price_class = '';

											// Loop through each variation
											foreach ($related_product->get_available_variations() as $variation) {
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
															<a href="?add-to-cart='. $product_id .'" data-quantity="1" class="button product_type_simple add_to_cart_button ajax_add_to_cart" data-product_id="'. $product_id .'">
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
									endforeach;
								else:
									echo '<div>
										<div class="ecom-products-item">
											<div class="ecom-products-item-dets b2-text-center">
												<h4>No related products found.</h4>
											</div>
										</div>
									</div>';
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
		</div>
		<?php endwhile; ?>
	</main><!-- #main -->

<?php
get_footer();