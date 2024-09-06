<!doctype html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<link rel="profile" href="https://gmpg.org/xfn/11">

		<!-- Initial Scale -->
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">

		<!-- Google Fonts -->
		<link rel="preconnect" href="https://fonts.googleapis.com">
		<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

		<!-- Mobile Theme -->
		<meta name="theme-color" content="#EB9E99">
		<meta name="msapplication-navbutton-color" content="#EB9E99">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<div id="page" class="site">
			<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'b2me-master-theme' ); ?></a>

			<div class="b2-mh-wrap b2-hide-desktop">
				<div class="b2-mh-top-bar">
					<div class="b2-mh-top-bar-col col-logo">
						<a href="<?= get_site_url(); ?>" title="<?= get_bloginfo(); ?>">
							<img src="/wp-content/uploads/2023/05/LOGO.jpg" alt="<?= get_bloginfo(); ?>" class="b2-img-responsive">
						</a>
					</div>
					<div class="b2-mh-top-bar-col col-menu">
						<ul class="mh-nav">
							<li>
								<a href="/product-category/body/" title="Body">Body</a>
							</li>
							<li>
								<a href="/product-category/face/" title="Face">Face</a>
							</li>
							<li>
								<a href="/product-category/hands/" title="Hands">Hands</a>
							</li>
							<li>
								<a href="/product-category/latest/" title="Latest">Latest</a>
							</li>
						</ul>
						<div class="mh-cart">
							<i class="fa-solid fa-cart-shopping"></i>
							<?php
								if ( function_exists( 'b2me_starter_theme_ecommerce_woocommerce_header_cart' ) ) {
									b2me_starter_theme_ecommerce_woocommerce_header_cart();
								}
							?>
						</div>
					</div>
				</div>
			</div>

			<header id="masthead" class="b2-hide-mobile">
				<div class="header-promo-banner b2-text-white">
					<div class="b2-inner-content">
						<div class="b2-row v-center">
							<div class="b2-col col-2">
								<a href="mailto:care@serene.com.au" title="Send an Email" rel="nofollow" class="b2-text-white">care@serene.com.au</a>
							</div>
							<div class="b2-col col-8 b2-text-center">
								<p>Free shipping on national orders of $100+</p>
							</div>
							<div class="b2-col col-2 b2-text-right">
								<a href="https://www.b2me.marketing/" title="Return to B2Me Marketing" class="b2-text-white">Return to B2Me Marketing</a>
							</div>
						</div>
					</div>
				</div>
				<div class="header-main">
					<div class="b2-inner-content">
						<div class="b2-row v-center">
							<div class="b2-col col-2"></div>
							<div class="b2-col col-8 b2-text-center">
								<nav class="main-navigation">
									<ul class="headernav">
										<li>
											<a href="/product-category/body/" title="Body">Body</a>
										</li>
										<li>
											<a href="/product-category/face/" title="Face">Face</a>
										</li>
									</ul>
									<div class="header-logo">
										<a href="<?= get_site_url(); ?>" title="<?= get_bloginfo(); ?>">
											<img src="/wp-content/uploads/2023/05/LOGO.jpg" alt="<?= get_bloginfo(); ?>" class="b2-img-responsive">
										</a>
									</div>
									<ul class="headernav">
										<li>
											<a href="/product-category/hands/" title="Hands">Hands</a>
										</li>
										<li>
											<a href="/product-category/latest/" title="Latest">Latest</a>
										</li>
									</ul>
								</nav>
							</div>
							<div class="b2-col col-2 b2-text-right">
								<ul class="header-links">
									<!-- <li>
										<a href="#" title="Search"><i class="fa-solid fa-magnifying-glass"></i></a>
									</li>
									<li>
										<a href="#" title="Favorites"><i class="fa-regular fa-heart"></i></a>
									</li> -->
									<li>
										<i class="fa-solid fa-cart-shopping"></i>
										<?php
											if ( function_exists( 'b2me_starter_theme_ecommerce_woocommerce_header_cart' ) ) {
												b2me_starter_theme_ecommerce_woocommerce_header_cart();
											}
										?>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</header>

			<div class="floating-notice">
				<p>Successfully added to cart!</p>
				<a href="#" title="Close"><i class="fa-solid fa-xmark"></i></a>
			</div>