<span class="wps-h5"><?php _e( 'Your Paysite cash\'s account informations', 'wps_paysite_cash')?></span>
<div class="wps-row wps-gridwrapper3-padded">
	<div><strong><u><?php _e( 'Name', 'wps_paysite_cash'); ?></strong> :</u><br/> <?php echo ( !empty($wps_paysite_cash_account) && !empty($wps_paysite_cash_account['lastname']) ) ? $wps_paysite_cash_account['lastname'] : ''; ?></div>
	<div><strong><u><?php _e( 'Firstname', 'wps_paysite_cash'); ?></strong> :</u><br/>  <?php echo ( !empty($wps_paysite_cash_account) && !empty($wps_paysite_cash_account['firstname']) ) ? $wps_paysite_cash_account['firstname'] : ''; ?></div>
	<div><strong><u><?php _e( 'Paysite cash\'s username', 'wps_paysite_cash'); ?></strong> :</u><br/>  <?php echo ( !empty($wps_paysite_cash_account) && !empty($wps_paysite_cash_account['username']) ) ? $wps_paysite_cash_account['username'] : ''; ?></div>
</div>
<div class="wps-row wps-gridwrapper3-padded">
	<div><strong><u><?php _e( 'City', 'wps_paysite_cash'); ?></strong> :</u><br/>  <?php echo ( !empty($wps_paysite_cash_account) && !empty($wps_paysite_cash_account['city']) ) ? $wps_paysite_cash_account['city'] : ''; ?></div>
	<div><strong><u><?php _e( 'Country', 'wps_paysite_cash'); ?></strong> :</u><br/>  <?php echo ( !empty($wps_paysite_cash_account) && !empty($wps_paysite_cash_account['registration_country']) ) ? $wps_paysite_cash_account['registration_country'] : ''; ?></div>
	<div><strong><u><?php _e( 'Your business', 'wps_paysite_cash'); ?></strong> :</u><br/> <?php echo ( !empty($wps_paysite_cash_account) && !empty($wps_paysite_cash_account['business_description']) ) ? $wps_paysite_cash_account['business_description'] : ''; ?></div>
</div>
