<?php

defined('ABSPATH') or die('Oppss! you can not access this file');

include_once(ABSPATH.'wp-admin/includes/plugin.php');

add_action("admin_menu", "addMenu");

function addMenu()
{
    add_menu_page("Roketin", "Roketin", 'manage_options', "options", "dashboard", 'dashicons-carrot', 25);   
    add_submenu_page("options", "Setting", "Setting", 'manage_options', "setting", "setting");
}

function dashboard()
{
    $roketin = new Roketin;
    $roketinView = new RoketinView;


    if( is_plugin_active( 'woocommerce/woocommerce.php' ) ) {
        $roketinView->view('dashboard');
    } else {
        $roketinView->view('err_woocomerce');
    }

    // $roketin->login("admin@roketin.com", "adminApp123!");

    // echo json_encode($roketin->users());
}

function setting()
{
    include_once(dirname( __FILE__ ) . '\views\setting.html');
}