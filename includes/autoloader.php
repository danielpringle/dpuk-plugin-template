<?php
/**
 * Register plugin classes
 *
 * The autoloader registers plugin classes for later use.
 *
 * @package    DPUK_Plugin_Template
 * @subpackage Includes
 * @category   Classes
 * @since      1.0.0
 */

namespace DPUK_Plugin_Template;

// Restrict direct access.
if ( ! defined( 'ABSPATH' ) ) {
	die;
}

/**
 * Class files
 *
 * Defines the class directory and file prefix.
 *
 * @since 1.0.0
 * @var   string Defines the class file path.
 */
define( 'DPT_CLASS', DPT_PATH . 'includes/classes/class-' );

define( 'DPT_ADMIN', DPT_PATH . 'admin/classes/' );

/**
 * Array of classes to register
 *
 * @since 1.0.0
 * @var   array Defines an array of class files to register.
 */
define( 'DPT_CLASSES', [
	__NAMESPACE__ . '\Classes\AssetVersioning'          => DPT_CLASS . 'asset-versioning.php',
    __NAMESPACE__ . '\Classes\EnqueueAssets'            => DPT_CLASS . 'enqueue-assets.php',
	__NAMESPACE__ . '\Admin\Admin_Page'        		    => DPT_ADMIN . 'admin-page.php',

	__NAMESPACE__ . '\Admin\MyPlugin_AdminPageInterface' => DPT_ADMIN . 'myplugin-adminpageinterface.php',
	__NAMESPACE__ . '\Admin\MyPlugin_MenuPageInterface'  => DPT_ADMIN . 'myplugin-menupageinterface.php',
	__NAMESPACE__ . '\Admin\MyPlugin_SubmenuPageInterface' => DPT_ADMIN . 'myplugin-submenupageinterface.php',
	__NAMESPACE__ . '\Admin\MyPlugin_AddAdminPages' => DPT_ADMIN . 'myplugin_add_admin_pages.php',
	__NAMESPACE__ . '\Admin\MyPlugin_AddAdminSubPages' => DPT_ADMIN . 'myplugin_add_admin_sub_pages.php',
	__NAMESPACE__ . '\Admin\Admin_Add_Sections' => DPT_ADMIN . 'admin-add-sections.php',
	__NAMESPACE__ . '\Admin\Admin_Add_Elements' => DPT_ADMIN . 'admin-add-elements.php',

	__NAMESPACE__ . '\Admin\ExtendSub' => DPT_ADMIN . 'extend-sub.php',

	__NAMESPACE__ . '\Classes\Language'            => DPT_CLASS . 'language.php',
	__NAMESPACE__ . '\Classes\ConversionHelper'            => DPT_CLASS . 'helper-functions.php',


	/** examples **/
	// __NAMESPACE__ . '\Classes\Dog'                 		=> DPT_CLASS . '!example-dog.php',
	// __NAMESPACE__ . '\Classes\Cat'                 		=> DPT_CLASS . '!example-cat.php',


] );

/**
 * Autoload class files
 *
 * @since  1.0.0
 * @access public
 * @return void
 */
spl_autoload_register(
	function ( string $class ) {
		if ( isset( DPT_CLASSES[ $class ] ) ) {
			require DPT_CLASSES[ $class ];
		}
	}
);