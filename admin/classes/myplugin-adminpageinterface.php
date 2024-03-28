<?php
namespace DPUK_Plugin_Template\Admin;
/**
 * A WordPress admin page.
 */
interface MyPlugin_AdminPageInterface
{
    /**
     * Get the capability required to view the admin page.
     *
     * @return string
     */
    public function get_capability();

    /**
     * Get the title of the admin page in the WordPress admin menu.
     *
     * @return string
     */
    public function get_menu_title();

    /**
     * Get the title of the admin page.
     *
     * @return string
     */
    public function get_page_title();

    /**
     * Get the slug used by the admin page.
     *
     * @return string
     */
    public function get_slug();

    /**
     * Renders the admin page.
     */
    public function render_page();
}