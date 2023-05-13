<?php

/**
 * 
 * @package TicketManager
 */

namespace Inc\Pages;

class ManageTicket
{
    public function register()
    {
        $this->create_tickets_table();
    }

    function create_tickets_table()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'tickets';

        $query = "CREATE TABLE IF NOT EXISTS " . $table_name . "(
            id int AUTO_INCREMENT PRIMARY KEY, 
            title text NOT NULL,
            employee_id int NOT NULL,
            status int NOT NULL DEFAULT 0,
            deleted int NOT NULL DEFAULT 0
         );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($query);
    }
}
