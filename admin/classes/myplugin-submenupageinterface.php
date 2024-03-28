<?php
namespace DPUK_Plugin_Template\Admin;
/**
 * A WordPress submenu page.
 */
interface MyPlugin_SubmenuPageInterface extends MyPlugin_AdminPageInterface
{
    /**
     * Get the parent slug of the admin page.
     *
     * @return string
     */
    public function get_parent_slug();
}