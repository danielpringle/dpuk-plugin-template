<?php

    ?>


    <div class="wrap">
        <form method="POST" action="<?php echo admin_url('admin.php?page=my_sub'); ?>">
            <input type="hidden" name="action" value="test_dpuk" />
            <h1><?php echo esc_html( $this->get_page_title() ); ?></h1>
            <h2><?php echo $dpukadmin ?></h2>
            <input class="wp-core-ui button "type="submit" value="Run" />
        </form>
    </div>
    
    <?php


