<?php
/**
 * Plugin Name: WP Shop Shipping Mode
 * Plugin URI: http://www.wpshop.fr/documentations/presentation-wpshop/
 * Description: WP Shop Shipping Mode
 * Version: 0.1
 * Author: Eoxia
 * Author URI: http://eoxia.com/
 */

/**
 * Cart rules bootstrap file
 * @author Jérôme ALLEGRE - Eoxia dev team <dev@eoxia.com>
 * @version 0.1
 * @package includes
 * @subpackage modules
 *
 */
 

/** Template Global vars **/
DEFINE('WPS_SHIPPING_MODE_DIR', basename(dirname(__FILE__)));
DEFINE('WPS_SHIPPING_MODE_PATH', str_replace( "\\", "/", str_replace( WPS_SHIPPING_MODE_DIR, "", dirname( __FILE__ ) ) ) );
DEFINE('WPS_SHIPPING_MODE_URL', str_replace( str_replace( "\\", "/", ABSPATH), site_url() . '/', WPS_SHIPPING_MODE_PATH ) );

include( plugin_dir_path( __FILE__ ).'/controller/wps_shipping_ctr.php' );
include( plugin_dir_path( __FILE__ ).'/controller/wps_shipping_mode_ctr.php' );
include( plugin_dir_path( __FILE__ ).'/controller/wps_shipping_mode_ajax_actions.php' );


$wps_shipping_mode_ctr = new wps_shipping_mode_ctr();
$wps_shipping_mode_ajax_actions = new wps_shipping_mode_ajax_actions();
	
