<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<?php
global $wpdb;

$tickets_active = $wpdb->get_results("SELECT * FROM wp_tickets WHERE t_status=0 AND t_deleted=0");
$tickets_closed = $wpdb->get_results("SELECT * FROM wp_tickets WHERE t_status=1 AND t_deleted=0");
$tickets_trash = $wpdb->get_results("SELECT * FROM wp_tickets WHERE t_deleted=1");
?>

<style>
    .title-con {
        display: flex;
        align-items: baseline;
        gap: 10px;
    }

    .title-con a {
        color: rgb(180, 20, 10);
    }

    .success,
    .error {
        width: fit-content;
        border-radius: 5px;
        font-weight: 600;
        padding: 10px;
    }

    .success {
        background: rgba(47, 204, 68, 0.2);
        color: rgb(28, 163, 46);
    }

    .error {
        background: rgba(204, 60, 47, 0.2);
        color: rgb(150, 40, 30);
    }

    .success:empty,
    .error:empty {
        display: none;
        padding: 0;
    }

    .container {
        margin-right: 20px;
    }

    h2 {
        margin-top: 30px;
        color: #636564;
        width: fit-content;
        padding: 6px 10px;
        border-radius: 4px;
        background: #ddd;
    }

    .active-tickets h2 {
        background: #49af41;
        color: #fff;
    }

    table {
        font-size: 15px;
        width: 100%;
        border-collapse: collapse;
    }

    table,
    th,
    td {
        border: 2px solid #ddd;
    }

    th,
    td {
        text-align: left;
        padding: 8px;
    }

    .minimal {
        min-width: max-content;
    }

    .empty-list {
        opacity: 0.5;
        background: rgba(120, 120, 120, 0.1);
        font-weight: 500;
        text-align: center;
    }

    .btn-col {
        width: 70px;
    }

    button {
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
        gap: 4px;
        border: none;
        font-weight: 500;
        padding: 5px 2px;
        border-radius: 5px;
        color: white;
        cursor: pointer;
    }

    .edit-btn {
        background: dodgerblue;
    }

    .delete-btn {
        background: tomato;
    }
</style>


<div class="container">
    <div class="title-con">
        <h1>Tickets</h1>

        <a href='<?php echo "/ticketing-system/wp-admin/admin.php?page=deleted_tickets" ?>'>
            Trash (<?php echo count($tickets_trash); ?>)
        </a>
    </div>

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
                    <th>Due date</th>
                    <th class='btn-col'>Edit</th>
                    <th class='btn-col'>Delete</th>
                </tr>

                <?php
                foreach ($tickets_active as $ticket) {
                    $edit_url = "/ticketing-system/wp-admin/admin.php?page=edit_ticket&t_id={$ticket->t_id}";
                ?>
                    <tr>
                        <td><?php echo $ticket->t_title; ?></td>
                        <td><?php echo $ticket->t_emp_no; ?></td>
                        <td><?php echo $ticket->t_duedate; ?></td>
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

                if (count($tickets_active) === 0) {
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
                    <th>Due date</th>
                    <th class='btn-col'>Edit</th>
                    <th class='btn-col'>Delete</th>
                </tr>

                <?php
                foreach ($tickets_closed as $ticket) {
                    $edit_url = admin_url("admin.php?page=edit_ticket&t_id={$ticket->t_id}");
                ?>
                    <tr>
                        <td><?php echo $ticket->t_title; ?></td>
                        <td><?php echo $ticket->t_emp_no; ?></td>
                        <td><?php echo $ticket->t_duedate; ?></td>
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

                if (count($tickets_closed) === 0) {
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