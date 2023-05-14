<?php

/*
    Template Name: Login Page
*/

if (is_user_logged_in()) {
    wp_redirect(home_url());
}
?>


<?php
if (isset($_POST['submit-login'])) {
    $user = wp_signon([
        'user_login' => $_POST['emp_no'],
        'user_password' => $_POST['password'],
        'remember' => true
    ]);

    if (is_wp_error($user)) {
        echo 'Login failed: ' . $user->get_error_message();
    } else {
        wp_set_current_user($user->ID);
        wp_set_auth_cookie($user->ID);
        do_action('wp_login', $user->user_login, $user);
    }
}
?>




<form action="" method="post">
    <div class="form-con">
        <?php get_header(); ?>

        <div class="form-con-inner">

            <h2>Login</h2>

            <div class="input-con">
                <label for="employee-num">Employee Number</label>
                <div>
                    <ion-icon name="person-outline"></ion-icon>
                    <input type="text" name="emp_no" placeholder="Enter your employee number" required />
                </div>
            </div>
            <div class="input-con">
                <label for="password">Password</label>
                <div>
                    <ion-icon name="lock-closed-outline"></ion-icon>
                    <input type="password" name="password" placeholder="Enter your password" required />
                </div>
            </div>

            <button type="submit" name="submit-login">LOGIN</button>
        </div>
        <?php get_footer() ?>
    </div>
</form>