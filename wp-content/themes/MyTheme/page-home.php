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


<h2 class="page-title">My Tickets</h2>
<div class="container">

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
                    $edit_url = "/ticketing-system/wp-admin/admin.php?page=edit_ticket&t_id={$ticket->t_id}";
                ?>
                    <tr>
                        <td><?php echo $ticket->t_title; ?></td>
                        <td><?php echo $ticket->t_desc; ?></td>
                        <td class="minimal"><?php echo $ticket->t_duedate; ?></td>
                        <td>
                            <form action="" method="post" id="undone-form">
                                <input type="hidden" name="t_id" value="<?php echo $ticket->t_id; ?>">
                                <input type="hidden" name="t_check" value="1">
                                <button type="submit" name="check-submit">
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
                                <button type="submit" name="check-submit">
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
</div>

<?php get_footer(); ?>