<?php
/**
 * Plugin Name
 *
 * @package           PluginPackage
 * @author            behzad mahmudiazar
 * @copyright         2024 behzad mahmudiazar
 *
 * @wordpress-plugin
 * Plugin Name:       ارتباط با ما
 * Description:       با استفاده از این ماژول می توانید با مشتریان خود در ارتباط باشید
 * Version:           1.0.0
 * Requires PHP:      8.0
 * Author:             بهزاد محمودی آذر
 */



 // Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}



define("SHNO_CONFIG", plugin_dir_path(__FILE__) . "lib/config.php");
require_once (SHNO_CONFIG);
require_once (plugin_dir_path(__FILE__) . "admin/admin.php");
require_once (plugin_dir_path(__FILE__) . "public/ShnoPublic.php");

$shno_config = new config();
$shno_config->Check(__FILE__);
$shno_config->setRoute();


// $shno_config->getUrlRegister();


if (is_admin()) {
    $shno_Admin = new admin();
    $shno_Admin->load();
}


add_shortcode('SHNOPUBLIC', 'shno_load');
function shno_load($atts = [], $content = null)
{
    if (!is_admin()) {
        $shno_public = new ShnoPublic();
        $shno_public->load();
    }
}


// function my_menu_pages() {
//     $hook = add_submenu_page(
//             'null', 'Page Title', 'Page Title', 'administrator', 'sub-menu-slug', function() {
//     }
//     );
//     add_action('load-' . $hook, function() {
//         // add your xml code here, 
//         // you will get a blank page to start with
//         require_once ABSPATH . 'wp-admin/admin-header.php'; 
//         echo "hhhh";
//          require_once ABSPATH . 'wp-admin/admin-footer.php'; 
//         exit;
//     });
// }

// add_action('admin_menu', 'my_menu_pages');


























































