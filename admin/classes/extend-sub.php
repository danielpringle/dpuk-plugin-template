<?php
namespace DPUK_Plugin_Template\Admin;

class ExtendSub extends MyPlugin_AddAdminSubPages {

    /**
     * Renders the page output.
     *
     * @return void
     */
    public function render_page()
    {

        $dpukadmin = 'Example here';
        $success_notice = '';

        // Check if with have a data being passed. 
        // If no, run our function.
        if( ! empty($_POST['dpuk_action']) && 'dpuk_value' === $_POST['dpuk_action'] && current_user_can( 'manage_options') ){
            $dpukadmin = $this->start_test();  
        }
   
        // If we have data 
        if( '1' === get_option( 'successful_dpuk_test', '0')){
            $success_notice = "Test ran successfully";
            delete_option('successful_dpuk_test');
            // flush_rewrite_rules();
        }

        ?>
        <div class="wrap">
            <form method="post" action="<?php echo admin_url('admin.php?page=my_sub');?>">
                <h1><?php echo esc_html( $this->get_page_title() ); ?></h1>
                <h2><?php echo $dpukadmin ?></h2>
                <!-- set value of input field -->
                <input type="hidden" name="dpuk_action" value="dpuk_value">
                <input class="wp-core-ui button "type="submit" value="Run function" />
            </form>
        </div>
        <?php            
        if( !empty($success_notice)){
            echo $success_notice;
        }
    }


    /**
     * Runs our functions
     * 
     * @return void
     */
    public function start_test(){

        if (function_exists('set_time_limit')){
            set_time_limit(300);
        }

        $fail = false;
    
        $dpukadmin = 'Our content updated!';

        if( $dpukadmin instanceof \WP_Error){
            $fail = true;
        }

        if (!$fail){
            update_option('successful_dpuk_test', '1');
        }

        return $dpukadmin;
    
    }

}