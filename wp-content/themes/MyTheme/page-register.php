<?php

/*
    Template Name: Register Page
*/

if (is_user_logged_in())
    wp_redirect(home_url());
?>


<?php
if (isset($_POST['submit-register'])) {
    $users = get_users(['role' => 'employee']);
    $email = $_POST['email'];
    $password = $_POST['password'];

    $user_id = wp_insert_user([
        'user_login' => "J" . (count($users) + 1),
        'user_email' => $email,
        'user_pass' => $password,
        'role' => 'employee'
    ]);

    if (is_wp_error($user_id)) {
        global $error_msg;
        $error_msg = 'Register failed: ' . $user_id->get_error_message();
    } else {
        $user = wp_signon([
            'user_login' => $email,
            'user_password' => $password
        ]);

        if (!is_wp_error($user)) {
            $error_msg = 'Register failed: ' . $user_id->get_error_message();
        }
    }
}
?>




<form action="" method="post">
    <div class="form-con">
        <?php get_header(); ?>

        <div class="form-con-inner">

            <h2>Register</h2>

            <p class="error form-error"><?php echo $error_msg ?></p>

            <div class="input-con">
                <label for="email">Email Address</label>
                <div>
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="email" placeholder="Enter your email address" required />
                </div>
            </div>
            <div class="input-con">
                <label for="password">Password</label>
                <div>
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" placeholder="Enter your password" required />
                </div>
            </div>

            <button type="submit" name="submit-register" class='custom-btn'>REGISTER</button>
        </div>
        <?php get_footer() ?>
    </div>
</form>