<?php
class wps_paysite_cash {
	/** Define the main directory containing the template for the current plugin
	 * @var string
	 */
	private $template_dir;
	/**
	 * Define the directory name for the module in order to check into frontend
	 * @var string
	 */
	private $plugin_dirname = WPS_PAYSITE_CASH_DIR;
	
	function __construct() {
		// Template loading....
		$this->template_dir = WPS_PAYSITE_CASH_PATH . WPS_PAYSITE_CASH_DIR . "/templates/";
		add_filter( 'wps_payment_mode_interface_paysite_cash', array( $this, 'display_configuration_panel') );
		add_action( 'wpshop_payment_actions', array( $this, 'display_payment_form' ) );
		add_action( 'init', array( $this, 'listen_bank_response') );
		add_action( 'init', array( $this, 'listen_alert_response') );
		
		// Extra filter
		add_filter( 'wps_administration_order_payment_informations', array( $this, 'wps_paysite_cash_payment_extra_informations'), 10, 1 );
		
		add_action( 'admin_enqueue_scripts', array( $this, 'add_scripts') );
		
		// WP Ajax actions
		add_action( 'wp_ajax_wps_paysite_cash_create_account', array( $this, 'wps_paysite_cash_create_account') );
	}
	
	function add_scripts() {
		wp_enqueue_script( 'wps_paysite_cash_js', WPS_PAYSITE_CASH_URL . WPS_PAYSITE_CASH_DIR . '/assets/js/wps_paysite_cash.js' );
	}
	
	/**
	 * Install action on activation
	 */
	function install_on_activation() {
		/** Check if SystemPay is registred in Payment Main Option **/
		$payment_option = get_option( 'wps_payment_mode' );
		if ( !empty($payment_option) && !empty($payment_option['mode']) && !array_key_exists('paysite_cash', $payment_option['mode']) ) {
			$payment_option['mode']['paysite_cash']['name'] = __('Paysite Cash', 'wps_paysite_cash');
			$payment_option['mode']['paysite_cash']['logo'] = WPS_PAYSITE_CASH_PATH . WPS_PAYSITE_CASH_DIR .'/medias/paysite_cash.png';
			$payment_option['mode']['paysite_cash']['description'] = __('Paysite Cash Payment Solution', 'wps_paysite_cash');
			update_option( 'wps_payment_mode', $payment_option );
		}
	}
	
	/**
	 * Display Paysite Cash WPShop configuration panel
	 * @return string
	 */
	function display_configuration_panel() {
		$wps_payment_mode = get_option( 'wps_payment_mode' );
		$paysite_cash_config = ( !empty($wps_payment_mode) && !empty($wps_payment_mode['mode']) && !empty($wps_payment_mode['mode']['paysite_cash']) && !empty($wps_payment_mode['mode']['paysite_cash']['params']) ) ? $wps_payment_mode['mode']['paysite_cash']['params'] : array();
		ob_start();
		require( wpshop_tools::get_template_part( WPS_PAYSITE_CASH_DIR, $this->template_dir, "backend", "paysite_cash_configuration_panel") );
		$output = ob_get_contents();
		ob_end_clean();
		return $output;
	}
	
	/**
	 * Display payment form which be sent to Paysite Cash Service.
	 */
	function display_payment_form() {
		if( !empty($_SESSION['payment_method']) && $_SESSION['payment_method'] == 'paysite_cash') {
			$wps_payment_mode = get_option( 'wps_payment_mode' );
			$paysite_cash_config = ( !empty($wps_payment_mode) && !empty($wps_payment_mode['mode']) && !empty($wps_payment_mode['mode']['paysite_cash']) && !empty($wps_payment_mode['mode']['paysite_cash']['params']) ) ? $wps_payment_mode['mode']['paysite_cash']['params'] : array();
			
			//Datas
			$website_id = ( !empty($paysite_cash_config) && !empty($paysite_cash_config['site_id']) ) ? $paysite_cash_config['site_id'] : '';
			$amount = ( !empty($_SESSION['cart']) && !empty($_SESSION['cart']['order_amount_to_pay_now']) ) ? $_SESSION['cart']['order_amount_to_pay_now'] : '';
			$currency = ( !empty($paysite_cash_config) && !empty($paysite_cash_config['currency']) ) ? $paysite_cash_config['currency'] : '';
			$test_data = ( !empty($paysite_cash_config) && !empty($paysite_cash_config['mode']) ) ? $paysite_cash_config['mode'] : '';
			$customer_id = get_current_user_id();
			$transaction_reference = $this->generate_transaction_ref();
			$divers_datas = base64_encode( serialize( array('order_id' => ( ( !empty($_SESSION['order_id']) && !empty($paysite_cash_config['site_id']) ) ? $_SESSION['order_id'] : '' ) ) ) );
			$userdata = get_userdata( $customer_id );
			$customer_email = ( !empty($userdata) && !empty($userdata->user_email) ) ? $userdata->user_email : '';
			
			$customer_lang = ( !empty($paysite_cash_config) && !empty($paysite_cash_config['lang']) ) ? $paysite_cash_config['lang'] : 'FR';
			$wait_config = ( !empty($paysite_cash_config) && !empty($paysite_cash_config['wait']) ) ? $paysite_cash_config['wait'] : '';
			$debugconfig = ( !empty($paysite_cash_config) && !empty($paysite_cash_config['debug']) ) ? $paysite_cash_config['debug'] : '';
			
			// Save the transaction reference
			$transaction_ref = get_post_meta( $_SESSION['order_id'], '_paysite_cash_transaction_reference', true );
			if( empty($transaction_ref) ) {
				$transaction_ref = array();
			}
			$transaction_ref[] = $transaction_reference;
			update_post_meta( $_SESSION['order_id'], '_paysite_cash_transaction_reference', $transaction_ref );
			
			require( wpshop_tools::get_template_part( WPS_PAYSITE_CASH_DIR, $this->template_dir, "frontend", "paysite_cash_form") );
		}
	}
	
	/**
	 * Listen Paysite Cash Response to payment request and do action
	 */
	function listen_bank_response() {
		if( !empty($_GET['paymentListener']) && $_GET['paymentListener'] == 'paysite_cash') {
			if( !empty($_REQUEST['divers']) && !empty($_REQUEST['ref']) ) {
				if( $this->checking_order_validity( $_REQUEST['ref'], $_REQUEST['divers'] ) ) {
					// Save Paysite Cash return
					$order_data = unserialize( base64_decode( $_REQUEST['divers'] ) );
					$order_id = $order_data['order_id'];
					$paysite_cash_return_data = get_post_meta($order_id, '_paysite_cash_return_data', true );
					if( empty($paysite_cash_return_data) ) {
						$paysite_cash_return_data = array();
					}
					$paysite_cash_return_data[] = array( 'return_date' => current_time( 'mysql', 0 ), 'datas' => serialize( $_REQUEST ) );
					update_post_meta( $order_id, '_paysite_cash_return_data', $paysite_cash_return_data );
					
					// Checking return status
					if( !empty( $_REQUEST['etat']) ) {
						switch( $_REQUEST['etat'] ) {
							case 'ok' : 
								$payment_status = 'completed';
							break;
							
							case 'ko' : 
								$payment_status = 'denied';
							break;
							
							case 'wait' : 
								$payment_status = 'awaiting_payment';
								$extra_data = get_post_meta( $order_id, '_paysite_cash_extra_data', true );
								if( empty($extra_data) ) {
									$extra_data = array();
								}
								$extra_data[ $_REQUEST['id_trans'] ]['wait'] = __( 'This payment is waiting your validation on Paysite Cash Commercant interface', 'wps_paysite_cash');
								update_post_meta( $order_id, '_paysite_cash_extra_data', $extra_data );
							break;
							
							case 'chargeback' : 
								$payment_status = 'denied';
							break; 
							default : 
								$payment_status = 'denied';
							break;
						} 
						
						// Payment actions
						$order_meta = get_post_meta( $order_id, '_order_postmeta', true);
						$params_array = array(
												'method' => $_REQUEST['paymentListener'],
												'waited_amount' => $order_meta['order_amount_to_pay_now'],
												'status' => ( ( number_format($order_meta['order_amount_to_pay_now'], 2, '.', '') == number_format( $_REQUEST['montant'], 2, '.', '')  ) ? 'payment_received' : 'incorrect_amount' ),
												'author' => $order_meta['customer_id'],
												'payment_reference' => $_REQUEST['ref'],
												'date' => current_time('mysql', 0),
												'received_amount' => $_REQUEST['montant']
											);
						wpshop_payment::check_order_payment_total_amount($order_id, $params_array, $payment_status);
					} 
				}
			}
		}
	}
	
	/**
	 * Listen Bank Alert datas
	 */
	function listen_alert_response() {
		if( !empty($_GET['paymentListener']) && !empty($_GET['paysite_cash_alert']) && $_GET['paymentListener'] == 'paysite_cash' && !empty($_GET['paysite_cash_alert']) && $_GET['paysite_cash_alert'] == 'ok' ) {
			if( !empty($_REQUEST['divers']) && !empty($_REQUEST['ref']) ) {
				if( $this->checking_order_validity( $_REQUEST['ref'], $_REQUEST['divers'] ) ) {
					$order_data = unserialize( base64_decode( $_REQUEST['divers'] ) );
					$order_id = $order_data['order_id'];
					
					if( !empty($_REQUEST['error_code']) ) {
						$alert_message = '';
						// Check alert return
						switch( $_REQUEST['error_code'] ) {
							case '1' : 
								$alert_message = __( 'Order amount is greater than 1000 €', 'wps_paysite_cash' );
							break;
							case '2' :
								$alert_message = __( 'This customer have already made a valid payment on your shop', 'wps_paysite_cash' );
							break;
							case '3' :
								$alert_message = __( 'Others payments have already done with the same customer account e-mail but with an another credit card', 'wps_paysite_cash' );
							break;
							case '4' :
								$alert_message = __( 'This customer have already made unpaid payments on your shop', 'wps_paysite_cash' );
							break;
							case '5' :
								$alert_message = __( 'This credit card is used by an another person', 'wps_paysite_cash' );
							break;
							case '6' :
								$alert_message = __( 'The credit card owner doesn\t received the transaction ticket e-mail.', 'wps_paysite_cash' );
							break;
							
							default : 
								
							break;
						}
						// Save alert message
						if( !empty($alert_message) ) {
							$extra_data = get_post_meta( $order_id, '_paysite_cash_extra_data', true );
							if( empty($extra_data) ) {
								$extra_data = array();
							}
							$extra_data[ $_REQUEST['id_trans'] ]['alert'] = $alert_message;
							update_post_meta( $order_id, '_paysite_cash_extra_data', $extra_data );
						}
					}
					
					
					$extra_data = get_post_meta( $order_id, '_paysite_cash_extra_data', true );
					if( empty($extra_data) ) {
						$extra_data = array();
					}
					
					
					
					
					
				}
				
			}
		}
	}
	
	/**
	 * Checking the order validity based on Paysite cash Payment return
	 * @param string $transaction_ref
	 * @param $string $divers_data
	 * @return boolean
	 */
	function checking_order_validity( $transaction_ref, $divers_data ) {
		$validity = false;
		$divers_data = unserialize( base64_decode( $divers_data ) );
		// Checking the order id validity
		if( !empty($divers_data) && is_array($divers_data) && !empty($divers_data['order_id']) && get_post_type($divers_data['order_id']) == WPSHOP_NEWTYPE_IDENTIFIER_ORDER ) {
			// Checking the payment reference validity
			$paysite_cash_refs = get_post_meta( $divers_data['order_id'], '_paysite_cash_transaction_reference', true );
			if( !empty($paysite_cash_refs) && in_array( $transaction_ref, $paysite_cash_refs) ) {
				$validity = true;
			}
		}
		return $validity;
	}
	
	/**
	 * Generate a transaction reference for Paysite Cash
	 * @return string
	 */
	function generate_transaction_ref() {
		$r = rand( 3, 10);
		$j = rand( 1 , 9999 );
		$calcul = time() * $j * $r;
		$limit = rand( 30, 45 );
		$number = substr( $calcul, 0, $limit );
		$code = 'WPS_'. $number;
		return $code;
	}
	
	/**
	 * Display Extra paysite Cash return informations
	 * @param integer $order_id
	 * @return string
	 */
	function wps_paysite_cash_payment_extra_informations( $order_id ) {
		$output = '';
		if( !empty($order_id) ) {
			$extra_data = get_post_meta( $order_id, '_paysite_cash_extra_data', true );
			$infos = '';
			if( !empty($extra_data) ) {
				foreach( $extra_data as $transaction_id => $data_informations ) {
					// Waiting alert
					if( !empty($data_informations['wait']) ) {
						$infos .= '<strong>Trans. ID ' .$transaction_id. ' : </strong>'.$data_informations['wait'].'<br/>';
					}
					// Alert datas
					if( !empty($data_informations['alert']) ) {
						$infos .= '<strong>'.__( 'Paysite Cash Alert', 'wps_paysite_cash').' ( Trans. ID ' .$transaction_id. ' ) : </strong>'.$data_informations['alert'];
					}
				}
				if( !empty($infos) ) {
					$output = '<div class="wps-alert-warning">' .$infos. '</div>';
				}
			}
		}
		return  $output;
	}
	
	/**
	 * Create a PAsite Cash Account via Webservice
	 */
	function wps_paysite_cash_create_account() {
		$status = false; $response = $website_id = '';
		
		$user_type = ( !empty($_POST['status']) ) ? $_POST['status'] : '';
		$last_name = ( !empty($_POST['lastname']) ) ? $_POST['lastname'] : '';
		$first_name = ( !empty($_POST['firstname']) ) ? $_POST['firstname'] : '';
		$company_name = ( !empty($_POST['company_name']) ) ? $_POST['company_name'] : '';
		$registration_country = ( !empty($_POST['registration_country']) ) ? $_POST['registration_country'] : '';
		$residence_country = ( !empty($_POST['director_residence']) ) ? $_POST['director_residence'] : '';
		$vat_number = ( !empty($_POST['vat_number']) ) ? $_POST['vat_number'] : '';
		$address = ( !empty($_POST['address']) ) ? $_POST['address'] : '';
		$zip_code = ( !empty($_POST['zip_code']) ) ? $_POST['zip_code'] : '';
		$city = ( !empty($_POST['city']) ) ? $_POST['city'] : '';
		$country = ( !empty($_POST['country']) ) ? $_POST['country'] : '';
		$phone = ( !empty($_POST['phone']) ) ? $_POST['phone'] : '';
		$email = ( !empty($_POST['email']) ) ? $_POST['email'] : '';
		$description = ( !empty($_POST['description']) ) ? $_POST['description'] : '';
		$username = ( !empty($_POST['username']) ) ? $_POST['username'] : '';
		$language = ( !empty($_POST['language']) ) ? $_POST['language'] : '';
		
		if( !empty($user_type) && !empty($last_name) && !empty($first_name) && !empty($address) && !empty($zip_code) && !empty($city) && !empty($country) && !empty($phone) && !empty($email) && !empty($description) && !empty($username) && !empty($language)  ) {
			if( ( $user_type == 'company' && !empty($registration_country) && !empty($residence_country) && !empty($company_name) ) || $user_type != 'company' ) {
				$merchant_data = array( 'status' => $user_type, 
										'firstname' => $first_name, 
										'lastname' => $last_name, 
										'company' => $company_name, 
										'registration_country' => $registration_country, 
										'director_country' => $residence_country, 
										'eu_vat' => $vat_number, 
										'postal_address' => $address, 
										'zipcode' => $zip_code, 
										'city' => $city,
										'country' => $country, 
										'phone_number' => $phone, 
										'email' => $email, 
										'business_description' => $description, 
										'username' => $username, 
										'language' => $language
									);
				try{
					$client = new SoapClient(null, array( 
							'location' => 'https://billing.paysite-cash.biz/service/merchant_reg_srv.php', 
							'uri' => 'https://billing.paysite-cash.biz/service/merchant_reg_srv.php', 
							'trace' => true)); 
					
					$apikey = '25ef148b36a9087e0200fb561f28662d'; 
					
					try{ 
						$result = (array) $client->lightRegister($apikey, $merchant_data); 
						$output = $result['status']; 
						$status = true;
						
						if( $output ) {
							if( !empty($result['merchant_id']) ) {
								$merchant_data['merchant_id'] = $result['merchant_id'];
							}
							update_option( 'wps_paysite_cash_account_informations', $merchant_data );
							// Register a website on Paysite Cash.
							$website_id = $this->wps_paysite_cash_register_website( $merchant_data );
						}
					} 
					catch (SoapFault $e) { 
						$output = $e->getMessage(); 
						$response =  sprintf( __( 'Error: %s', 'wps_paysite_cash' ),  $output );
					}
				}
				catch( Exception $e ) {
					$response =  __( 'Soap functions are not enabled on your server, Please visit Paysite Cash website to create your account', 'wps_paysite_cash' );
				}
				
			}
			else {
				$response .= __( 'Please fill all required informations', 'wps_paysite_cash' );
			}
		}
		else {
			$response .= __( 'Please fill all required informations', 'wps_paysite_cash' );
		}
		
		echo json_encode( array( 'status' => $status, 'response' => $response, 'website_id' => $website_id) );
		wp_die();
	}
	
	/**
	 * Register Website on Paysite Cash
	 * @param array $merchant_data
	 * @return integer
	 */
	function wps_paysite_cash_register_website( $merchant_data ) {
		$website_id = '';
		$site_data = array( 
				'name' => get_bloginfo( 'name'), 
				'url' => site_url(), 
				'customer_contact_email' => $merchant_data['email'], 
				'is_selling_goods' => false, 
				'referrer_url' => '', 
				'after_payment_url' => get_permalink( get_option('wpshop_payment_return_page_id') ), 
				'cancelled_payment_url' => get_permalink( get_option('wpshop_payment_return_nok_page_id') ), 
				'backoffice_url' => site_url().'/?paymentListener=paysite_cash', 
				'backoffice_url_username' => '', 
				'backoffice_url_password' => '', 
				'multiple_payments_alert_limit' => '1', 
				'accept_payment_from_abroad' => true, 
				'accept_free_emails' => true, 
				'accept_multiple_subscriptions' => true, 
				'revalidate_after_months' => 1, 
				'validate_by_sms' => false, 
				'validate_by_phone' => false, 
				'revalidate_after_amount' => 1000, 
				'request_activation' => false, );
		
		try{
			$client = new SoapClient( 
									null, 
									array( 'location' => 'http://billing.paysite-cash.biz/service/site_creation_service.php', 'uri' => 'http://www.paysite-cash.com' ) 
					);
			$service = array( 'apikey'=> '25ef148b36a9087e0200fb561f28662d', 'merchant_id' => $merchant_data['merchant_id'] );
			
			try {
				$website_id = $client->createSiteByReseller( $service['apikey'], $service['merchant_id'], $site_data );
			}
			catch (SoapFault $e) { 
				// handle error 
			}
			
		}
		catch( Exception $e ) {
			$response =  __( 'Soap functions are not enabled on your server, Please visit Paysite Cash website to create your account', 'wps_paysite_cash' );
		}
		
		return $website_id;
	}
}