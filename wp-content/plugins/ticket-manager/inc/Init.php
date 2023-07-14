<?php

/**
 * 
 * @package TicketManager
 */

namespace Inc;

use Inc\Pages\AdminMenu;
use Inc\Pages\UserRole;
use Inc\Pages\ManageTicket;

class Init
{
    public static function get_services()
    {
        return [
            AdminMenu::class,
            UserRole::class,
            ManageTicket::class
        ];
    }

    public static function register_services()
    {
        foreach (self::get_services() as $class) {
            $service = self::instantiate($class);
            if (method_exists($service, 'register')) {
                $service->register();
            }
        }
    }

    private static function instantiate($class)
    {
        $service = new $class;
        return $service;
    }
}
