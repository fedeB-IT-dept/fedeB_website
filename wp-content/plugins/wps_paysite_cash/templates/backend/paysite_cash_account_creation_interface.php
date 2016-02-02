<div class="wps-h5"><?php _e( 'Create your merchant account on Paysite Cash', 'wps_paysite_cash'); ?></div>
<?php $country_list = unserialize(WPSHOP_COUNTRY_LIST); ?>

<div class="wps-row wps-gridwrapper3-padded">
	<!-- Status -->
	<div class="wps-form-group">
		<label><?php _e( 'Status', 'wps_paysite_cash'); ?><em>*</em></label>
		<div class="wps-form">
			<select name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][status]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_status">
				<option value="individual" <?php echo( ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['status']) && $paysite_cash_config['merchant_account_informations']['status'] == 'individual' ) ? 'selected="selected"' : '' ); ?> ><?php _e( 'Individual', 'wps_paysite_cash'); ?></option>
				<option value="company" <?php echo( ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['status']) && $paysite_cash_config['merchant_account_informations']['status'] == 'company' ) ? 'selected="selected"' : '' ); ?> ><?php _e( 'Company', 'wps_paysite_cash'); ?></option>
			</select>
		</div>
	</div>
	
	<!-- First name -->
	<div class="wps-form-group">
		<label><?php _e( 'Firstname', 'wps_paysite_cash'); ?><em>*</em></label>
		<div class="wps-form">
			<input type="text" name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][firstname]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_firstname" value="<?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['firstname']) )  ? $paysite_cash_config['merchant_account_informations']['firstname'] : ''; ?>" />
		</div>
	</div>
	
	<!-- Last name -->
	<div class="wps-form-group">
		<label><?php _e( 'Lastname', 'wps_paysite_cash'); ?><em>*</em></label>
		<div class="wps-form">
			<input type="text" name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][lastname]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_lastname" value="<?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['lastname']) )  ? $paysite_cash_config['merchant_account_informations']['lastname'] : ''; ?>" />
		</div>
	</div>
	
</div>

<div id="company_extra_infos">
	<div class="wps-row wps-gridwrapper3-padded">
	
		<!-- Company name -->
		<div class="wps-form-group">
			<label><?php _e( 'Company name', 'wps_paysite_cash'); ?><em>*</em> <span class="wps-help-inline wps-help-inline-title"></label>
			<div class="wps-form">
				<input type="text" name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][company_name]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_company_name" value="<?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['company_name']) )  ? $paysite_cash_config['merchant_account_informations']['company_name'] : ''; ?>" />
			</div>
		</div>
		
		
		<!-- Registration company country ISO Code -->
		<div class="wps-form-group">
			<label><?php _e( 'Registration country', 'wps_paysite_cash'); ?><em>*</em></label>
			<div class="wps-form">
				<select name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][registration_country]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_registration_country">
					<?php if( !empty($country_list) ) : ?>
					<?php foreach( $country_list as $country_code => $country ) : ?>
						<option value="<?php echo $country_code; ?>" <?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['registration_country']) &&  $paysite_cash_config['merchant_account_informations']['registration_country'] == $country_code )  ? 'selected="selected"' : ''; ?>><?php echo $country; ?></option>
					<?php endforeach; ?>
					<?php endif;?>
				</select>
			</div>
		</div>
		
		<!-- Residence director country ISO Code -->
		<div class="wps-form-group">
			<label><?php _e( 'Director\'s country residence', 'wps_paysite_cash'); ?><em>*</em></label>
			<div class="wps-form">
				<select name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][director_residence]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_director_residence">
					<?php if( !empty($country_list) ) : ?>
					<?php foreach( $country_list as $country_code => $country ) : ?>
						<option value="<?php echo $country_code; ?>" <?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['director_residence']) &&  $paysite_cash_config['merchant_account_informations']['director_residence'] == $country_code )  ? 'selected="selected"' : ''; ?>><?php echo $country; ?></option>
					<?php endforeach; ?>
					<?php endif;?>
				</select>
			</div>
		</div>
	</div>
	
	<!-- VAT Number -->
	<div class="wps-form-group">
		<label><?php _e( 'Company Intra-community VAT number', 'wps_paysite_cash'); ?></label>
		<div class="wps-form">
			<input type="text" name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][vat_number]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_vat_number" value="<?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['vat_number']) )  ? $paysite_cash_config['merchant_account_informations']['vat_number'] : ''; ?>" />
		</div>
	</div>
</div>


<!-- Postal address -->
<div class="wps-form-group">
	<label><?php _e( 'Postal address', 'wps_paysite_cash'); ?><em>*</em></label>
	<div class="wps-form">
		<input type="text" name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][postal_address]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_postal_address" value="<?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['postal_address']) )  ? $paysite_cash_config['merchant_account_informations']['postal_address'] : ''; ?>" />
	</div>
</div>

<div class="wps-row wps-gridwrapper3-padded">

	<!-- ZIP Code -->
	<div class="wps-form-group">
		<label><?php _e( 'ZIP Code', 'wps_paysite_cash'); ?><em>*</em></label>
		<div class="wps-form">
			<input type="text" name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][zip_code]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_zip_code" value="<?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['zip_code']) )  ? $paysite_cash_config['merchant_account_informations']['zip_code'] : ''; ?>" />
		</div>
	</div>

	<!-- City -->
	<div class="wps-form-group">
		<label><?php _e( 'City', 'wps_paysite_cash'); ?><em>*</em></label>
		<div class="wps-form">
			<input type="text" name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][city]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_city" value="<?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['city']) )  ? $paysite_cash_config['merchant_account_informations']['city'] : ''; ?>" />
		</div>
	</div>
	
	<!-- Country -->
	<div class="wps-form-group">
		<label><?php _e( 'Country', 'wps_paysite_cash'); ?><em>*</em></label>
		<div class="wps-form">
			<select name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][country]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_country">
				<?php if( !empty($country_list) ) : ?>
				<?php foreach( $country_list as $country_code => $country ) : ?>
					<option value="<?php echo $country_code; ?>" <?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['country']) &&  $paysite_cash_config['merchant_account_informations']['country'] == $country_code )  ? 'selected="selected"' : ''; ?>><?php echo $country; ?></option>
				<?php endforeach; ?>
				<?php endif;?>
			</select>
		</div>
	</div>
	
</div>

<div class="wps-row wps-gridwrapper2-padded">
	
	<!-- Phone number -->
	<div class="wps-form-group">
		<label><?php _e( 'Phone number', 'wps_paysite_cash'); ?><em>*</em></label>
		<div class="wps-form">
			<input type="text" name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][phone]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_phone" value="<?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['phone']) )  ? $paysite_cash_config['merchant_account_informations']['phone'] : ''; ?>" />
		</div>
	</div>
	
	<!-- E-mail address -->
	<div class="wps-form-group">
		<label><?php _e( 'Email address', 'wps_paysite_cash'); ?><em>*</em></label>
		<div class="wps-form">
			<input type="text" name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][email]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_email" value="<?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['email']) )  ? $paysite_cash_config['merchant_account_informations']['email'] : ''; ?>" />
		</div>
	</div>
	
</div>

<!-- Business description -->
<div class="wps-form-group">
	<label><?php _e( 'Your business short description', 'wps_paysite_cash'); ?><em>*</em></label>
	<div class="wps-form">
		<input type="text" name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][description]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_description" value="<?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['description']) )  ? $paysite_cash_config['merchant_account_informations']['description'] : ''; ?>" />
	</div>
</div>

<div class="wps-row wps-gridwrapper2-padded">

	<!-- Username -->
	<div class="wps-form-group">
		<label><?php _e( 'Desired username', 'wps_paysite_cash'); ?><em>*</em> <span class="wps-help-inline wps-help-inline-title"><?php _e( '6 Chars min.', 'wps_paysite_cash')?></span></label>
		<div class="wps-form">
			<input type="text" name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][username]" id="wps_paysite_cash_paysite_cash_merchant_account_username" value="<?php echo ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['username']) )  ? $paysite_cash_config['merchant_account_informations']['username'] : ''; ?>" />
		</div>
	</div>
	
	
	<!-- Language -->
	<div class="wps-form-group">
		<label><?php _e( 'Language', 'wps_paysite_cash'); ?><em>*</em></label>
		<div class="wps-form">
			<select name="wps_payment_mode[mode][paysite_cash][params][merchant_account_informations][language]" id="wps_paysite_cash_paysite_cash_merchant_account_informations_language">
				<option value="fr" <?php echo( ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['language']) && $paysite_cash_config['merchant_account_informations']['language'] == 'fr' ) ? 'selected="selected"' : '' ); ?> ><?php _e( 'French', 'wps_paysite_cash'); ?></option>
				<option value="en" <?php echo( ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['language']) && $paysite_cash_config['merchant_account_informations']['language'] == 'en' ) ? 'selected="selected"' : '' ); ?> ><?php _e( 'English', 'wps_paysite_cash'); ?></option>
				<option value="it" <?php echo( ( !empty($paysite_cash_config['merchant_account_informations']) && !empty($paysite_cash_config['merchant_account_informations']['language']) && $paysite_cash_config['merchant_account_informations']['language'] == 'it' ) ? 'selected="selected"' : '' ); ?> ><?php _e( 'Italian', 'wps_paysite_cash'); ?></option>
			</select>
		</div>
	</div>
</div>


<div><center><a class="wps-bton-first-rounded" id="wps-paysite-cash-create-merchant-account"><?php _e( 'Save', 'wps_paysite_cash' ); ?></a></center></div>
<br/><br/>
<center><a href="https://merchant.paysite-cash.com/register.php?ref=329" target="_blank" class="wps-bton-mini-rounded-third"><?php _e( 'A problem to create your account ? Do it on Paysite Cash !', 'wps_paysite_cash'); ?> </a></center>