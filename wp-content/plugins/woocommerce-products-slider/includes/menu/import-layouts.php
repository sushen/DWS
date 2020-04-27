<?php	
if ( ! defined('ABSPATH')) exit;  // if direct access

$wcps_plugin_info = get_option('wcps_plugin_info');

//var_dump($wcps_plugin_info);

$url = admin_url().'edit.php?post_type=wcps&page=upgrade_status';

?>
<?php

?>
<div class="wrap">
	<div id="icon-tools" class="icon32"><br></div><h2><?php echo sprintf(__('%s - Import layouts', 'woocommerce-products-slider'), wcps_plugin_name)?></h2>


    <form  method="post" action="<?php echo str_replace( '%7E', '~', $_SERVER['REQUEST_URI']); ?>">
        <input type="hidden" name="wcps_hidden" value="Y">
        <?php
        if(!empty($_POST['wcps_hidden'])){
            $nonce = sanitize_text_field($_POST['_wpnonce']);
            if(wp_verify_nonce( $nonce, 'wcps_nonce' ) && $_POST['wcps_hidden'] == 'Y') {
                //do_action('wcps_settings_save');

                $import_layouts = isset($_POST['import_layouts']) ? 'done' : '';
                $wcps_plugin_info['import_layouts'] = $import_layouts;

                update_option('wcps_plugin_info', $wcps_plugin_info)

                ?>
                <div class="updated notice  is-dismissible"><p><strong><?php _e('Changes Saved.', 'woocommerce-products-slider' ); ?></strong></p></div>
                <?php
            }
        }


        if (is_plugin_active('woocommerce-products-slider-pro/woocommerce-products-slider-pro.php')){
            $layouts_plugin_url = wcps_pro_plugin_url;
        }else{
            $layouts_plugin_url = wcps_plugin_url;
        }



        ?>

        <p><b>PickPlugins Product Slider</b> provide some ready layouts to get started, please follow the steps bellow to import default layouts.</p>

        <ul>
            <li>Step - 1: Go to <a href="<?php echo admin_url(); ?>import.php">import</a> menu and install & activate <b>WordPress</b> Importer plugin. click to "Install Now" button to install.</li>
            <li>Step - 2: Download following xml file <a href="<?php echo $layouts_plugin_url; ?>sample-data/wcps-layouts.xml">wcps-layouts.xml</a>, save the file on your local machine.</li>
            <li>Step - 3: Go to importer page <a href="<?php echo admin_url(); ?>import.php?import=wordpress">Import WordPress</a> and chose the downloaded file and then click to <b>Upload file and import</b>.</li>
            <li>Step - 4: Go to <a href="<?php echo admin_url(); ?>edit.php?post_type=wcps_layout">WCPS layouts</a> page to see imported layouts.</li>

        </ul>


        <p><label><input type="checkbox" name="import_layouts" value="1"> Mark as done</label></p>


        <div class="clear clearfix"></div>
        <p class="submit">
            <?php wp_nonce_field( 'wcps_nonce' ); ?>
            <input class="button button-primary" type="submit" name="Submit" value="<?php _e('Save Changes','woocommerce-products-slider' ); ?>" />
        </p>


    </form>


















</div>
