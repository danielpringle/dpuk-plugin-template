<?php
namespace DPUK_Plugin_Template\Admin;

class Admin_Add_Elements {


    public $element_type;
    public $id;
    public $title; 
    public $page;
    public $section;
    public $label;
    public $items;
    /**
     * @example ../../examples/example-elements.php
     * 
     */
    public function __construct(
        $element_type,
        $id, 
        $title, 
        $page,
        $section,
        $label = '',
        $items = array() 
        ) {
            $this->element_type = $element_type;
            $this->id = $id;
            $this->title = $title; 
            $this->page = $page; 
            $this->section = $section; 
            $this->label = $label; 
            $this->items = $items; 

            add_action( 'admin_init', array( $this, 'add_element'));

       
            
    }


    public function get_element_type(){
        
        return $this->element_type;
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

    public function get_section(){
        
        return $this->section;
    }

    public function get_label(){
        
        return $this->label;
    }

    /**
     * Renders the given template if it's readable.
     *
     * @param string $template
     */
    public function render_element($args)
    {

        
        $element_type = $this->get_element_type();

        switch ($element_type) {
          case "textfield":
                $this->render_textfield($args);
            break;
            case "checkbox":
                $this->render_checkbox($args);
            break;
            case "radios":
                $this->render_radio_buttons($args);
            break; 
            case "select":
                $this->render_select_fields($args);
            break;    
          default:
            echo "Your favorite color is neither red, blue, nor green!";
        }
    }

    public function render_checkbox($args){

        $option_name = $this->get_page() . '_option'; 

        $options = get_option( $option_name );
	
        $id    = isset( $args['id'] )    ? $args['id']    : '';
        $label = isset( $args['label'] ) ? $args['label'] : '';
        
        $checked = isset( $options[$id] ) ? checked( $options[$id], 1, false ) : '';
        
        echo '<input id="'.$option_name.'_'. $id .'" name="'.$option_name.'['. $id .']" type="checkbox" value="1"'. $checked .'> ';
        echo '<label for="'.$option_name.'_'. $id .'">'. $label .'</label>';

    }

    public function render_textfield($args){

        $option_name = $this->get_page() . '_option'; 

        $options = get_option( $option_name );

        $id    = isset( $args['id'] )    ? $args['id']    : '';
        $label = isset( $args['label'] ) ? $args['label'] : '';
    
        $value = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';
    
        echo '<input id="' . $option_name .'_'. $id .'" name="' . $option_name .'['. $id .']" type="text" size="40" value="'. $value .'"><br />';
        echo '<label for="' . $option_name .'_'. $id .'">'. $label .'</label>';

    }

    // callback: radio field
    public function render_radio_buttons($args) {

    $option_name = $this->get_page() . '_option'; 

	$options = get_option( $option_name );

	$id    = isset( $args['id'] )    ? $args['id']    : '';
	$label = isset( $args['label'] ) ? $args['label'] : '';

	$selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

    $radio_options = $this->items;

	// $radio_options = array(

	// 	'enable'  => 'Enable custom styles',
	// 	'disable' => 'Disable custom styles'

	// );

	foreach ( $radio_options as $value => $label ) {

		$checked = checked( $selected_option === $value, true, false );

		echo '<label><input name="' . $option_name .'['. $id .']" type="radio" value="'. $value .'"'. $checked .'> ';
		echo '<span>'. $label .'</span></label><br />';
	}   
}

 // callback: radio field
 public function render_select_fields($args) {

    $option_name = $this->get_page() . '_option'; 

    $options = get_option( $option_name );

    $id    = isset( $args['id'] )    ? $args['id']    : '';
    $label = isset( $args['label'] ) ? $args['label'] : '';

    $selected_option = isset( $options[$id] ) ? sanitize_text_field( $options[$id] ) : '';

    $select_options = $this->items;

    echo '<select id="' . $option_name .'_'. $id .'" name="' . $option_name .'['. $id .']">';

    foreach ( $select_options as $value => $option ) {

        $selected = selected( $selected_option === $value, true, false );

        echo '<option value="'. $value .'"'. $selected .'>'. $option .'</option>';

    }

    echo '</select> <label for="' . $option_name .'_'. $id .'">'. $label .'</label>';
}






    public function add_element(){


        // die('m');
        // var_dump($this->get_title());
        // var_dump($this->get_page());
        // var_dump($this->get_section());
        // var_dump($this->get_label());

        add_settings_field(
            $this->get_id(),
            $this->get_title(),
            array( $this, 'render_element' ),
            $this->get_page(),
            $this->get_section(),
            [ 'id' => $this->get_id(), 'label' => $this->get_label(), ]
        );
 


    }


}