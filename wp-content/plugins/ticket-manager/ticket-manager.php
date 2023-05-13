<?php

/**
 * 
 * @package TicketManager
 */

/*
    Plugin Name: Ticket Manager
    Plugin URI: http://example.com
    Description: A plugin for managing tickets issued to employees
    Vesion: 1.0
    Author: Brin
    Author URI: http://example.com
 */

defined('ABSPATH') or die("Stop");

use Inc\Base\Activate;
use Inc\Base\Deactivate;
use  Inc\Init;

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once(dirname(__FILE__) . '/vendor/autoload.php');
}

function activate_tm_plugin()
{
    Activate::activate();
}
register_activation_hook(__FILE__, 'activate_tm_plugin');

function deactivate_tm_plugin()
{
    Deactivate::deactivate();
}
register_deactivation_hook(__FILE__, 'deactivate_tm_plugin');

if (class_exists('Inc\\Init')) {
    Init::register_services();
}
