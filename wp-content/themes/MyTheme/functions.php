<?php

function mytheme_scripts_enqueue()
{
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/style.css', [], '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'mytheme_scripts_enqueue');

global $success_msg;
global $error_msg;


function redirect_on_login()
{
    wp_redirect(home_url());
    exit();
}
add_action('wp_login', 'redirect_on_login');

function redirect_on_logout()
{
    wp_redirect(site_url('/login'));
    exit();
}
add_action('wp_login', 'redirect_on_logout');
