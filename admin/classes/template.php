<?php
?>

<div class="wrap">
    <form action="options.php" method="post">
        <h1><?php echo esc_html( $this->get_page_title() ); ?></h1>
        <?php
        settings_fields( $this->get_slug().'_option' );
        do_settings_sections( $this->get_slug() );
        submit_button( __( 'Change Options', 'prsdm-limit-login-attempts' ) );
        ?>
    </form>
</div>
