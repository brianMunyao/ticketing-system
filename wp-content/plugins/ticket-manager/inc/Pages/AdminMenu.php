<?php

/**
 * 
 * @package TicketManager
 */

namespace Inc\Pages;

use \Inc\Api\SettingsApi;
use \Inc\Api\AdminMenuCallbacks;

class AdminMenu
{
    public $pages = [];
    public $sub_pages = [];

    public $admin_callbacks;
    public $settings;


    function register()
    {
        $this->admin_callbacks = new AdminMenuCallbacks();
        $this->settings = new SettingsApi;

        $this->pages = [
            [
                'page_title' => 'Create Ticket',
                'menu_title' => 'Create Ticket',
                'capability' => 'manage_options',
                'menu_slug' => 'create_ticket',
                'callback' => [$this->admin_callbacks, "create_ticket_callback"],
                'icon_url' => 'dashicons-edit',
                'position' => 110
            ],
            [
                'page_title' => 'View All Tickets',
                'menu_title' => 'View All Tickets',
                'capability' => 'manage_options',
                'menu_slug' => 'view_tickets',
                'callback' => [$this->admin_callbacks, "view_all_tickets_callback"],
                'icon_url' => 'dashicons-open-folder',
                'position' => 111
            ],
        ];

        $this->settings->add_pages($this->pages)->register();
        add_action('admin_menu', [$this, 'add_edit_ticket_page']);
        add_action('admin_menu', [$this, 'view_deleted_tickets_page']);
    }

    function add_edit_ticket_page()
    {
        add_submenu_page(
            " ",
            'Edit Ticket',
            'Edit Ticket',
            'manage_options',
            'edit_ticket',
            [$this->admin_callbacks, "edit_ticket_callback"]
        );
    }

    function view_deleted_tickets_page()
    {
        add_submenu_page(
            " ",
            'Deleted Tickets',
            'Deleted Tickets',
            'manage_options',
            'deleted_tickets',
            [$this->admin_callbacks, "view_deleted_tickets_callback"],
        );
    }
}
