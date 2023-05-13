<?php

function mytheme_scripts_enqueue()
{
    wp_enqueue_style('customstyle', get_template_directory_uri() . '/style.css', [], '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'mytheme_scripts_enqueue');
