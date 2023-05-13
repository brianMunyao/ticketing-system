<?php

/**
 * 
 * @package TicketManager
 */

namespace Inc\Base;

class Deactivate
{
    static function deactivate()
    {
        flush_rewrite_rules();
    }
}
