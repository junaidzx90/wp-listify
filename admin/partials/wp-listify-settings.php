<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://www.fiverr.com/junaidzx90
 * @since      1.0.0
 *
 * @package    Wp_Listify
 * @subpackage Wp_Listify/admin/partials
 */
?>

<h3>WP Listify Settings</h3>
<hr>

<form style="width: 40%" method="post" action="options.php">
    <?php
    settings_fields( 'wpl_setting_section' );
    do_settings_sections('wpl_setting_page');
    echo get_submit_button( 'Save Changes', 'primary', 'save-setting' );
    ?>
</form>