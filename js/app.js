(function() {

	var app = {
		initialize: function() {
			this.products();
            this.productDetailsGallery();
            this.productDetailsTab();
            this.variableProducts();
            this.quantityControl();
            this.addToCartNotif();
			AOS.init();
		},
		products: function() {
			var slider = jQuery('.ecom-products-slide');
            slider.not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: true,
                prevArrow: '.ecom-products-slide-arrows .prev',
                nextArrow: '.ecom-products-slide-arrows .next',
                responsive: [
                    {
                        breakpoint: 992,
                        settings: {
                            slidesToShow: 1,
                        }
                    },
                ]
            });
		},
        productDetailsGallery: function() {
			var main_slider = jQuery('.ecom-pd-dets-gallery-main-slide'),
                thumb_slider = jQuery('.ecom-pd-dets-gallery-thumb-slide');

            main_slider.not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
                autoplay: true,
                autoplaySpeed: 3000,
                pauseOnHover: false,
                fade: true,
                asNavFor: '.ecom-pd-dets-gallery-thumb-slide'
            });

            thumb_slider.not('.slick-initialized').slick({
                infinite: true,
                slidesToShow: 4,
                slidesToScroll: 1,
                arrows: false,
                pauseOnHover: false,
                asNavFor: '.ecom-pd-dets-gallery-main-slide',
                focusOnSelect: true
            });
		},
        productDetailsTab: function() {
            var tab_control = jQuery('.ecom-pd-tab .ecom-pd-tab-control li a');
            tab_control.click(function() {
                var target_panel = jQuery(this).attr('class');

                // Switch panel
                jQuery('.ecom-pd-tab-panel').removeClass('active-panel');
                jQuery('.ecom-pd-tab-panel#' + target_panel).addClass('active-panel');

                // Switch control
                jQuery('.ecom-pd-tab-control li a').removeClass('active-control');
                jQuery(this).addClass('active-control');
            });
        },
        variableProducts: function() {
            if (jQuery('.ecom-pd-dets-vars').length) {
                jQuery('.ecom-pd-dets-vars').change(function() {
                    var selected_option = jQuery(this).find('option:selected');
                    var selected_variation_id = selected_option.attr('id');
                    var selected_variation_price = selected_option.data('price');
                    
                    jQuery('.ecom-pd-addtocart').attr('href', '?add-to-cart=' + selected_variation_id);
                    jQuery('.ecom-pd-addtocart').attr('data-product_id', selected_variation_id);
                    jQuery('.ecom-pd-dets-price').html('<p>$' + selected_variation_price + '</p>');
                });
                
                jQuery('.ecom-pd-dets-vars').trigger('change');
            }
        },
        quantityControl: function() {
            var quantity_val_field = jQuery('.ecom-pd-qty input');
            var quantity_add = jQuery('.ecom-pd-qty .add');
            var quantity_less = jQuery('.ecom-pd-qty .less');
            
            quantity_add.click(function() {
                var quantity_count = quantity_val_field.val();
                quantity_count++;
                quantity_val_field.val(quantity_count);
                jQuery('.ecom-pd-addtocart').attr('data-quantity', quantity_count);
            });

            quantity_less.click(function() {
                var quantity_count = quantity_val_field.val();
                quantity_count = quantity_count - 1;
                quantity_val_field.val(quantity_count);
                jQuery('.ecom-pd-addtocart').attr('data-quantity', quantity_count);
            });
        },
        addToCartNotif: function() {
            // Show notif once cart updates
            var originalHtml = jQuery('.cart-contents').html();
            setInterval(function() {
                var currentHtml = jQuery('.cart-contents').html();
                if (originalHtml !== currentHtml) {
                    jQuery('.floating-notice').fadeIn();
                    originalHtml = currentHtml;
                }
            }, 500);

            // Close notif trigger
            var close_notif = jQuery('.floating-notice a');
            close_notif.click(function(e) {
                e.preventDefault();
                jQuery(this).parent().fadeOut();
            });
        }
	}

	jQuery(document).ready(function() {
		app.initialize();
	});

}());