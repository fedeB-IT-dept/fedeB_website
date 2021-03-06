jQuery( document ).ready( function() {
	/** Add siple product in order back-office panel **/
	jQuery( document ).on( 'click', '.wps-order-add-product', function( e ) {
			e.preventDefault();
			var pid = jQuery( this ).attr( 'id' ).replace( 'wps-order-add-product-', '' );
			var qty = jQuery( '#wps-cart-product-qty-' + pid ).val();

			jQuery( this ).addClass( 'wps-bton-loading' );
			var data = {
					action : "wps_add_product_to_order_admin",
					pid : pid,
					oid : jQuery( '#post_ID' ).val(),
					qty : qty
				};
				jQuery.post(ajaxurl, data, function(response){
					if(response['status']) {
						if( response['variations_exist'] ) {
							var link = ajaxurl + '?action=wps_order_load_product_variations&width=750&height=600&oid=' + jQuery( '#post_ID').val() + '&pid=' + pid + '&qty=' + qty;
							tb_show('Select variations', link ,'');
						}
						else {
							refresh_cart();
							jQuery( '.wps-order-add-product' ).removeClass( 'wps-bton-loading' );
						}
					}
					else {
						alert( response['response'] );
					}
				}, 'json');

	});

	/**
	 * Search a product by letter action
	 */
	jQuery( document ).on( 'click', '.search_product_by_letter', function( e ) {
		e.preventDefault();
		jQuery( this ).addClass( 'wps-bton-loading' );
		var letter = jQuery( this ).attr( 'id' );
		var data = {
				action: "wps_order_refresh_product_listing",
				letter : letter,
				oid : jQuery( '#post_ID' ).val()
			};
		jQuery.post(ajaxurl, data, function( response ){
				if ( response['status'] ) {
					jQuery( '#wps_orders_product_listing_table' ).animate( {'opacity' : 0.2}, 300, function() {
						jQuery('#wps_orders_product_listing_table').html( response['response'] );
						jQuery( '#wps_orders_product_listing_table' ).animate( {'opacity' : 1}, 500 );
						jQuery( '#' + letter).removeClass( 'wps-bton-loading');
						jQuery( '.search_product_by_letter' ).removeClass( 'third' );
						jQuery( '#' + letter).addClass( 'third' );
					});

				}
				else {
					jQuery( '#' + letter).removeClass( 'wps-bton-loading');
				}
		}, 'json');
	});

	/**
	 * Add qty in Product listing
	 */
	jQuery( document ).on( 'click', '.wps-cart-add-product-qty', function( e ) {
		e.preventDefault();
		var qty = parseInt( jQuery( this ).closest( 'div' ).children( '.wps-cart-product-qty' ).val() );
		qty += 1;
		jQuery( this ).closest( 'div' ).children( '.wps-cart-product-qty' ).val( qty );
		var product_id = jQuery( this ).closest( 'div' ).children( '.wps-cart-product-qty' ).attr( 'id' ).replace( 'wps-cart-product-qty-', '' );
		if( jQuery( this ).closest( 'div' ).hasClass( 'wps-cart-item-quantity' ) ) {
			update_order_product_content(product_id, qty );
		}
	});

	/** Reduce Qty in product listing **/
	jQuery( document ).on( 'click', '.wps-cart-reduce-product-qty', function( e ) {
		e.preventDefault();
		var qty = parseInt( jQuery( this ).closest( 'div' ).children( '.wps-cart-product-qty' ).val() );
		var value = qty - 1;
		if( value < 1 ) {
			value = 1;
		}
		jQuery( this ).closest( 'div' ).children( '.wps-cart-product-qty' ).val( value );
		var product_id = jQuery( this ).closest( 'div' ).children( '.wps-cart-product-qty' ).attr( 'id' ).replace( 'wps-cart-product-qty-', '' );
		if( jQuery( this ).closest( 'div' ).hasClass( 'wps-cart-item-quantity' ) ) {
			update_order_product_content(product_id, value );
		}
	});

	/** Delete a product **/
	jQuery( document ).on( 'click', '.wps_cart_delete_product', function() {
		var id = jQuery( this ).attr( 'id' ).replace( 'wps-close-', '' );
		// Refresh Product qty
		update_order_product_content( id, 0 );
	});

	/**
	 * Add Variation product to order
	 */
	jQuery( document ).on( 'click', '.wps-orders-add_variation_product', function( e ) {
		e.preventDefault();
		var form_options_add_to_cart = {
				dataType: 'json',
				before : jQuery( '.wps-orders-add_variation_product' ).addClass( 'wps-bton-loading' ),
				success : function() {
					jQuery( '.tb-close-icon' ).click();
					jQuery( '.wps-orders-add_variation_product' ).removeClass( 'wps-bton-loading' );
					jQuery( '.wps-order-add-product' ).removeClass( 'wps-bton-loading' );
					jQuery( 'html, body' ).animate( {scrollTop : jQuery( '#wpshop_order_content' ).offset().top }, 350 );
					refresh_cart();
					reload_mini_cart();
					reload_summary_cart();
					reload_wps_cart();
				}
			};
		jQuery('#wpshop_add_to_cart_form').ajaxForm(form_options_add_to_cart);
		jQuery('#wpshop_add_to_cart_form').submit();
	});


	/** Custom Shipping cost **/
	jQuery( document ).on( 'keyup', '#wps-orders-shipping-cost, #wps-orders-discount-value', function( e ) {
		if( jQuery.isNumeric( jQuery( this ).val() ) ) {
			jQuery( this ).closest( '.wps-form-group').removeClass( 'wps-error' );
			jQuery( '#wps-orders-update-cart-informations' ).show();
		}
		else {
			if( jQuery( this ).val() != '' ) {
				jQuery( this ).closest( '.wps-form-group').addClass( 'wps-error' );
				jQuery( '#wps-orders-update-cart-informations' ).hide();
			}
		}
	});

	/**
	 * Update Cart informations in order
	 */
	jQuery( document ).on( 'click', '#wps-orders-update-cart-informations', function(e) {
		e.preventDefault();
		jQuery( this ).addClass( 'wps-bton-loading' );
		var data = {
				action: "wps-orders-update-cart-informations",
				order_id : jQuery( '#post_ID' ).val(),
				shipping_cost : jQuery( '#wps-orders-shipping-cost').val(),
				discount_amount : jQuery( '#wps-orders-discount-value').val(),
				discount_type : jQuery( '#wps-orders-discount-type').val()
			};
		jQuery.post(ajaxurl, data, function( response ){
				if ( response['status'] ) {
					refresh_cart();
				}
				else {
					alert( 'An error was occured' );
				}
		}, 'json');
	});


	/** Success actions of Ajax form **/
	function function_after_form_success() {
		jQuery( '.tb-close-icon' ).click();
		var data = {
				action: "wps_order_refresh_in_admin",
				order_id : jQuery( '#post_ID' ).val()
			};
		jQuery.post(ajaxurl, data, function( response ){
				if ( response['status'] ) {
					jQuery('#order_product_container').html( response['response'] );
				}
		}, 'json');

		jQuery( '.add_to_cart_loader' ).hide();
	}


	/**
	 * Update product qty in Cart order back-office panel
	 */
	function update_order_product_content(product_id, qty ){
		jQuery( '#wps_cart_container').addClass( 'wps-bloc-loading' );
		var data = {
				action: "wps_update_product_qty_in_admin",
				order_id : jQuery( '#post_ID').val(),
				product_id : product_id,
				qty : qty,
			};
		jQuery.post(ajaxurl, data, function(response){
			if ( response['status'] ) {
				refresh_cart();
			}
		}, 'json');
	}


	/**
	 * Add Private comment to order
	 */
	jQuery( document ).on( 'click', '.addPrivateComment', function( e ) {
		e.preventDefault();
		var _this = jQuery(this);
		var this_class = _this.attr('class').split(' ');
		var oid = this_class[2].substr(6);
		var comment = jQuery('textarea[name=order_private_comment]').val();
		var send_email = jQuery('input[name=send_email]').attr('checked')=='checked';
		var copy_to_administrator = jQuery('input[name=copy_to_administrator]').attr('checked')=='checked';

		jQuery( '.addPrivateComment' ).addClass( 'wps-bton-loading' );

		var data = {
				action: "wpshop_add_private_comment_to_order",
				comment : comment,
				oid : oid,
				send_email : send_email,
				copy_to_administrator : copy_to_administrator
			};
			jQuery.post(ajaxurl, data, function(response){
				if(response['status']) {
					jQuery( '#wps_private_messages_container').fadeOut( 'slow', function() {
						jQuery( '#wps_private_messages_container').html( response['response'] );
						jQuery( '#wps_private_messages_container').fadeIn('slow');
						jQuery('textarea[name=order_private_comment]').val('');
					});
					jQuery( '.addPrivateComment' ).removeClass( 'wps-bton-loading' );
				}
				else {
					alert( response['response'] );
					jQuery( '.addPrivateComment' ).removeClass( 'wps-bton-loading' );
				}
			}, 'json');
	});

});


/**
 * Refresh cart in back-office order panel
 */
function refresh_cart() {
	jQuery( '#wps_cart_container').addClass( 'wps-bloc-loading' );
	var data = {
			action: "wps_refresh_cart_order",
			order_id : jQuery( '#post_ID').val(),
		};
		jQuery.post(ajaxurl, data, function(response){
			if ( response['status'] ) {
				jQuery('#wpshop_order_content .inside').html( response['response'] );
			}
			else {
				jQuery( '#wps_cart_container').removeClass( 'wps-bloc-loading' );
			}
		}, 'json');
}