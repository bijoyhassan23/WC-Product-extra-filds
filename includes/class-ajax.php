<?php
if (!defined('ABSPATH')) exit;

class Crystal_Booking_Ajax {

    public function __construct() {
        add_action('wp_ajax_save_booking_data', [$this, 'save']);
        add_action('wp_ajax_nopriv_save_booking_data', [$this, 'save']);
    }

    public function save() {
        check_ajax_referer('crystal_booking_nonce', 'nonce');

        WC()->session->set('crystal_booking_data', [
            'date'         => sanitize_text_field($_POST['date']),
            'time'         => sanitize_text_field($_POST['time']),
            'service'      => sanitize_text_field($_POST['service']),
            'team_member'  => sanitize_text_field($_POST['team_member']),
            'language'     => sanitize_text_field($_POST['language']),
            'notes'        => sanitize_textarea_field($_POST['notes']),
            'payment_type' => sanitize_text_field($_POST['payment_type']),
        ]);

        wp_send_json_success();
    }
}

new Crystal_Booking_Ajax();
