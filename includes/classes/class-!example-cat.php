<?php
/**
 * Test Class
 *
 * Methods for enqueueing and printing assets
 * such as JavaScript and CSS files.
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

class Cat {
    public function __construct() {
     
    }

    public function hook_into_wordpress() {
        add_action( 'init', [$this, 'hook_init'] );
        add_action( 'wp_loaded', [$this, 'hook_wp_loaded'] );
        add_action( 'wp', [$this, 'hook_wp'] );
        add_action( 'plugins_loaded', [$this, 'hook_plugins_loaded'] );
        add_action( 'wp_enqueue_scripts', [ $this, 'enqueue' ] );
    }

	public function enqueue() {

		// Instantiate the Assets class.
		$asset_versioning = new AssetVersioning;
        
		wp_enqueue_script(
            'cat-script', 
            DPT_URL . 'assets/js/cat-script' . $asset_versioning->suffix() . '.js',
            [ 'jquery' ],
            $asset_versioning->version(),
            true 
        );

        wp_enqueue_style( 
            'cat_styles',
            DPT_URL . 'assets/css/cat-style' . $asset_versioning->suffix() . '.css',
            array(),
            filemtime(DPT_PATH . 'assets/css/cat-style.css'),//date("Y-m-d-h:i-s"), //filemtime(DPT_URL . 'assets/css/cat-style.css'),
            false 
            );


        wp_enqueue_style( 
            'cat_styles_2',
            DPT_URL . 'assets/css/cat-style-2' . $asset_versioning->suffix() . '.css',
            array(),
            $asset_versioning->version_control(),
            false 
            );
	
    }



    public function hook_init() {
        echo  'init Cat</br>';

    }

    public function hook_wp_loaded() {
        echo 'wp_loaded Cat</br>';

    }

    public function hook_wp() {
        echo 'wp Cat</br>';

    }

    public function hook_plugins_loaded() {
        echo 'plugins_loaded Cat </br>';

    }
}
