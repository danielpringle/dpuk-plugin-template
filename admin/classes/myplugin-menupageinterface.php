<?php
namespace DPUK_Plugin_Template\Admin;
/**
 * A WordPress top-level menu page.
 */
interface MyPlugin_MenuPageInterface extends MyPlugin_AdminPageInterface
{
    /**
     * Get the URL of the icon used by the admin page.
     *
     * You can also return:
     * - A base64-encoded SVG using a data URI, which will be colored to match the color scheme. This should begin with 'data:image/svg+xml;base64,'.
     * - The name of a Dashicons helper class to use a font icon, e.g. 'dashicons-chart-pie'.
     * - The value 'none' to leave div.wp-menu-image empty so an icon can be added via CSS.
     *
     * @return string
     */
    public function get_icon_url();

    /**
     * Get the position of the admin page in the menu order of the WordPress admin sidebar.
     *
     * @return int
     */
    public function get_position();
}