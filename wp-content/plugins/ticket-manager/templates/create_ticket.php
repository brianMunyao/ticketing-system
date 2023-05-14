<?php

$users = get_users(array(
    'role' => 'employee'
));

global $wpdb;
$tickets = $wpdb->get_results("SELECT t_emp_no FROM wp_tickets WHERE t_status=0 AND t_deleted=0");

function compare_objects($users_arr, $tickets_arr)
{
    return $users_arr->user_email === $tickets_arr->t_emp_no;
}

$filtered_users = array_filter($users, function ($user) use ($tickets) {
    return count(array_filter($tickets, function ($ticket) use ($user) {
        return compare_objects($user, $ticket);
    })) > 0;
});

?>

<style>
    .success {
        background: rgba(47, 204, 68, 0.2);
        width: fit-content;
        padding: 10px;
        color: rgba(47, 204, 68, 1);
        border-radius: 5px;
        font-weight: 600;
    }

    .error {
        background: rgba(204, 60, 47, 0.2);
        width: fit-content;
        padding: 10px;
        color: rgba(204, 60, 47, 1);
        border-radius: 5px;
        font-weight: 600;
    }

    .success:empty,
    .error:empty {
        display: none;
        padding: 0;
    }

    .form-item {
        display: flex;
        flex-direction: column;
        margin: 20px 0;
        gap: 5px;
        width: 250px;
    }

    .form-item input,
    .form-item select,
    .form-item textarea {
        width: 100%;
    }


    button {
        background: dodgerblue;
        color: white;
        border: none;
        padding: 7px 15px;
        border-radius: 5px;
        font-size: 15px;
        font-weight: 500;
        letter-spacing: 0.5px;
        cursor: pointer;
    }

    button:hover {
        background: #1873cc;
    }
</style>

<h1>Create Ticket</h1>

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


<form action="" method="post">
    <div class="form-item">
        <label for="title">Ticket Title</label>
        <input type="text" name="title" id="title" required>
    </div>

    <div class="form-item">
        <label for="desc">Ticket Description</label>
        <textarea name="desc" id="desc" cols="30" rows="5"></textarea>
    </div>

    <div class="form-item">
        <label for="emp_no">Assign To</label>
        <select name="emp_no" id="emp_no" required>
            <option value="" disabled selected hidden>Select an option</option>
            <?php
            foreach ($filtered_users as $user) {
                $emp_email = $user->user_email
            ?>

                <option value="<?php echo $emp_email; ?>">
                    <?php echo $emp_email; ?>
                </option>
            <?php
            }
            ?>
        </select>
    </div>

    <div class="form-item">
        <label for="due_date">Due Date</label>
        <input type="date" name="due_date" id="due_date" required>
    </div>

    <button type="submit" name="new-ticket-submit">
        CREATE
    </button>
</form>