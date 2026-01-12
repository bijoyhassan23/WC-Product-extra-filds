<?php
/**
 * Plugin Name:  Booking System Test
 * Description: Custom booking system with date, time, and deposit options
 * Version: 5.0.0
 * Author: Rakib
 * Text Domain: crystal-booking
 */

if (!defined('ABSPATH')) exit;

define('CRYSTAL_BOOKING_PATH', plugin_dir_path(__FILE__));
define('CRYSTAL_BOOKING_URL', plugin_dir_url(__FILE__));

require_once CRYSTAL_BOOKING_PATH . 'includes/class-crystal-booking-system.php';

function crystal_booking_system_init() {
    return Crystal_Booking_System::get_instance();
}

add_action('plugins_loaded', 'crystal_booking_system_init');