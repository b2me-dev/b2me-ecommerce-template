(function() {

	var shortcode = {
		initialize: function() {
			this.homepageSlideshow();
			this.partners();
		},
		homepageSlideshow: function() {
			var slider = jQuery('.b2-hp-banner-slide'),
				autoplay = jQuery('.b2-hp-banner-slide').data('autoplay'),
				autoplay_settings = false,
				speed = jQuery('.b2-hp-banner-slide').data('speed'),
				speed_settings = speed + '000',
				fade = jQuery('.b2-hp-banner-slide').data('fade'),
				fade_settings = false,
				dots = jQuery('.b2-hp-banner-slide').data('dots'),
				dots_settings = false,
				arrows = jQuery('.b2-hp-banner-slide').data('arrows'),
				arrows_settings = false;

			// Check if arrows is added
			if (arrows == 'yes') {
				arrows_settings = true;
			} else {
				jQuery('.b2-hp-banner-arrows').addClass('b2-hidden');
			}

			// Check if dots is added
			if (dots == 'yes') dots_settings = true;

			// Check if fade is added
			if (fade == 'yes') fade_settings = true;

			// Check if autoplay is added
			if (autoplay == 'yes') autoplay_settings = true;
			
			// Create slider
            slider.not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
				fade: fade_settings,
                arrows: arrows_settings,
                prevArrow: '.b2-hp-banner-arrows .prev',
                nextArrow: '.b2-hp-banner-arrows .next',
				autoplay: autoplay_settings,
				autoplaySpeed: speed_settings,
				dots: dots_settings,
				appendDots: '.b2-hp-banner-dots',
				pauseOnHover: false,
            });
		},
		partners: function() {
			var slider = jQuery('.b2-partners-slide'),
				autoplay = jQuery('.b2-partners-slide').data('autoplay'),
				autoplay_settings = false,
				speed = jQuery('.b2-partners-slide').data('speed'),
				speed_settings = speed + '000',
				slides_to_show = jQuery('.b2-partners-slide').data('slides-to-show');

			// Check if autoplay is added
			if (autoplay == 'yes') autoplay_settings = true;
			
			// Create slider
            slider.not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: slides_to_show,
                slidesToScroll: 1,
				fade: false,
                arrows: false,
				autoplay: autoplay_settings,
				autoplaySpeed: speed_settings,
				pauseOnHover: false,
				responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 2,
                        }
                    },
                ]
            });
		},
	}

	jQuery(document).ready(function() {
		shortcode.initialize();
	});

}());