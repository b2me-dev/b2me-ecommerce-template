<?php

	/* Built-in shortcodes for B2Me starter theme */

	class App_Shortcodes {

		public function __construct() {
			add_shortcode('b2-section', array($this, 'section'));
			add_shortcode('b2-content', array($this, 'content'));
			add_shortcode('b2-row', array($this, 'row'));
			add_shortcode('b2-col', array($this, 'column'));
			add_shortcode('b2-div', array($this, 'div'));
			add_shortcode('b2-heading', array($this, 'heading'));
			add_shortcode('b2-image', array($this, 'image'));
			add_shortcode('b2-link', array($this, 'link'));
			add_shortcode('b2-email', array($this, 'email'));
			add_shortcode('b2-phone', array($this, 'phone'));
			add_shortcode('b2-home-banner', array($this, 'slideshow'));
			add_shortcode('b2-banner-image', array($this, 'bannerimage'));
			add_shortcode('b2-partners-slider', array($this, 'partners'));
			add_shortcode('b2-partners-logo', array($this, 'partnerslogo'));
			add_shortcode('b2-faq-item', array($this, 'faq'));
			add_shortcode('b2-blogs', array($this, 'blogs'));
			add_shortcode('b2-sitemap', array($this, 'sitemap'));
			add_shortcode('b2-social', array($this, 'social'));
			add_shortcode('b2-sitename', array($this, 'sitename'));
			add_shortcode('b2-stylesheetdirectory', array($this, 'stylesheetdirectory'));
		}

		public function section($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'id' => '',
				'animate' => '',
				'animate-duration' => '',
			), $attr);
	
			$element_id = '';
			$element_animate = '';

			// Check if has id
			if ($attr['id'] != '') {
				$element_id = 'id="'. $attr['id'] .'"';
			}
	
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'"';
			}
	
			// Construct HTML
			$html = '<section class="'. $attr['class'] .'" '. $element_id .' '. $element_animate .'>
				' . do_shortcode( $content ) . '
			</section>';
	
			return $html;
		}

		public function content($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'id' => '',
				'animate' => '',
				'animate-duration' => '',
			), $attr);

			$element_id = '';
			$element_animate = '';
	
			// Check if has id
			if ($attr['id'] != '') {
				$element_id = 'id="'. $attr['id'] .'"';
			}
	
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'"';
			}
	
			// Construct HTML
			$html = '<div class="b2-inner-content '. $attr['class'] .'" '. $element_id .' '. $element_animate .'>
				' . do_shortcode( $content ) . '
			</div>';
	
			return $html;
		}

		public function row($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'spacing' => '',
				'aligncenter' => '',
			), $attr);

			$alignment = '';
			if ($attr['aligncenter'] == 'yes') {
				$alignment = 'v-center';
			}

			// Construct HTML
			$html = '<div class="b2-row '. $attr['spacing'] .' '. $alignment .' '. $attr['class'] .'">
				' . do_shortcode( $content ) . '
			</div>';
	
			return $html;
		}

		public function column($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'size' => '',
			), $attr);

			// Construct HTML
			$html = '<div class="b2-col col-'. $attr['size'] .' '. $attr['class'] .'">
				' . do_shortcode( $content ) . '
			</div>';
	
			return $html;
		}

		public function div($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'animate' => '',
				'animate-duration' => '',
			), $attr);

			// Check if has animation
			$element_animate = '';
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'"';
			}
	
			// Construct HTML
			$html = '<div class="'. $attr['class'] .'" '. $element_animate .'>
				' . do_shortcode( $content ) . '
			</div>';
	
			return $html;
		}

		public function heading($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'size' => '',
				'pre-heading' => '',
				'animate' => '',
				'animate-duration' => '',
			), $attr);

			$element_animate = '';
			$pre_heading = '';
			$element = 'h'. $attr['size'];

			// Check if has pre-heading
			if ($attr['pre-heading'] != '') {
				$pre_heading = '<span>'. $attr['pre-heading'] .'</span>';
			}

			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'"';
			}

			// Construct HTML
			$html = '<'. $element .' class="'.$attr['class'].'" '. $element_animate .'>
				'. $pre_heading .'
				' . do_shortcode( $content ) . '
			</'. $element .'>';
	
			return $html;
		}

		public function image($attr) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'source' => '',
				'description' => '',
				'animate' => '',
				'animate-duration' => '',
			), $attr);

			$element_animate = '';

			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'"';
			}

			// Construct HTML
			$html = '<img src="'. $attr['source'] .'" alt="'. $attr['description'] .'" class="'.$attr['class'].'" '. $element_animate .'>';
	
			return $html;
		}

		public function link($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'href' => '',
				'target' => '',
				'animate' => '',
				'animate-duration' => '',
			), $attr);

			$element_animate = '';
			$element_target = '';

			// Check if has target
			if ($attr['target'] != '') {
				$element_target = 'target="'. $attr['target'] .'"';
			}

			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'"';
			}

			// Construct HTML
			$html = '<a href="'. $attr['href'] .'" '. $element_target .' class="'.$attr['class'].'" '. $element_animate .'>
				' . do_shortcode( $content ) . '
			</a>';
	
			return $html;
		}

		public function email($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'animate' => '',
				'animate-duration' => '',
			), $attr);

			$element_animate = '';

			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'"';
			}

			// Construct HTML
			$html = '<a href="mailto:'. $content .'" title="Send an email to '. $content .'" rel="nofollow" class="'.$attr['class'].'" '. $element_animate .'>
				' . $content . '
			</a>';
	
			return $html;
		}

		public function phone($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'animate' => '',
				'animate-duration' => '',
			), $attr);

			// Remove spacing
			$phone = str_replace(' ', '', $content);

			$element_animate = '';
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'"';
			}

			// Construct HTML
			$html = '<a href="tel:'. $phone .'" title="Call '. $phone .'" rel="nofollow" class="'.$attr['class'].'" '. $element_animate .'>
				' . $content . '
			</a>';
	
			return $html;
		}

		public function slideshow($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'fade' => '',
				'autoplay' => '',
				'speed' => '',
				'dots' => '',
				'arrows' => '',
			), $attr);

			// Construct settings
			$slider_fade = 'data-fade="'. $attr['fade'] .'"';
			$slider_autoplay = 'data-autoplay="'. $attr['autoplay'] .'"';
			$slider_speed = 'data-speed="'. $attr['speed'] .'"';
			$slider_dots = 'data-dots="'. $attr['dots'] .'"';
			$slider_arrows = 'data-arrows="'. $attr['arrows'] .'"';
	
			// Construct HTML
			$html = '<div class="b2-hp-banner">
				<div class="b2-hp-banner-slide '. $attr['class'] .'" '. $slider_fade .' '. $slider_autoplay .' '. $slider_speed .' '. $slider_dots .' '. $slider_arrows .'>
				' . do_shortcode( $content ) . '
				</div>
				<div class="b2-hp-banner-arrows">
					<span class="prev">
						<i class="fa-solid fa-angle-left"></i>
					</span>
					<span class="next">
						<i class="fa-solid fa-angle-right"></i>
					</span>
				</div>
				<div class="b2-hp-banner-dots"></div>
			</div>';
	
			return $html;
		}

		public function bannerimage($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'src' => '',
				'link-text' => '',
				'link-url' => '',
			), $attr);
	
			// Construct HTML
			$html = '<div>
				<div class="b2-hp-banner-slide-item">
					<canvas width="1920" height="1080" style="background-image: url('. $attr['src'] .')"></canvas>
					<div>
						'. do_shortcode( $content ) .'
						<a href="'. $attr['link-url'] .'" title="' . $attr['link-text'] . '" class="b2-link">' . $attr['link-text'] . '</a>
					</div>
				</div>
			</div>';
	
			return $html;
		}

		public function partners($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'autoplay' => '',
				'speed' => '',
				'slides-to-show' => '',
			), $attr);

			// Construct settings
			$slider_autoplay = 'data-autoplay="'. $attr['autoplay'] .'"';
			$slider_speed = 'data-speed="'. $attr['speed'] .'"';
			$slider_slidestoshow = 'data-slides-to-show="'. $attr['slides-to-show'] .'"';
	
			// Construct HTML
			$html = '<div class="b2-partners">
				<div class="b2-partners-slide '. $attr['class'] .'" '. $slider_autoplay .' '. $slider_speed .' '. $slider_slidestoshow .'>
				' . do_shortcode( $content ) . '
				</div>
			</div>';
	
			return $html;
		}

		public function partnerslogo($attr) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'src' => '',
				'company' => '',
				'link' => '',
				'target' => '',
			), $attr);

			$element_target = '';
			$element_link = '#';
			$element_has_link = 'no-link';

			// Check if has target
			if ($attr['target'] != '') {
				$element_target = 'target="'. $attr['target'] .'"';
			}

			// Check if has link
			if ($attr['link'] != '#') {
				$element_has_link = 'has-link';
				$element_link = $attr['link'];
			}

			// Construct HTML
			$html = '<div>
				<div class="b2-partners-item">
					<a href="'. $element_link .'" class="'. $element_has_link .'" '. $element_target .'>
						<img src="'. $attr['src'] .'" alt="'. $attr['company'] .'" class="b2-img-responsive '. $attr['class'] .'">
					</a>
				</div>
			</div>';
	
			return $html;
		}

		public function faq($attr, $content = null) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'question' => '',
				'animate' => '',
				'animate-duration' => '',
			), $attr);

			$element_animate = '';
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'"';
			}

			$stripped_content = strip_tags($content);
	
			// Construct HTML
			$html = '<div class="b2-faq-item '. $attr['class'] .' '. $element_animate .'">
				<div class="b2-faq-item-q tab-close">
					<p>'. $attr['question'] .'</p>
					<i class="fa-solid fa-angle-up"></i>
				</div>
				<div class="b2-faq-item-a">
					'. $content .'
				</div>
				<script type="application/ld+json">
					{
						"@context": "https://schema.org",
						"@type": "FAQPage",
						"mainEntity": {
							"@type": "Question",
							"name": "'. $attr['question'] .'",
							"acceptedAnswer": {
							"@type": "Answer",
							"text": "'. $stripped_content .'"
							}
						}
					}
				</script>
			</div>';
	
			return $html;
		}

		public function blogs($attr) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'limit' => '',
				'category' => '',
				'show-image' => '',
				'excerpt-limit' => '',
				'animate' => '',
				'animate-duration' => '',
			), $attr);

			$element_animate = '';
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'"';
			}

			// Query
			$query = new WP_Query([
				'post_type' => 'post',
				'posts_per_page' => $attr['limit'],
				'category_name' => $attr['category'],
			]);

			$blogs = '';

			if ( $query->have_posts() ) :
				while ( $query->have_posts() ) :
					$query->the_post();

					$title = get_the_title();
					$featured_img_url = get_the_post_thumbnail_url(get_the_ID(),'full');
					$image_element = '';
					$content = substr(strip_tags(get_the_content()), 0, $attr['excerpt-limit']);
					$link = get_the_permalink();
					$post_date = get_the_date( 'Y M j' );

					if ($attr['show-image'] == 'yes') {
						$image_element = '<div class="b2-blog-item-image" '. $element_animate .'>
							<canvas height="200" style="background-image: url('. $featured_img_url .')"></canvas>
						</div>';
					}

					$blogs .= '<div class="b2-col col-3">
						<div class="b2-blog-item">
							<a href="'. $link .'" title="'. $title .'">
								'. $image_element .'
								<div class="b2-blog-item-details">
									<h3>'. $title .'</h3>
									<p>'. $content .'...</p>
									<span class="b2-link">Read Article</span>
								</div>
							</a>
						</div>
						<script type="application/ld+json">
							{
								"@context": "https://schema.org",
								"@type": "BlogPosting",
								"mainEntityOfPage": {
									"@type": "WebPage",
									"@id": "'. $link .'"
								},
								"headline": "'. $title .'",
								"description": "'. $content .'",
								"image": [
									"'. $featured_img_url .'"
								],  
								"datePublished": "'. $post_date .'"
							}
						</script>
					</div>';

				endwhile;
			endif;
	
			// Construct HTML
			$html = '<div class="b2-blogs">
				<div class="b2-row">
					'. $blogs .'
				</div>
			</div>';
	
			return $html;
		}

		public function sitemap($attr) {
			// Options
			$attr = shortcode_atts(array(
				'hide-pages' => '',
			), $attr);

			$list = '';
  			$pages = get_pages();
			$hide_arr = explode(',', $attr['hide-pages']);

  			foreach ( $pages as $page ) {
				$children = get_pages( array( 'child_of' => $page->ID ) );
				$children_count = count($children);
				$sub_list = '';
				$child_pages = '';

				if ($children_count > 0) {
					foreach ( $children as $sub_page ) {
						$sub_list .= '<li data-page-id="'. $sub_page->ID .'">
							<a href="' . get_page_link( $sub_page->ID ) . '" title="'. $sub_page->post_title .'">'. $sub_page->post_title .'</a>
						</li>';
					}

					$child_pages = '<ul class="b2-sitemap-child">
						'. $sub_list .'
					</ul>';
				}

				if (!in_array($page->ID, $hide_arr)) {
					if (!$page->post_parent) {
						$list .= '<li data-page-id="'. $page->ID .'">
							<a href="' . get_page_link( $page->ID ) . '" title="'. $page->post_title .'">'. $page->post_title .'</a>
							'. $child_pages .'
						</li>';
					}
				}
  			}

			// Construct HTML
			$html = '<ul class="b2-sitemap">
				'. $list .'
			</ul>';
	
			return $html;
		}

		public function social($attr) {
			// Options
			$attr = shortcode_atts(array(
				'class' => '',
				'platform' => '',
				'url' => '',
				'animate' => '',
				'animate-duration' => '',
			), $attr);

			$icon = '';
			switch ($attr['platform']) {
				case 'Facebook':
					$icon = 'facebook-f';
				break;
				case 'Twitter':
					$icon = 'twitter';
				break;
				case 'LinkedIn':
				case 'Linkedin':
					$icon = 'linkedin-in';
				break;
				case 'Instagram':
					$icon = 'instagram';
				break;
				case 'YouTube':
				case 'Youtube':
					$icon = 'youtube';
				break;
			}

			$element_animate = '';
			// Check if has animation
			if ($attr['animate'] != '') {
				$element_animate = 'data-aos="'. $attr['animate'] .'" data-aos-once="true" data-aos-duration="'. $attr['animate-duration'] .'"';
			}

			// Construct HTML
			$html = '<a href="'. $attr['url'] .'" title="'. $attr['platform'] .'" target="_blank" class="b2-social '. $attr['class'] .'" '. $element_animate .'>
				<i class="fa-brands fa-'. $icon .'"></i>
			</a>';
	
			return $html;
		}

		public function sitename() {
			$site_name = get_bloginfo();
			return $site_name;
		}

		public function stylesheetdirectory() {
			$theme_dir = get_stylesheet_directory_uri();
			return $theme_dir;
		}
	}

	new App_Shortcodes();