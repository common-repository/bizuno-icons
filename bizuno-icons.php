<?php
/**
 * Plugin Name: Bizuno Icons
 * Plugin URI: https://www.phreesoft.com/products/wordpress-bizuno-icons
 * Description: Provides an alternate icon set for the Bizuno Accounting plugin based on the Nuvola project
 * Version: 1.0.0
 * Author: PhreeSoft, Inc.
 * Author URI: http://www.PhreeSoft.com
 * Text Domain: bizuno
 * License: GPL3
 * License URI: https://www.gnu.org/licenses/gpl.html
 * Domain Path: /locale
 */

if (!defined( 'ABSPATH' )) { die( 'No script kiddies please!' ); }

/**
 * Retrieves the list of skins and adds them to the running list
 * @param array $icons
 * @return modified $skins
 */
function bizunoIconsGetList(&$icons=[]) {
    $path = plugin_dir_path( __FILE__ ) . 'icons/';
    $choices = scandir($path);
    foreach ($choices as $choice) {
        if (!in_array($choice, ['.','..']) && is_dir($path.$choice)) {
            $icons[] = ['id'=>$choice, 'text'=>ucwords(str_replace('-', ' ', $choice))];
        }
    }
}

/**
 * Returns the file system path of the icon folder from the plugin
 * @return string
 */
function bizunoIconPath() {
    return plugin_dir_path( __FILE__ ) . 'icons/';
}

/**
 * Returns the URL of the icon folder from the plugin
 * @return type
 */
function bizunoIconURL() {
    return plugin_dir_url( __FILE__ ) . 'icons/';
}

/**
 * Things to do upon plugin activation
 */
register_activation_hook( __FILE__ , 'bizuno_icons_activate' );
function bizuno_icons_activate() {

}

/**
 * Things to do upon plugin deactivation
 */
register_deactivation_hook(__FILE__ , 'bizuno_icons_deactivate' );
function bizuno_icons_deactivate() {

}

