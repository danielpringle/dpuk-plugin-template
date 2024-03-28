<?php
namespace DPUK_Plugin_Template\Admin;

class MyPlugin_AdminPage
{

    public function __construct()
    {
       add_action('admin_menu', array($this, 'create_menu'));
    }

    public  function create_menu()
    {
        add_menu_page( 
            __( 'My Plugin Menu', 'textdomain' ),
            'My Plugin Menu', 
            'manage_options', 
            'mp_test_page',
             array($this,'display_test_page'),
            null
            );
    }

    public  function display_test_page()
    {
    if ( !current_user_can( 'manage_options' ) )  {
    wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
            }
    
    echo get_the_title();
    echo '<h2>Test page</h2>';
    echo '<p>The Problem : I cannot see that output in the corresponding submenu page</p>';
    }

}