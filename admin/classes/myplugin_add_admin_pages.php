<?php
namespace DPUK_Plugin_Template\Admin;

class MyPlugin_AddAdminPages implements MyPlugin_MenuPageInterface {

    
    public $page_title;
    public $menu_title; 
    public $capability; 
    public $menu_slug;
    public $callback; 
    public $icon_url; 
    public $position;

    public function __construct(
        $page_title, 
        $menu_title, 
        $menu_slug = '', 
        $capability, 
        $icon_url = '', 
        $position = null
        ) {

            $this->page_title = $page_title;
            $this->menu_title = $menu_title; 
            $this->capability = $capability; 
            $this->menu_slug = $menu_slug; 
            $this->icon_url = $icon_url;
            $this->position = $position;

            add_action( 'admin_menu', array( $this, 'add_page' ) );
            add_action( 'admin_init', array( $this, 'register_settings'), 1 );
            
    }


    public function get_page_title(){
        
        return $this->page_title;
    }

    public function get_menu_title(){
        
        return $this->menu_title;
    }

    public function get_capability(){
        
        return $this->capability;
    }

    public function get_slug(){
        
        return $this->menu_slug;
    }

    public function get_icon_url(){
        
        return $this->icon_url;
    }

    public function get_position(){
        
        return $this->position;
    }

        /**
     * Renders the given template if it's readable.
     *
     * @param string $template
     */
    public function render_page()
    {
        $template_path = DPT_PATH . 'admin/classes/template.php';

  
        if (!is_readable($template_path)) {
            return;
        }
 
        include $template_path;
    }

    public function add_page(){

        add_menu_page(
            $this->get_page_title(),
            $this->get_menu_title(),
            $this->get_capability(),
            $this->get_slug(),
            array( $this, 'render_page' ),
            $this->get_icon_url(),
            $this->get_position()
        );

    }

    public function register_settings(){



        register_setting(
            $this->get_slug().'_option',
            $this->get_slug().'_option',
            //$this->get_slug().'_callback_validate_options'
        );

        
    }
}