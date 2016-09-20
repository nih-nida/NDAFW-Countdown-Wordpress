<?php
defined( 'ABSPATH' ) or die( 'no access.' );

/*
Plugin Name: N4T NDAFW Countdown
Plugin URI:  https://teens.drugabuse.gov
Description: This plugin creates a NDAFW Countdown widget
Version:     1.0
Author:      Jiong Ye (IQ Solutions, Inc.)
Author URI:  http://iqsolutions.com
*/

define( 'N4T_NDAFW_COUNTDOWN_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

require_once( N4T_NDAFW_COUNTDOWN_PLUGIN_DIR . 'n4t_ndafw_countdown_widget.php' );

function n4t_ndafw_countdown_scripts() {
  wp_enqueue_script( 'n4t-ndafw-countdown-js', plugins_url( '/js/n4t_ndafw_countdown.js', __FILE__ ) );
  wp_enqueue_style( 'n4t-ndafw-countdown-css', plugins_url( '/css/n4t_ndafw_countdown.css' ,__FILE__) );
}
add_action( 'wp_enqueue_scripts', 'n4t_ndafw_countdown_scripts' );