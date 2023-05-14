<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>

<body>


    <?php
    // $user = wp_get_current_user();
    // var_dump($user);

    // $slug = basename(get_permalink());

    // if ($slug == 'login') {
    ?>
    <!-- <nav class="nav-login">
                <a href="<?php // echo home_url(); 
                            ?>">
                    <h2>Ticket Manager</h2>
                </a>
            </nav> -->

    <?php
    // } else {
    // if (is_user_logged_in()) {
    // $user = get_user_info();
    // $fullname = $user['fullname'];
    // $names = explode(' ', $fullname);

    // $firstname = $names[0];
    // $user_id = $user['id'];
    // global $wpdb;

    // $cart_items = $wpdb->get_results("SELECT * FROM wp_cart JOIN wp_products ON wp_products.p_id=wp_cart.p_id  WHERE user_id=$user_id");
    // }
    ?>

    <?php
    // }
    ?>

    <nav>
        <a href="<?php echo home_url(); ?>">
            <ion-icon name="ticket"></ion-icon>
            <h3>Ticket Manager</h2>
        </a>
    </nav>