<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<?php
global $wpdb;
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

    .deleted-tickets h2 {
        margin-top: 30px;
        color: #fff;
        width: fit-content;
        padding: 6px 10px;
        border-radius: 4px;
        background: #dc3545;
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

    .restore-col {
        width: 90px;
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

    .restore-btn {
        background: dodgerblue;
    }
</style>


<div class="container">
    <div class="title-con">
        <h1>Trash</h1>
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

    <div class="deleted-tickets">
        <h2>Deleted Tickets</h2>

        <div class="deleted-tickets-list">
            <table>
                <tr>
                    <th>Title</th>
                    <th>Assigned to</th>
                    <th>Due date</th>
                    <th class='restore-col'>Restore</th>
                </tr>

                <?php
                foreach ($tickets_trash as $ticket) {
                ?>
                    <tr>
                        <td><?php echo $ticket->t_title; ?></td>
                        <td><?php echo $ticket->t_emp_no; ?></td>
                        <td><?php echo $ticket->t_duedate; ?></td>
                        <form action="" method="post">
                            <input type="hidden" name="t_id" value="<?php echo $ticket->t_id; ?>">
                            <td><button class="restore-btn" name="restore-ticket" type="submit"><ion-icon name="arrow-undo-outline"></ion-icon> Restore</button></td>
                        </form>
                    </tr>

                <?php
                }

                if (count($tickets_trash) === 0) {
                ?>
                    <tr>
                        <td class='empty-list' colspan='4'>Trash is empty</td>
                    </tr>
                <?php
                }
                ?>
            </table>

        </div>
    </div>

</div>