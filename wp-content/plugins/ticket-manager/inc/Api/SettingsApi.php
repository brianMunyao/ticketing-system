<?php

/**
 * 
 * @package TicketManager
 */

namespace Inc\Api;

class SettingsApi
{
    public $admin_pages = [];
    public $admin_subpages = [];

    public function register()
    {
        if (!empty($this->admin_pages)) {
            add_action('admin_menu', [$this, 'add_admin_menu']);
        }
    }

    public function add_pages(array $pages)
    {
        $this->admin_pages = $pages;
        return $this;
    }

    public function has_sub_pages(string $title = '')
    {
        if (empty($this->admin_pages)) {
            return $this;
        }

        $admin_page = $this->admin_pages[0];

        $subpages = [
            [
                'parent_slug' => " ",
                'page_title' => $admin_page['page_title'],
                'menu_title' => $admin_page['menu_title'],
                'capability' => $admin_page['capability'],
                'callback' => function () {
                    echo "something";
                },
            ]
        ];
    }

    public function add_sub_pages(array $subpages)
    {
        // $this->admin_subpages = array_mer
        return $this;
    }

    public function add_admin_menu()
    {
        foreach ($this->admin_pages as $page) {
            add_menu_page(
                $page['page_title'],
                $page['menu_title'],
                $page['capability'],
                $page['menu_slug'],
                $page['callback'],
                $page['icon_url'] ?? null,
                $page['position'] ?? null
            );
        }

        foreach ($this->admin_subpages as $subpage) {
            add_submenu_page(
                $subpage['parent_slug'],
                $subpage['page_title'],
                $subpage['menu_title'],
                $subpage['capability'],
                $subpage['menu_slug'],
                $subpage['callback']
            );
        }
    }
}
