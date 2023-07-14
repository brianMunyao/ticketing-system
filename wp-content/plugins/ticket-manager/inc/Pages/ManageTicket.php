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
        $this->add_new_ticket();
        $this->edit_ticket();
        $this->delete_ticket();
        $this->restore_ticket();
    }

    function create_tickets_table()
    {
        global $wpdb;
        $table_name = $wpdb->prefix . 'tickets';

        $query = "CREATE TABLE IF NOT EXISTS $table_name (
            t_id int AUTO_INCREMENT PRIMARY KEY,
            t_title text NOT NULL,
            t_desc text NOT NULL,
            t_emp_no text NOT NULL,
            t_duedate DATE NOT NULL DEFAULT CURRENT_DATE,
            t_status int NOT NULL DEFAULT 0,
            t_deleted int NOT NULL DEFAULT 0
         )";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($query);
    }

    function add_new_ticket()
    {
        if (isset($_POST['new-ticket-submit'])) {
            $data = [
                't_title' => $_POST['title'],
                't_desc' => $_POST['desc'],
                't_emp_no' => $_POST['emp_no'],
                't_duedate' => $_POST['due_date'],
                't_status' => 0,
                't_deleted' => 0
            ];

            global $wpdb;
            global $success_msg;
            global $error_msg;

            $table_name = $wpdb->prefix . 'tickets';
            $results = $wpdb->insert($table_name, $data);

            if ($results) {
                $success_msg = "Ticked added successfully";
            } else {
                $error_msg = "Error adding ticket";
            }
        }
    }

    function edit_ticket()
    {
        if (isset($_POST['edit-ticket-submit'])) {
            $data = [
                't_title' => $_POST['title'],
                't_desc' => $_POST['desc'],
                't_emp_no' => $_POST['emp_no'],
                't_duedate' => $_POST['due_date'],
            ];
            $where = ['t_id' => $_POST['t_id']];

            global $wpdb;
            global $success_msg;
            global $error_msg;

            $table_name = $wpdb->prefix . 'tickets';
            $results = $wpdb->update($table_name, $data, $where);

            if ($results) {
                $success_msg = "Ticked updated successfully";
            } else {
                $error_msg = "Error updating ticket";
            }
        }
    }

    function delete_ticket()
    {
        if (isset($_POST['delete-ticket'])) {
            $data = ['t_deleted' => 1];
            $where = ['t_id' => $_POST['t_id']];

            global $wpdb;
            global $success_msg;
            global $error_msg;

            $table_name = $wpdb->prefix . 'tickets';
            $results = $wpdb->update($table_name, $data, $where);

            if ($results) {
                $success_msg = "Ticked deleted successfully";
            } else {
                $error_msg = "Error deleting ticket";
            }
        }
    }

    function restore_ticket()
    {
        if (isset($_POST['restore-ticket'])) {
            $data = ['t_deleted' => 0];
            $where = ['t_id' => $_POST['t_id']];

            global $wpdb;
            global $success_msg;
            global $error_msg;

            $table_name = $wpdb->prefix . 'tickets';
            $results = $wpdb->update($table_name, $data, $where);

            if ($results) {
                $success_msg = "Ticked restored successfully";
            } else {
                $error_msg = "Error restoring ticket";
            }
        }
    }
}
