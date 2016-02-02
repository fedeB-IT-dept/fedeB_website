<div class="wps-boxed">
	<?php $wps_paysite_cash_account = get_option( 'wps_paysite_cash_account_informations' ); 
	if( !empty($wps_paysite_cash_account) ) : ?>
	<?php require( wpshop_tools::get_template_part( WPS_PAYSITE_CASH_DIR, $this->template_dir, "backend", "paysite_cash_account_informations") ); ?>
	<?php else : ?>
		<div>
			<center><a href="#" class="wps-bton-mini-rounded-first create_paysite_cash_interface_opener"><?php _e( 'You do not have a Paysite cash account ?', 'wps_paysite_cash'); ?> <?php _e( 'Create it, it is free !', 'wps_paysite_cash'); ?></a></center><br/>
		</div>
		<div id="wps_paysite_cash_creation_account_container">
			<?php require( wpshop_tools::get_template_part( WPS_PAYSITE_CASH_DIR, $this->template_dir, "backend", "paysite_cash_account_creation_interface") );	?>
		</div>
	<?php endif; ?>
</div>

<div class="wps-boxed">
	<div class="wps-h5"><?php _e( 'Paysite Cash general configurations', 'wps_paysite_cash' ); ?></div>
	
	<div class="wps-gridwrapper2-padded">
		
		<div class="wps_form_group">
			<label><?php _e( 'Your Paysite Cash\'s site ID', 'wps_paysite_cash' ); ?></label>
			<div class="wps-form">
				<input type="text" name="wps_payment_mode[mode][paysite_cash][params][site_id]" id="wps_payment_mode_paysite_cash_site_id" value="<?php echo ( (!empty($paysite_cash_config)  && !empty( $paysite_cash_config['site_id'] )  ? $paysite_cash_config['site_id'] : '' ) ); ?>" />
			</div>
		</div>
	
		<div class="wps_form_group">
			<label><?php _e( 'Currency', 'wps_paysite_cash' ); ?></label>
			<div class="wps-form">
				<select name="wps_payment_mode[mode][paysite_cash][params][currency]">
					<option value="EUR" <?php echo ( ( empty($paysite_cash_config) )  || ( !empty($paysite_cash_config) && !empty($paysite_cash_config['currency']) && $paysite_cash_config['currency'] == 'EUR' ) ) ? 'selected="selected"' : '' ; ?>><?php _e( 'Euros (€)', 'wps_paysite_cash' ); ?></option>
					<option value="USD" <?php echo ( !empty($paysite_cash_config) && !empty($paysite_cash_config['currency']) && $paysite_cash_config['currency'] == 'USD'  ) ? 'selected="selected"' : '' ; ?>><?php _e( 'American Dollars ($)', 'wps_paysite_cash' ); ?></option>
					<option value="CHF" <?php echo ( !empty($paysite_cash_config) && !empty($paysite_cash_config['currency']) && $paysite_cash_config['currency'] == 'CHF'  ) ? 'selected="selected"' : '' ; ?>><?php _e( 'Swiss Franc (CHF)', 'wps_paysite_cash' ); ?></option>
					<option value="CAD" <?php echo ( !empty($paysite_cash_config) && !empty($paysite_cash_config['currency']) && $paysite_cash_config['currency'] == 'CAD'  ) ? 'selected="selected"' : '' ; ?>><?php _e( 'Canadian Dollars ($)', 'wps_paysite_cash' ); ?></option>
					<option value="GBP" <?php echo ( !empty($paysite_cash_config) && !empty($paysite_cash_config['currency']) && $paysite_cash_config['currency'] == 'GBP'  ) ? 'selected="selected"' : '' ; ?>><?php _e( 'Pound (£)', 'wps_paysite_cash' ); ?></option>
					<option value="LTL" <?php echo ( !empty($paysite_cash_config) && !empty($paysite_cash_config['currency']) && $paysite_cash_config['currency'] == 'LTL'  ) ? 'selected="selected"' : '' ; ?>><?php _e( 'Latvian Litas (LTL)', 'wps_paysite_cash' ); ?></option>
					<option value="RON" <?php echo ( !empty($paysite_cash_config) && !empty($paysite_cash_config['currency']) && $paysite_cash_config['currency'] == 'RON'  ) ? 'selected="selected"' : '' ; ?>><?php _e( 'Roman Lei (RON)', 'wps_paysite_cash' ); ?></option>
				</select>
			</div>
		</div>
	
	</div>
	
	<div class="wps-gridwrapper2-padded">
		<div class="wps_form_group">
			<label><?php _e( 'Lang', 'wps_paysite_cash' ); ?></label>
			<div class="wps-form">
				<select name="wps_payment_mode[mode][paysite_cash][params][lang]">
					<option value="fr" <?php echo ( ( empty($paysite_cash_config) )  || ( !empty($paysite_cash_config) && !empty($paysite_cash_config['lang']) && $paysite_cash_config['lang'] == 'fr' ) ) ? 'selected="selected"' : '' ; ?>><?php _e( 'French', 'wps_paysite_cash' ); ?></option>
					<option value="us" <?php echo ( !empty($paysite_cash_config) && !empty($paysite_cash_config['lang']) && $paysite_cash_config['lang'] == 'us'  ) ? 'selected="selected"' : '' ; ?>><?php _e( 'English', 'wps_paysite_cash' ); ?></option>
				</select>
			</div>
		</div>
		
		<div class="wps_form_group">
			<label><?php _e( 'Waiting confirmation before accept payment', 'wps_paysite_cash' ); ?></label>
			<div class="wps-form">
				<select name="wps_payment_mode[mode][paysite_cash][params][wait]">
					<option value="0" <?php echo ( ( empty($paysite_cash_config) )  || ( !empty($paysite_cash_config) && empty($paysite_cash_config['wait']) ) ) ? 'selected="selected"' : '' ; ?>><?php _e( 'No', 'wps_paysite_cash' ); ?></option>
					<option value="1" <?php echo ( !empty($paysite_cash_config) && !empty($paysite_cash_config['wait']) ) ? 'selected="selected"' : '' ; ?>><?php _e( 'Yes', 'wps_paysite_cash' ); ?></option>
				</select>
			</div>
		</div>
	</div>
	
	
	<div class="wps-gridwrapper2-padded">
		<div class="wps_form_group">
			<label><?php _e( 'Test mode', 'wps_paysite_cash' ); ?></label>
			<div class="wps-form">
				<select name="wps_payment_mode[mode][paysite_cash][params][mode]">
					<option value="0" <?php echo ( ( empty($paysite_cash_config) )  || ( !empty($paysite_cash_config) && empty($paysite_cash_config['mode']) ) ) ? 'selected="selected"' : '' ; ?>><?php _e( 'No', 'wps_paysite_cash' ); ?></option>
					<option value="1" <?php echo ( !empty($paysite_cash_config) && !empty($paysite_cash_config['mode']) ) ? 'selected="selected"' : '' ; ?>><?php _e( 'Yes', 'wps_paysite_cash' ); ?></option>
				</select>
			</div>
		</div>
	
		<div class="wps_form_group">
			<label><?php _e( 'Active Debug Mode', 'wps_paysite_cash' ); ?></label>
			<div class="wps-form">
				<select name="wps_payment_mode[mode][paysite_cash][params][debug]">
					<option value="0" <?php echo ( ( empty($paysite_cash_config) )  || ( !empty($paysite_cash_config) && empty($paysite_cash_config['debug']) ) ) ? 'selected="selected"' : '' ; ?>><?php _e( 'No', 'wps_paysite_cash' ); ?></option>
					<option value="1" <?php echo ( !empty($paysite_cash_config) && !empty($paysite_cash_config['debug']) ) ? 'selected="selected"' : '' ; ?>><?php _e( 'Yes', 'wps_paysite_cash' ); ?></option>
				</select>
			</div>
		</div>
		
	</div>
	
</div>

<?php echo apply_filters( 'wps-paysite-cash-extra-config', '' ); ?>

