<?php
if (!defined('ABSPATH')) exit;

class Crystal_Booking_System {

    private static $instance = null;

    public static function get_instance() {
        if (self::$instance === null) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    private function __construct() {
        $this->includes();
        $this->hooks();
    }

    private function includes() {
        require_once CRYSTAL_BOOKING_PATH . 'includes/class-assets.php';
        require_once CRYSTAL_BOOKING_PATH . 'includes/class-ajax.php';
        require_once CRYSTAL_BOOKING_PATH . 'includes/class-cart.php';
        require_once CRYSTAL_BOOKING_PATH . 'includes/class-order.php';
    }

    private function hooks() {
        add_action('woocommerce_after_add_to_cart_button', [$this, 'add_booking_button']);
        add_action('wp_footer', [$this, 'load_templates']);
    }

    public function add_booking_button() {
        global $product;
        if (!$product->is_type('variable')) return;

        echo '<div class="crystal-booking-wrapper">
                <button type="button" class="button alt crystal-book-now">Book Now</button>
              </div>';
    }

    public function load_templates() {
        if (!is_product()) return;
        require CRYSTAL_BOOKING_PATH . 'templates/booking-modals.php';
    }
}
