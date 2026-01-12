<?php
if (!defined('ABSPATH')) exit;

class Crystal_Booking_Assets
{

    public function __construct()
    {
        add_action('wp_enqueue_scripts', [$this, 'enqueue'], 99);
    }

    public function enqueue()
    {
        if (!is_product()) return;

        wp_enqueue_style('crystal-booking-css', CRYSTAL_BOOKING_URL . 'assets/css/booking.css', [], CRYSTAL_BOOKING_VERSION);

        wp_enqueue_script(
            'crystal-booking-js',
            CRYSTAL_BOOKING_URL . 'assets/js/booking.js',
            ['jquery'],
            CRYSTAL_BOOKING_VERSION,
            true
        );

        wp_localize_script('crystal-booking-js', 'crystalBooking', [
            'ajax_url' => admin_url('admin-ajax.php'),
            'nonce'    => wp_create_nonce('crystal_booking_nonce')
        ]);
    }
}

new Crystal_Booking_Assets();
