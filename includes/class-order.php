<?php
if (!defined('ABSPATH')) exit;

class Crystal_Booking_Order {

    public function __construct() {
        add_action('woocommerce_checkout_create_order_line_item', [$this, 'save'], 10, 4);
    }

    public function save($item, $cart_item_key, $values) {
        if (!isset($values['crystal_booking'])) return;

        foreach ($values['crystal_booking'] as $key => $value) {
            $item->add_meta_data('_booking_' . $key, $value, true);
        }
    }
}

new Crystal_Booking_Order();
