<?php

/**
 * 
 * @package TicketManager
 */

namespace Inc\Pages;


class AdminMenu
{
    function register()
    {
        add_action('admin_menu', [$this, 'add_create_ticket_page']);
        // add_action('admin_menu', [$this, 'add_view_all_page']);
    }

    function add_create_ticket_page()
    {
        add_menu_page(
            'Create Ticket',
            'Create Ticket',
            'manage_options',
            'create_ticket',
            [$this, "add_create_ticket_cb"],
            'dashicons-edit',
            110
        );
    }

    function add_create_ticket_cb()
    {
        require_once ABSPATH . 'wp-content/plugins/ticket-manager/templates/create_ticket.php';
    }

    // function add_view_all_page()
    // {
    //     add_menu_page(
    //         'View All Trainees',
    //         'View All Trainees',
    //         'manage_options',
    //         'view_trainees',
    //         [$this, "view_all_cb"],
    //         'dashicons-open-folder',
    //         111
    //     );
    // }

    // function view_all_cb()
    // {
    //     require_once ABSPATH . 'wp-content/plugins/class-manager/templates/view_trainees.php';
    // }
}
