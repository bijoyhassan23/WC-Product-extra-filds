<?php
if (!defined('ABSPATH')) exit;

class Crystal_Booking_Assets {

    public function __construct() {
        add_action('wp_enqueue_scripts', [$this, 'enqueue']);
    }

    public function enqueue() {
        if (!is_product()) return;

        wp_enqueue_style(
            'crystal-booking-css',
            CRYSTAL_BOOKING_URL . 'assets/css/booking.css',
            [],
            '1.0.0'
        );

        wp_enqueue_script(
            'crystal-booking-js',
            CRYSTAL_BOOKING_URL . 'assets/js/booking.js',
            ['jquery'],
            '1.0.0',
            true
        );

        wp_localize_script('crystal-booking-js', 'crystalBooking', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('crystal_booking_nonce')
        ]);
    }
}

new Crystal_Booking_Assets();
