<?php

/**
 * 
 * @package TicketManager
 */

namespace Inc\Base;

class Activate
{
    static function activate()
    {
        // echo 'Text activation';
        flush_rewrite_rules();
    }
}
