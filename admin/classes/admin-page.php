<?php
namespace DPUK_Plugin_Template\Admin;

class Admin_Page {

    /**
     * Admin_Page constructor.
     */
    public function __construct() {
         add_action( 'admin_menu', array( $this, 'add_page' ) );
        // add_action( 'admin_init', array( $this, 'register_sections' ) );
    }    

    /**
     * Add this page as a top-level menu page.
     */
    public function add_page() {
        add_menu_page(
            $this->get_page_title(),    // page_title
            $this->get_menu_title(),    // menu_title
            $this->get_capability(),    // capability
            $this->get_slug(),          // menu_slug
            array( $this, 'render' ),   // callback function
            $this->get_icon_url(),      // icon_url
            $this->get_position()       // position
        );
    }

    /**
     * Register sections.
     */
    public function register_sections() {
        // TODO: Implement this method.
    }



    /**
     * Get the title of the admin page.
     *
     * @return string
     */
    public function get_page_title()
    {
        return 'My Plugin Admin Page';
    }

    /**
     * Return the menu icon to be used for this menu.
     *
     * @link https://developer.wordpress.org/resource/dashicons/
     *
     * @return string
     */
    protected function get_icon_url() {
        return 'dashicons-admin-generic';
    }
    public function get_position() { 
        return null;
     }



    /**
     * Get the capability required to view the admin page.
     *
     * @return string
     */
    public function get_capability()
    {
        return 'install_plugins';
    }

    /**
     * Get the title of the admin page in the WordPress admin menu.
     *
     * @return string
     */
    public function get_menu_title()
    {
        return 'My Plugin';
    }



    /**
     * Get the parent slug of the admin page.
     *
     * @return string
     */
    public function get_parent_slug()
    {
        return 'options-general.php';
    }

    /**
     * Get the slug used by the admin page.
     *
     * @return string
     */
    public function get_slug()
    {
        return 'myplugin';
    }

    /**
     * Renders the given template if it's readable.
     *
     * @param string $template
     */
    public function render()
    {
        $template_path = DPT_PATH . 'admin/classes/template.php';

  
        if (!is_readable($template_path)) {
            return;
        }
 
        include $template_path;
    }

}