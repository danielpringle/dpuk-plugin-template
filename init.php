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
	new Classes\EnqueueAssets();
	

	/** EXAMPLES - delete */
	// new Classes\Dog;
	// $run_cat = new Classes\Cat;
	// $run_cat->hook_into_wordpress();



	$languages = array();
  
	$languages['Python'] = array(
		"first_release" => "1991", 
		"latest_release" => "3.8.0", 
		"designed_by" => "Guido van Rossum",
		"description" => array(
			"extension" => ".py", 
			"typing_discipline" => "Duck, dynamic, gradual",
			"license" => "Python Software Foundation License"
		)
	);
	  
	$languages['PHP'] = array(
		"first_release" => "1995", 
		"latest_release" => "7.3.11", 
		"designed_by" => "Rasmus Lerdorf",
		"description" => array(
			"extension" => ".php", 
			"typing_discipline" => "Dynamic, weak",
			"license" => "PHP License (most of Zend engine
				 under Zend Engine License)"
		)
	);

	// foreach ( $languages as $language ) {
	// 	new Classes\Language($language);
	// }




	// $allZones = array (
	// 	'header'    =>  array(
	// 		'div1',
	// 		'div2'
	// 	),
	// 	'content'   =>  array(
	// 		'div3', 
	// 		'div4'
	// 		)        
	// );


	// foreach($allZones as $newZoneId => $newZoneSubs) {
	// 	$newZone = new Classes\Zone($newZoneId, $newZoneSubs);
	// 	echo $newZone, "\n";
	// }




	
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

	// require_once plugin_dir_path( __FILE__ ) . 'admin/admin-settings/admin-menu.php';
	// require_once plugin_dir_path( __FILE__ ) . 'admin/admin-settings/settings-page.php';
	// require_once plugin_dir_path( __FILE__ ) . 'admin/admin-settings/settings-register.php';
	// require_once plugin_dir_path( __FILE__ ) . 'admin/admin-settings/settings-callbacks.php';

	$admin_pages = array (

		"top_level" => array(
			'menu_type' => 'top',
			'page_title' => 'page_title',
			'menu_title' => 'dan title',
			'menu_slug' => 'menu_slug',
			'capability' => 'manage_options',
			'icon_url' => 'dashicons-welcome-widgets-menus',
			'position' => null,
		),

		"submenu" => array(
			'menu_type' => 'submenu',
			'parent_slug' => 'menu_slug',
			'page_title' => 'Sub Menu Title',
			'menu_title' => 'Sub title',
			'capability' => 'manage_options',
			'menu_slug' => 'sub_menu_slug',

		),

	);

	foreach ( $admin_pages as $admin_page ) {

		if($admin_page['menu_type'] == 'top'){
			new Admin\MyPlugin_AddAdminPages( 
				$admin_page['page_title'], 
				$admin_page['menu_title'],
				$admin_page['menu_slug'], 
				$admin_page['capability'],
				$admin_page['icon_url'], 
				$admin_page['position'], 
			);
		} else if($admin_page['menu_type'] == 'submenu'){
			new Admin\MyPlugin_AddAdminSubPages( 
				$admin_page['parent_slug'], 
				$admin_page['page_title'], 
				$admin_page['menu_title'],
				$admin_page['menu_slug'], 
				$admin_page['capability'],
			);
		}

	}

	new Admin\ExtendSub( 
		'menu_slug', 
		'My Sub', 
		'My Sub',
		'my_sub', 
		'manage_options',
	);

	/**
	 * Add Admin sections
	 */
	$admin_sections = array (
		"section-one" => array(
			'id' => 'sectionid',
			'title' => 'section title',
			'page' => 'menu_slug',
		),
	);
	foreach ( $admin_sections as $admin_section ) {

			new Admin\Admin_Add_Sections( 
				$admin_section['id'], 
				$admin_section['title'],
				$admin_section['page'], 
			);
	}



    /**
	 * Add admin elements
	 * @example examples/example-elements.php
	 */
	$admin_elements = array (
		"cb1" => array(
			'element_type' => 'textfield',
			'id' => 'elementid',
			'title' => 'a title',
			'page' => 'menu_slug',
			'section' => 'sectionid',
			'label' => 'a label',
			"items" => array(),
		),

		"cb2" => array(
			'element_type' => 'checkbox',
			'id' => 'elementid2',
			'title' => 'a checkbox',
			'page' => 'menu_slug',
			'section' => 'sectionid',
			'label' => null,
			"items" => array(),
		),

		"cb3" => array(
			'element_type' => 'radios',
			'id' => 'elementid3',
			'title' => 'radios',
			'page' => 'menu_slug',
			'section' => 'sectionid',
			'label' => null,
			"items" => array(
				"on" => "On", 
				"off" => "Off",
			),
		),

		"cb4" => array(
			'element_type' => 'select',
			'id' => 'elementid4',
			'title' => 'selects',
			'page' => 'menu_slug',
			'section' => 'sectionid',
			'label' => null,
			"items" => array(
				'default'   => 'Default',
				'light'     => 'Light',
				'blue'      => 'Blue',
				'coffee'    => 'Coffee',
				'ectoplasm' => 'Ectoplasm',
				'midnight'  => 'Midnight',
				'ocean'     => 'Ocean',
				'sunrise'   => 'Sunrise',
			),
		),
	);
	foreach ( $admin_elements as $admin_element ) {

		new Admin\Admin_Add_Elements( 
			$admin_element['element_type'],
			$admin_element['id'], 
			$admin_element['title'],
			$admin_element['page'], 
			$admin_element['section'],
			$admin_element['label'], 
			$admin_element['items'], 
		);
	}




}








// $options = get_option(menu_slug_option);
// var_dump($options["elementid3"]);