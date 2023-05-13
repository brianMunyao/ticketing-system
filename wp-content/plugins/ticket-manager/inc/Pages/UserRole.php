<?php

/**
 * 
 * @package TicketManager
 */

namespace Inc\Pages;

class UserRole
{
    function register()
    {
        $this->add_employee_role();
    }

    function add_employee_role()
    {
        add_role(
            'employee',
            'Employee',
            [
                'read' => true,
                'edit_posts' => true,
                'edit_pages' => true,
                'upload_files' => true,
                'delete_posts' => true,
                'edit_published_posts' => true,
                'delete_published_pages' => true,
                'delete_published_posts' => true
            ]
        );
    }
}
