<?php
/**
 * Plugin Name: Custom Crud Operation
 * Description: Custom Plugin to exceute crud opreation on product
 * Version: 1.0
 * Author: Ashwini Kale
 * Text Domain: crud-crud-operation
 * @param callable $function The function hooked to the 'activate_PLUGIN' action.
*/
//creating database on plugin activation
 global $custom_db;
 $custom_db = '1.0';
function product_install() {
    global $wpdb;
    global $custom_db;    
    $table_name = $wpdb->prefix . 'custom_products';
    $charset_collate = $wpdb->get_charset_collate();
    $sql = "CREATE TABLE $table_name (
  id int(10) NOT NULL AUTO_INCREMENT,
  product_name varchar(80) NOT NULL,
  product_type varchar(50) NOT NULL,
  price int(30) NOT NULL,
  product_description varchar(200),
  created_date date,
  updated_date date, 
  PRIMARY KEY  (id)
 )$charset_collate;";
    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
    add_option( 'custom_db', $custom_db );
    add_option( 'my_plugin_activated', time() );
}
register_activation_hook( __FILE__, 'product_install' );
//adding in menu
add_action('admin_menu', 'custom_product_menu');
function custom_product_menu() {
   //adding plugin in menu
    add_menu_page('product_list', //page title
        'Product Listing', //menu title
        'manage_options', //capabilities
        'Product_Listing', //menu slug
        'product_list'//function
    );

     //adding submenu to a menu
    add_submenu_page('Product_Listing',//parent page slug
        'product_insert',//page title
        'Product Insert',//menu titel
        'manage_options',//manage optios
        'Product_Insert',//slug
        'product_insert'//function
    );
    add_submenu_page( null,//parent page slug
        'product_update',//$page_title
        'Product Update',// $menu_title
        'manage_options',// $capability
        'Product_Update',// $menu_slug,
        'product_update'// $function
    );
    add_submenu_page( null,//parent page slug
        'product_delete',//$page_title
        'Product Delete',// $menu_title
        'manage_options',// $capability
        'Product_Delete',// $menu_slug,
        'product_delete'// $function
    );
}
define('ROOTDIR', plugin_dir_path(__FILE__));
require_once(ROOTDIR . 'product_list.php');
require_once (ROOTDIR.'product_insert.php');
require_once (ROOTDIR.'product_update.php');
require_once (ROOTDIR.'product_delete.php');
?>