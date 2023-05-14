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
        add_action('admin_menu', [$this, 'add_view_all_tickets_page']);
        add_action('admin_menu', [$this, 'add_edit_ticket_page']);
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

    function add_view_all_tickets_page()
    {
        add_menu_page(
            'View All Tickets',
            'View All Tickets',
            'manage_options',
            'view_tickets',
            [$this, "view_all_cb"],
            'dashicons-open-folder',
            111
        );
    }

    function view_all_cb()
    {
        require_once ABSPATH . 'wp-content/plugins/ticket-manager/templates/view_tickets.php';
    }

    function add_edit_ticket_page()
    {
        add_submenu_page(
            " ",
            'Edit Ticket',
            'Edit Ticket',
            'manage_options',
            'edit_ticket',
            [$this, "edit_ticket_cb"]
        );
    }

    function edit_ticket_cb()
    {
        require_once ABSPATH . 'wp-content/plugins/ticket-manager/templates/edit_ticket.php';
    }
}
