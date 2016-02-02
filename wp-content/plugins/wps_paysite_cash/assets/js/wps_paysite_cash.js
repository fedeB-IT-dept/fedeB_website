jQuery( document ).ready( function() {
	jQuery( '#company_extra_infos' ).hide();
	jQuery( '#wps_paysite_cash_creation_account_container' ).hide();
	
	/** Display company extra fields **/
	jQuery( document ).on( 'change', '#wps_paysite_cash_paysite_cash_merchant_account_informations_status', function() {
		if( jQuery( this ).val() == 'company' ) {
			jQuery( '#company_extra_infos' ).slideDown( 'slow' );
		}	
		else {
			jQuery( '#company_extra_infos' ).slideUp( 'slow' );
		}
	});
	
	if( jQuery( this ).val() == 'company' ) {
		jQuery( '#company_extra_infos' ).slideDown( 'slow' );
	}	
	else {
		jQuery( '#company_extra_infos' ).slideUp( 'slow' );
	}
	
	jQuery( document ).on( 'click', '.create_paysite_cash_interface_opener', function() {
		jQuery( '#wps_paysite_cash_creation_account_container' ).slideDown( 'slow' );
	});
	
	
	/**
	 * Save Merchant value
	 */
	jQuery( document ).on( 'click', '#wps-paysite-cash-create-merchant-account', function(e) {
		e.preventDefault();
		jQuery( this ).addClass( 'wps-bton-loading' );	
		var data = {
				action: "wps_paysite_cash_create_account", 
				status : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_status').val(),
				firstname : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_firstname').val(),
				lastname : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_lastname').val(),
				company_name : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_company_name').val(),
				registration_country : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_registration_country').val(),
				director_residence : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_director_residence').val(),
				vat_number : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_vat_number').val(),
				address : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_postal_address').val(),
				zip_code : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_zip_code').val(),
				city : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_city').val(),
				country : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_country').val(),
				phone : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_phone').val(),
				email : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_email').val(),
				description : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_description').val(),
				username : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_username').val(),
				language : jQuery( '#wps_paysite_cash_paysite_cash_merchant_account_informations_language').val(),
					
			};
			jQuery.post(ajaxurl, data, function(response){
				if ( response['status'] ) {
					if( response['website_id'] != '' ) {
						jQuery('#wps_payment_mode_paysite_cash_site_id').val( response['website_id'] );
						jQuery('.wps_save_payment_mode_configuration').click();
					}
					else {
						window.location.reload();
						jQuery( '#wps-paysite-cash-create-merchant-account' ).removeClass( 'wps-bton-loading' );	
					}
				}
				else {
					alert( response['response'] );
					jQuery( '#wps-paysite-cash-create-merchant-account' ).removeClass( 'wps-bton-loading' );	
				}
		}, 'json');
	});
});