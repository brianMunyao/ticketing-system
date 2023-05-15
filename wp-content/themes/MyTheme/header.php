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
    <nav>
        <a href="<?php echo home_url(); ?>">
            <ion-icon name="ticket"></ion-icon>
            <h3>Ticket Manager</h2>
        </a>

        <div class="nav-links">
            <a href="<?php echo admin_url('admin.php?page=create_ticket'); ?>">Add New Ticket</a>
        </div>
    </nav>