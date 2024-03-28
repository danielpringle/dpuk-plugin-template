<?php
namespace DPUK_Plugin_Template\Admin;

class Admin_Add_Sections {

    public $id;
    public $title; 
    public $page;

    public function __construct(
        $id, 
        $title, 
        $page
        ) {

            $this->id = $id;
            $this->title = $title; 
            $this->page = $page; 

            add_action( 'admin_init', array( $this, 'add_section') );
            
    }


    public function get_id(){
        
        return $this->id;
    }

    public function get_title(){
        
        return $this->title;
    }

    public function get_page(){
        
        return $this->page;
    }

    /**
     * Renders the given template if it's readable.
     *
     * @param string $template
     */
    public function render_page()
    {

        echo '<p>Add the details of the site you are syncing with. Requires valid user credentials. This plugin uses a JSON Web Token for authentication.</p>';

    }

    public function add_section(){
 
        add_settings_section(
            $this->get_id(),
            $this->get_title(),
            array( $this, 'render_page' ),
            $this->get_page(),
        );

    }


}