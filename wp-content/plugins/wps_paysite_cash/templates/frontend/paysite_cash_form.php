<div class="paypalPaymentLoading"><span><?php _e('Redirect to the Paysite Cash website in progress, please wait...', 'wps_paysite_cash'); ?></span></div>
<form id="paymentRequest_Paysite_cash" method="post" action="https://billing.paysite-cash.biz">
	<input type="hidden" name="site" value="<?php echo $website_id; ?>" />
	<input type="hidden" name="montant" value="<?php echo $amount; ?>" />
	<input type="hidden" name="devise" value="<?php echo $currency; ?>" />
	<input type="hidden" name="test" value="<?php echo $test_data; ?>" />
	<input type="hidden" name="id_client" value="<?php echo $customer_id; ?>" />
	<input type="hidden" name="ref" value="<?php echo $transaction_reference; ?>" />
	<input type="hidden" name="divers" value="<?php echo $divers_datas; ?>" />
	<input type="hidden" name="email" value="<?php echo $customer_email; ?>" />
	<input type="hidden" name="lang" value="<?php echo $customer_lang; ?>" />
	<input type="hidden" name="wait" value="<?php echo $wait_config; ?>" />
	<input type="hidden" name="debug" value="<?php echo $debugconfig; ?>" />
	<input type="submit" name="bouton" id="bouton" value="<?php _e( 'Connexion', 'wps_paysite_cash'); ?>" />
	<?php echo apply_filters( 'wps_paysite_cash_extra_fields',  '' ); ?>
</form>

<script type="text/javascript">
	jQuery(document).ready(function(){
		jQuery("#paymentRequest_Paysite_cash").submit();
	});
</script>
