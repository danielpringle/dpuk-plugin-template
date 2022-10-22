<?php
/**
 * Initialize plugin functionality
 *
 * Loads the text domain for translation and
 * instantiates various classes.
 *
 * @package    Plugin Template
 * @subpackage Init
 * @category   Core
 * @since      1.0.0
 */

namespace DPUK_Plugin_Template;

// Alias namespaces.
use DPUK_Plugin_Template\Classes as Classes;
use DPUK_Plugin_Template\Admin as Admin;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

// Hook initialization functions.
add_action( 'plugins_loaded', __NAMESPACE__ . '\init' );
add_action( 'plugins_loaded', __NAMESPACE__ . '\admin_init' );


/**
 * Initialization function
 *
 * Loads PHP classes and text domain.
 * Instantiates various classes.
 * Adds settings link in the plugin row.
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
function init() {

	// Load plugin text domain.
	load_plugin_textdomain(
		'dpuk-plugin-template',
		false,
		dirname( DPT_BASENAME ) . '/languages'
	);

	// If this is in the must-use plugins directory.
	load_muplugin_textdomain(
		'dpuk-plugin-template',
		dirname( DPT_BASENAME ) . '/languages'
	);

	/**
	 * Class autoloader
	 *
	 * The autoloader registers plugin classes for later use,
	 * such as running new instances below.
	 */
	require_once DPT_PATH . 'includes/autoloader.php';

	// Settings and core methods.
	new Classes\EnqueueAssets;

	/** EXAMPLES - delete **/
	// new Classes\Dog;
	// $run_cat = new Classes\Cat;
	// $run_cat->hook_into_wordpress();
	
}

/**
 * Admin initialization function
 *
 * Instantiates various classes.
 *
 * @since  1.0.0
 * @access public
 * @global $pagenow Get the current admin screen.
 * @return void
 */
function admin_init() {

	
	/** Add admin menu settings via class **/
	require_once DPT_PATH . 'admin/classes/class-admin-settings.php';
	require_once DPT_PATH . 'admin/classes/class-admin-menu.php';
	require_once DPT_PATH . 'admin/classes/class-admin-menu-tab.php';
	require_once DPT_PATH . 'admin/classes/class-admin-sub-menu.php';



	$customWPMenu = new Admin\AdminMenu( array(
		'slug' => 'wpmenu',
		'title' => 'WP Menu',
		'desc' => 'Settings for theme custom WordPress Menu',
		'icon' => 'dashicons-welcome-widgets-menus',
		'position' => 99,
	));
	
	$customWPMenu->add_field(array(
	'name' => 'text',
	'title' => 'Text Input',
	'desc' => 'Input Description' ));

	$customWPMenu->add_field(array(
		'name' => 'dpuk',
		'title' => 'DPUK Text Input',
		'desc' => 'Input Description for DPUK' ));
	
	$customWPMenu->add_field(array(
	'name' => 'checkbox',
	'title' => 'Checkbox Example',
	'desc' => 'Check it to wake it',
	'type' => 'checkbox'));


/** Add admin menu settings procedual **/
	// require_once plugin_dir_path( __FILE__ ) . 'admin/admin-settings/admin-menu.php';
	// require_once plugin_dir_path( __FILE__ ) . 'admin/admin-settings/settings-page.php';
	// require_once plugin_dir_path( __FILE__ ) . 'admin/admin-settings/settings-register.php';
	// require_once plugin_dir_path( __FILE__ ) . 'admin/admin-settings/settings-callbacks.php';


}

/**
 * 
 */
// function enqueue_plugin_scripts_styles() {

// 	// Instantiate the Assets class.
// 	$asset_versioning = new Classes\AssetVersioning;
	
// 	wp_enqueue_script(
// 		'dpuk-plugin-template-script', 
// 		DPT_URL . 'assets/js/dpuk-plugin-template' . $asset_versioning->suffix() . '.js',
// 		[ 'jquery' ],
// 		$asset_versioning->version_control(),
// 		true 
// 	);

// 	wp_enqueue_style( 
// 		'dpuk-plugin-template-styles',
// 		DPT_URL . 'assets/css/dpuk-plugin-template' . $asset_versioning->suffix() . '.css',
// 		array(),
// 		$asset_versioning->version_control(),
// 		false 
// 		);

// }
// add_action( 'wp_enqueue_scripts', __NAMESPACE__ . '\enqueue_plugin_scripts_styles');