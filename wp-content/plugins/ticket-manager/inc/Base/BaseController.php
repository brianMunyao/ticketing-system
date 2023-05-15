<?php

/**
 * 
 * @package TicketManager
 */

namespace Inc\Base;

class BaseController
{
    public $success_msg;
    public $error_msg;

    public $plugin_path;

    function __construct()
    {
        $this->success_msg = '';
        $this->error_msg = '';

        $this->plugin_path = plugin_dir_path(dirname(__FILE__, 2));
    }
}
