<?php

/*
    Template Name: Home Page
*/
?>

<?php
if (!is_user_logged_in()) wp_redirect(site_url('/login'));



if (isset($_POST['check-submit'])) {
    $new_data = ['t_status' => $_POST['t_check']];
    $res = $wpdb->update('wp_tickets', $new_data, ['t_id' => $_POST['t_id']]);

    if ($res) {
        $success_msg = "Ticket updated";
        sleep(3);
        $success_msg = "";
    } else {
        $error_msg = "Ticket update failed";
        sleep(3);
        $error_msg = "";
    }
}
?>

<?php get_header(); ?>

<?php
$user = wp_get_current_user();
$user_email = $user->user_email;

global $wpdb;
global $success_msg;
global $error_msg;

$tickets_active = $wpdb->get_results("SELECT * FROM wp_tickets WHERE t_status=0 AND t_deleted=0 AND t_emp_no='$user_email'");
$tickets_closed = $wpdb->get_results("SELECT * FROM wp_tickets WHERE t_status=1 AND t_deleted=0 AND t_emp_no='$user_email'");
?>


<div class="container">
    <?php
    if (current_user_can('manage_options')) {
    ?>


        <?php
        global $wpdb;

        $tickets_active_admin = $wpdb->get_results("SELECT * FROM wp_tickets WHERE t_status=0 AND t_deleted=0");
        $tickets_closed_admin = $wpdb->get_results("SELECT * FROM wp_tickets WHERE t_status=1 AND t_deleted=0");
        $tickets_trash_admin = $wpdb->get_results("SELECT * FROM wp_tickets WHERE t_deleted=1");
        ?>

        <div class="container">
            <div class="title-con">
                <h1>All Tickets</h1>

                <a href='<?php echo admin_url('admin.php?page=deleted_tickets'); ?>'>
                    Trash (<?php echo count($tickets_trash_admin); ?>)
                </a>
            </div>

            <!-- <div class="top-links">
                <a href=""><button>Create a Ticket</button></a>
            </div> -->

            <?php
            global $success_msg;
            global $error_msg;
            ?>

            <?php
            if ($success_msg !== '') {
                echo "<p class='success'>$success_msg</p>";
            }
            if ($error_msg !== '') {
                echo "<p class='error'>$error_msg</p>";
            }
            ?>

            <div class="active-tickets">
                <h2>Active Tickets</h2>

                <div class="active-tickets-list">
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Assigned to</th>
                            <th class="minimal">Due date</th>
                            <th class='btn-col'>Edit</th>
                            <th class='btn-col'>Delete</th>
                        </tr>

                        <?php
                        foreach ($tickets_active_admin as $ticket) {
                            $edit_url = admin_url("admin.php?page=edit_ticket&t_id={$ticket->t_id}");
                        ?>
                            <tr>
                                <td><?php echo $ticket->t_title; ?></td>
                                <td><?php echo $ticket->t_emp_no; ?></td>
                                <td class="minimal"><?php echo $ticket->t_duedate; ?></td>
                                <td>
                                    <a href="<?php echo $edit_url; ?>">
                                        <button class="default-btn edit-btn" name="edit-ticket" type="submit"><ion-icon name='create'></ion-icon> Edit</button>
                                    </a>
                                </td>
                                <form action="" method="post">
                                    <input type="hidden" name="t_id" value="<?php echo $ticket->t_id; ?>">
                                    <td><button class="default-btn delete-btn" name="delete-ticket" type="submit"><ion-icon name='trash'></ion-icon> Delete</button></td>
                                </form>
                            </tr>

                        <?php
                        }

                        if (count($tickets_active_admin) === 0) {
                        ?>
                            <tr>
                                <td class='empty-list' colspan='5'>No active tickets</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>
            </div>

            <div class="closed-tickets">
                <h2>Closed Tickets</h2>

                <div class="closed-tickets-list">
                    <table>
                        <tr>
                            <th>Title</th>
                            <th>Assigned to</th>
                            <th class="minimal">Due date</th>
                            <th class='btn-col'>Edit</th>
                            <th class='btn-col'>Delete</th>
                        </tr>

                        <?php
                        foreach ($tickets_closed_admin as $ticket) {
                            $edit_url = admin_url("admin.php?page=edit_ticket&t_id={$ticket->t_id}");
                        ?>
                            <tr>
                                <td><?php echo $ticket->t_title; ?></td>
                                <td><?php echo $ticket->t_emp_no; ?></td>
                                <td class="minimal"><?php echo $ticket->t_duedate; ?></td>
                                <td>
                                    <a href="<?php echo $edit_url; ?>">
                                        <button class="edit-btn" name="edit-ticket" type="submit"><ion-icon name='create'></ion-icon> Edit</button>
                                    </a>
                                </td>
                                <form action="" method="post">
                                    <input type="hidden" name="t_id" value="<?php echo $ticket->t_id; ?>">
                                    <td><button class="delete-btn" name="delete-ticket" type="submit"><ion-icon name='trash'></ion-icon> Delete</button></td>
                                </form>
                            </tr>

                        <?php
                        }

                        if (count($tickets_closed_admin) === 0) {
                        ?>
                            <tr>
                                <td class='empty-list' colspan='5'>No closed tickets</td>
                            </tr>
                        <?php
                        }
                        ?>
                    </table>

                </div>
            </div>
        </div>
    <?php
    } else {
    ?>



        <h3 class="page-title">My Tickets</h3>

        <?php
        if ($success_msg !== '') {
            echo "<p class='success'>$success_msg</p>";
        }
        if ($error_msg !== '') {
            echo "<p class='error'>$error_msg</p>";
        }
        ?>



        <div class="active-tickets">
            <h2>Active Tickets</h2>

            <div class="active-tickets-list">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th class="minimal">Due date</th>
                        <th>Done</th>
                    </tr>

                    <?php
                    foreach ($tickets_active as $ticket) {
                        $edit_url = admin_url("admin.php?page=edit_ticket&t_id={$ticket->t_id}");
                    ?>
                        <tr>
                            <td><?php echo $ticket->t_title; ?></td>
                            <td><?php echo $ticket->t_desc; ?></td>
                            <td class="minimal"><?php echo $ticket->t_duedate; ?></td>
                            <td>
                                <form action="" method="post" id="undone-form">
                                    <input type="hidden" name="t_id" value="<?php echo $ticket->t_id; ?>">
                                    <input type="hidden" name="t_check" value="1">
                                    <button type="submit" name="check-submit" class='no-btn'>
                                        <ion-icon name="square-outline"></ion-icon>
                                    </button>
                                </form>
                            </td>
                        </tr>

                    <?php
                    }

                    if (count($tickets_active) === 0) {
                    ?>
                        <tr>
                            <td class='empty-list' colspan='4'>No active tickets</td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>
        </div>

        <div class="closed-tickets">
            <h2>Closed Tickets</h2>

            <div class="closed-tickets-list">
                <table>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th class="minimal">Due date</th>
                        <th>Done</th>
                    </tr>

                    <?php
                    foreach ($tickets_closed as $ticket) {
                    ?>
                        <tr>
                            <td><?php echo $ticket->t_title; ?></td>
                            <td><?php echo $ticket->t_desc; ?></td>
                            <td class="minimal"><?php echo $ticket->t_duedate; ?></td>
                            <td>
                                <form action="" method="post" id="done-form">
                                    <input type="hidden" name="t_id" value="<?php echo $ticket->t_id; ?>">
                                    <input type="hidden" name="t_check" value="0">
                                    <button type="submit" name="check-submit" class="no-btn">
                                        <ion-icon name="checkbox-outline"></ion-icon>
                                    </button>
                                </form>
                            </td>

                        </tr>

                    <?php
                    }

                    if (count($tickets_closed) === 0) {
                    ?>
                        <tr>
                            <td class='empty-list' colspan='4'>No closed tickets</td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>

            </div>
        </div>

    <?php } ?>
</div>

<?php get_footer(); ?>