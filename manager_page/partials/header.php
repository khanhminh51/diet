<?php
if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/index.php") {
    include('../config/constants.php');
} else {
    include('../../config/constants.php');
}

include('login_check.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Page</title>

    <?php
    if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/index.php") {
        echo "<link rel='stylesheet' href='../css/bootstrap.min.css'>";
    } else {
        echo "<link rel='stylesheet' href='../../css/bootstrap.min.css'>";
    }

    if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/index.php") {
        echo "<link rel='stylesheet' href='../css/manager.css'>";
    } else {
        echo "<link rel='stylesheet' href='../../css/manager.css'>";
    }

    if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/index.php") {
        echo "<link rel='stylesheet' href='../font/fontawesome-free-5.15.4/css/all.min.css'>";
    } else {
        echo "<link rel='stylesheet' href='../../font/fontawesome-free-5.15.4/css/all.min.css'>";
    }
    ?>
</head>

<body>
    <!-- Header -->
    <div class="header border-bottom">
        <div class="py-3 container">
            <div class="mb-0 pl-0 d-flex justify-content-between align-items-center">
                <div>
                    <div class="">
                        <a class="header__item" href="<?php echo SITEURL; ?>">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                    </div>
                </div>

                <!-- pc and tablet -->
                <div class="d-none d-md-flex">
                    <div class="">
                        <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/index.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/index.php">
                            <i class="fas fa-band-aid"></i>
                            Dashboard
                        </a>
                    </div>

                    <div class="">
                        <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/manager/manager.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/manager/add_manager.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/manager/update_manager.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/manager/change_password.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/manager/manager.php">
                            <i class="fas fa-users-cog"></i>
                            Manager
                        </a>
                    </div>

                    <div class="">
                        <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/category/category.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/category/add_category.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/category/update_category.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/category/category.php">
                            <i class="fas fa-utensils"></i>
                            Category
                        </a>
                    </div>

                    <div class="">
                        <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/interior/food.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/interior/add_food.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/interior/update_food.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/interior/food.php">
                            <i class="fas fa-hamburger"></i>
                            Dish
                        </a>
                    </div>

                    <div class="">
                        <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/user/user.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/user/update_user.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/user/change_password.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/user/user.php">
                            <i class="fas fa-users"></i>
                            User
                        </a>
                    </div>

                    <div class="">
                        <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/order/order.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/order/update_order.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/order/order.php">
                            <i class="fas fa-clipboard-list"></i>
                            Order
                        </a>
                    </div>
                </div>

                <div class="d-none d-md-flex">
                    <div class="">
                        <a class="header__item" href="<?php echo SITEURL; ?>manager_page/logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </div>
                </div>

                <div class="d-block d-md-none">
                    <div class="">
                        <a class="header__item header__menu text-right" href="#">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- mobile -->
    <div class="mobile__navbar d-none flex-column d-md-none">
        <div class="w-100 ml-3 text-left">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/index.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/index.php">
                <i class="fas fa-band-aid"></i>
                Dashboard
            </a>
        </div>

        <div class="w-100 ml-3 mt-3 text-left">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/manager/manager.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/manager/add_manager.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/manager/update_manager.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/manager/change_password.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/manager/manager.php">
                <i class="fas fa-users-cog"></i>
                Manager
            </a>
        </div>

        <div class="w-100 ml-3 mt-3 text-left">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/category/category.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/category/add_category.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/category/update_category.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/category/category.php">
                <i class="fas fa-utensils"></i>
                Category
            </a>
        </div>

        <div class="w-100 ml-3 mt-3 text-left">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/interior/food.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/interior/add_food.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/interior/update_food.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/interior/food.php">
                <i class="fas fa-hamburger"></i>
                Dish
            </a>
        </div>

        <div class="w-100 ml-3 mt-3 text-left">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/user/user.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/user/update_user.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/user/change_password.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/user/user.php">
                <i class="fas fa-users"></i>
                User
            </a>
        </div>

        <div class="w-100 ml-3 mt-3 text-left">
            <a <?php if ($_SERVER['SCRIPT_NAME'] == "/diet/manager_page/order/order.php" || $_SERVER['SCRIPT_NAME'] == "/co3049-assignment/manager_page/order/update_order.php") { ?> class="header__item active" <?php   } ?> class="header__item" href="<?php echo SITEURL; ?>manager_page/order/order.php">
                <i class="fas fa-clipboard-list"></i>
                Order
            </a>
        </div>
        <div class="w-100 ml-3 mt-3 mb-3 text-left">
            <a class="header__item" href="<?php echo SITEURL; ?>manager_page/logout.php">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </div>
    </div>