<?php
/**
 * Plugin configuration
 *
 * Defines constants used throughout the plugin files.
 *
 * @package    DPUK_Plugin_Template
 * @subpackage Configuration
 * @category   Core
 * @since      1.0.0
 */

namespace DPUK_Plugin_Template;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}


/**
 * Constant: Plugin folder path
 *
 * @since 1.0.0
 * @var   string The filesystem directory path (with trailing slash)
 *               for the plugin __FILE__ passed in.
 */
define( 'DPT_PATH', plugin_dir_path( __FILE__ ) );

/**
 * Constant: Plugin folder URL
 *
 * @since 1.0.0
 * @var   string The URL directory path (with trailing slash)
 *               for the plugin __FILE__ passed in.
 */
define( 'DPT_URL', plugin_dir_url(__FILE__ ) );

