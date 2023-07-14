<?php

/**
 * 
 * @package TicketManager
 */


namespace Inc\Api;

use \Inc\Base\BaseController;

class AdminMenuCallbacks extends BaseController
{

    public function create_ticket_callback()
    {
        return require_once $this->plugin_path . 'templates/create_ticket.php';
    }

    public function edit_ticket_callback()
    {
        return require_once ABSPATH . 'wp-content/plugins/ticket-manager/templates/edit_ticket.php';
    }

    public function view_all_tickets_callback()
    {
        return require_once ABSPATH . 'wp-content/plugins/ticket-manager/templates/view_tickets.php';
    }
    public function view_deleted_tickets_callback()
    {
        return require_once ABSPATH . 'wp-content/plugins/ticket-manager/templates/deleted_tickets.php';
    }
}
