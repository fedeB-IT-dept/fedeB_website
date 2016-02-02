<?php
/**
 * Plugin Name: WPSHOP Paysite Cash
 * Plugin URI: http://www.wpshop.fr/documentations/presentation-wpshop/
 * Description : Paysite Cash Payment solution for WPShop
 * Version: 0.1
 * Author: Eoxia
 * Author URI: http://eoxia.com/
 */

/**
 * @author ALLEGRE Jérôme - Eoxia dev team <dev@eoxia.com>
 * @version 0.1
 * @package includes
 * @subpackage modules
 */

/** Template Global vars **/
DEFINE('WPS_PAYSITE_CASH_DIR', basename(dirname(__FILE__)));
DEFINE('WPS_PAYSITE_CASH_PATH', str_replace( "\\", "/", str_replace( WPS_PAYSITE_CASH_DIR, "", dirname( __FILE__ ) ) ) );
DEFINE('WPS_PAYSITE_CASH_URL', str_replace( str_replace( "\\", "/", ABSPATH), site_url() . '/', WPS_PAYSITE_CASH_PATH ) );

load_plugin_textdomain( 'wps_paysite_cash', false, dirname(plugin_basename( __FILE__ )).'/languages/' );


// Test if WPShop is active on WP
include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( is_plugin_active('wpshop/wpshop.php') ) {
	include( plugin_dir_path( __FILE__ ).'/controller/wps_paysite_cash_ctr.php' );
	$wps_paysite_cash = new wps_paysite_cash();
	register_activation_hook( __FILE__ , array($wps_paysite_cash, 'install_on_activation') );
}

