<?php
/*
 * Template Name: Product Details
 */

get_header();
?>

	<main id="primary" class="site-main">
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
									<div>
										<a href="#" class="ecom-pd-dets-gallery-main-item">
											<img src="/wp-content/uploads/2023/05/product-close-up-2.jpg" alt="Product Name" class="b2-img-responsive">
										</a>
									</div>
									<div>
										<a href="#" class="ecom-pd-dets-gallery-main-item">
											<img src="/wp-content/uploads/2023/05/product-back.jpg" alt="Product Name" class="b2-img-responsive">
										</a>
									</div>
									<div>
										<a href="#" class="ecom-pd-dets-gallery-main-item">
											<img src="/wp-content/uploads/2023/05/product-front-2.jpg" alt="Product Name" class="b2-img-responsive">
										</a>
									</div>
									<div>
										<a href="#" class="ecom-pd-dets-gallery-main-item">
											<img src="/wp-content/uploads/2023/05/product-back.jpg" alt="Product Name" class="b2-img-responsive">
										</a>
									</div>
									<div>
										<a href="#" class="ecom-pd-dets-gallery-main-item">
											<img src="/wp-content/uploads/2023/05/product-front-2.jpg" alt="Product Name" class="b2-img-responsive">
										</a>
									</div>
								</div>
							</div>
							<div class="ecom-pd-dets-gallery-thumb-slide-wrap">
								<div class="ecom-pd-dets-gallery-thumb-slide">
									<div>
										<a href="#" class="ecom-pd-dets-gallery-thumb-item">
											<img src="/wp-content/uploads/2023/05/product-close-up-2.jpg" alt="Product Name" class="b2-img-responsive">
										</a>
									</div>
									<div>
										<a href="#" class="ecom-pd-dets-gallery-thumb-item">
											<img src="/wp-content/uploads/2023/05/product-back.jpg" alt="Product Name" class="b2-img-responsive">
										</a>
									</div>
									<div>
										<a href="#" class="ecom-pd-dets-gallery-thumb-item">
											<img src="/wp-content/uploads/2023/05/product-front-2.jpg" alt="Product Name" class="b2-img-responsive">
										</a>
									</div>
									<div>
										<a href="#" class="ecom-pd-dets-gallery-thumb-item">
											<img src="/wp-content/uploads/2023/05/product-back.jpg" alt="Product Name" class="b2-img-responsive">
										</a>
									</div>
									<div>
										<a href="#" class="ecom-pd-dets-gallery-thumb-item">
											<img src="/wp-content/uploads/2023/05/product-front-2.jpg" alt="Product Name" class="b2-img-responsive">
										</a>
									</div>
								</div>
							</div>
						</div>
						<div class="b2-col col-8">
							<div class="ecom-pd-dets-txt">
								<h1>Product Name</h1>
								<p>Category</p>
								<h2>$49.00</h2>
								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora quisquam eaque maiores sint consequatur pariatur, quas architecto necessitatibus quis nostrum doloremque. Blanditiis perferendis totam iusto atque sint odit? Impedit, ad? Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempora quisquam eaque maiores sint consequatur pariatur, quas architecto necessitatibus quis nostrum doloremque. Blanditiis perferendis totam iusto atque sint odit? Impedit, ad?</p>
								<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Commodi excepturi ab ad dolores molestias tempora nemo placeat laboriosam non accusamus. Minus, placeat at architecto perferendis dolores nulla delectus explicabo magni.</p>
								<div class="ecom-pd-controls">
									<div>
										<div class="ecom-pd-qty">
											<button class="less">-</button>
											<input type="text" value="1" class="product-qty">
											<button class="add">+</button>
										</div>
									</div>
									<div>
										<button class="ecom-pd-addtocart">Add to Cart</button>
									</div>
								</div>
								<a href="#" class="ecom-pd-addtowish">
									<i class="fa-regular fa-heart"></i> Add to Wishlist
								</a>
								<ul class="ecom-pd-info">
									<li><strong>SKU: 001</strong></li>
									<li><strong>Category: Uncategorized</strong></li>
									<li><strong>Tag: Cosmetic</strong></li>
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
							<a href="#" title="Reviews" class="reviews active-control">Reviews (2)</a>
						</li>
						<li>
							<a href="#" title="Additional Information" class="add-info">Additional Information</a>
						</li>
					</ul>
					<div id="add-info" class="ecom-pd-tab-panel">
						<table>
							<tr>
								<td>
									<p><strong>Weight</strong></p>
								</td>
								<td>
									<p>1 kg</p>
								</td>
							</tr>
							<tr>
								<td>
									<p><strong>Dimensions</strong></p>
								</td>
								<td>
									<p>2 x 4 x 5 cm</p>
								</td>
							</tr>
						</table>
					</div>
					<div id="reviews" class="ecom-pd-tab-panel active-panel">
						<ul class="ecom-pd-reviews">
							<li>
								<div class="ecom-pd-reviews-item">
									<div>
										<img src="/wp-content/uploads/2023/01/user-img-1-100x100-1.jpg" alt="Customer" class="b2-img-responsive">
									</div>
									<div>
										<ul class="rating">
											<li><i class="fa-solid fa-star"></i></li>
											<li><i class="fa-solid fa-star"></i></li>
											<li><i class="fa-solid fa-star"></i></li>
											<li><i class="fa-solid fa-star"></i></li>
											<li><i class="fa-solid fa-star"></i></li>
										</ul>
										<p><strong>Jane Doe - August 14, 2019</strong></p>
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non necessitatibus eveniet, illum consequuntur dolorum tenetur eos voluptatum vel quidem sapiente dicta id repellat similique aut, optio, adipisci reprehenderit doloribus architecto?</p>
									</div>
								</div>
							</li>
							<li>
								<div class="ecom-pd-reviews-item">
									<div>
										<img src="/wp-content/uploads/2023/01/user-img-1-100x100-1.jpg" alt="Customer" class="b2-img-responsive">
									</div>
									<div>
										<ul class="rating">
											<li><i class="fa-solid fa-star"></i></li>
											<li><i class="fa-solid fa-star"></i></li>
											<li><i class="fa-solid fa-star"></i></li>
											<li><i class="fa-solid fa-star"></i></li>
											<li><i class="fa-solid fa-star"></i></li>
										</ul>
										<p><strong>Jane Doe - July 23, 2022</strong></p>
										<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Non necessitatibus eveniet, illum consequuntur dolorum tenetur eos voluptatum vel quidem sapiente dicta id repellat similique aut, optio, adipisci reprehenderit doloribus architecto?</p>
									</div>
								</div>
							</li>
						</ul>
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
							<div>
								<div class="ecom-products-item">
									<div class="ecom-products-item-img">
										<a href="#">
											<img src="/wp-content/uploads/2023/05/Product-1.jpg" alt="Featured Product" class="b2-img-responsive">
										</a>
										<ul class="ecom-products-item-options">
											<li>
												<a href="#"><i class="fa-solid fa-plus"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-solid fa-eye"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-regular fa-heart"></i></a>
											</li>
										</ul>
									</div>
									<div class="ecom-products-item-dets b2-text-center">
										<h4>Product Name</h4>
										<h5>Category</h5>
										<p>$46.00</p>
									</div>
								</div>
							</div>
							<div>
								<div class="ecom-products-item">
									<div class="ecom-products-item-img">
										<a href="#">
											<img src="/wp-content/uploads/2023/05/Product-2.jpg" alt="Featured Product" class="b2-img-responsive">
										</a>
										<ul class="ecom-products-item-options">
											<li>
												<a href="#"><i class="fa-solid fa-plus"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-solid fa-eye"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-regular fa-heart"></i></a>
											</li>
										</ul>
									</div>
									<div class="ecom-products-item-dets b2-text-center">
										<h4>Product Name</h4>
										<h5>Category</h5>
										<p>$46.00</p>
									</div>
								</div>
							</div>
							<div>
								<div class="ecom-products-item">
									<div class="ecom-products-item-img">
										<a href="#">
											<img src="/wp-content/uploads/2023/05/Product-3.jpg" alt="Featured Product" class="b2-img-responsive">
										</a>
										<ul class="ecom-products-item-options">
											<li>
												<a href="#"><i class="fa-solid fa-plus"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-solid fa-eye"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-regular fa-heart"></i></a>
											</li>
										</ul>
									</div>
									<div class="ecom-products-item-dets b2-text-center">
										<h4>Product Name</h4>
										<h5>Category</h5>
										<p>$46.00</p>
									</div>
								</div>
							</div>
							<div>
								<div class="ecom-products-item">
									<div class="ecom-products-item-img">
										<a href="#">
											<img src="/wp-content/uploads/2023/05/Product-4.jpg" alt="Featured Product" class="b2-img-responsive">
										</a>
										<ul class="ecom-products-item-options">
											<li>
												<a href="#"><i class="fa-solid fa-plus"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-solid fa-eye"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-regular fa-heart"></i></a>
											</li>
										</ul>
									</div>
									<div class="ecom-products-item-dets b2-text-center">
										<h4>Product Name</h4>
										<h5>Category</h5>
										<p>$46.00</p>
									</div>
								</div>
							</div>
							<div>
								<div class="ecom-products-item">
									<div class="ecom-products-item-img">
										<a href="#">
											<img src="/wp-content/uploads/2023/05/Product-5.jpg" alt="Featured Product" class="b2-img-responsive">
										</a>
										<ul class="ecom-products-item-options">
											<li>
												<a href="#"><i class="fa-solid fa-plus"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-solid fa-eye"></i></a>
											</li>
											<li>
												<a href="#"><i class="fa-regular fa-heart"></i></a>
											</li>
										</ul>
									</div>
									<div class="ecom-products-item-dets b2-text-center">
										<h4>Product Name</h4>
										<h5>Category</h5>
										<p>$46.00</p>
									</div>
								</div>
							</div>
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
	</main><!-- #main -->

<?php
get_footer();
