<?php
/**
 *  Test Class
 *
 *
 * @package    DPUK_Plugin_Template
 * @subpackage Classes
 * @category   Core
 * @since      1.0.0
 */

namespace DPUK_Plugin_Template\Classes;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

class Dog {
    public function __construct() {
        add_action( 'init', [$this, 'hook_init'] );
        add_action( 'wp_loaded', [$this, 'hook_wp_loaded'] );
        add_action( 'wp', [$this, 'hook_wp'] );
        add_action( 'plugins_loaded', [$this, 'hook_plugins_loaded'] );

    }

    public function hook_init() {
        echo  'init Dog </br>';

    }

    public function hook_wp_loaded() {
        echo 'wp_loaded Dog </br>';

    }

    public function hook_wp() {
        echo 'wp Dog</br>';

    }

    public function hook_plugins_loaded() {
        echo 'plugins_loaded Dog </br>';

    }
}
