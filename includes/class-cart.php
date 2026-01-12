<?php
if (!defined('ABSPATH')) exit;

class Crystal_Booking_Cart {

    public function __construct() {
        add_filter('woocommerce_add_cart_item_data', [$this, 'add_to_cart'], 10, 3);
        add_filter('woocommerce_get_item_data', [$this, 'display'], 10, 2);
    }

    public function add_to_cart($cart_item_data) {
        $data = WC()->session->get('crystal_booking_data');
        if ($data) {
            $cart_item_data['crystal_booking'] = $data;
            WC()->session->__unset('crystal_booking_data');
        }
        return $cart_item_data;
    }

    public function display($item_data, $cart_item) {
        if (!isset($cart_item['crystal_booking'])) return $item_data;

        foreach ($cart_item['crystal_booking'] as $key => $value) {
            $item_data[] = [
                'key'   => ucwords(str_replace('_', ' ', $key)),
                'value' => esc_html($value),
            ];
        }
        return $item_data;
    }
}

new Crystal_Booking_Cart();
