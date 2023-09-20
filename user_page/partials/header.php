<?php
    include('../config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Page</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/user.css">
    <link rel="stylesheet" href="../font/fontawesome-free-5.15.4/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <div class="header border-bottom">
        <div class="py-3 container">
            <div class="header__content mb-0 pl-0 d-flex justify-content-between align-items-center">
                <div>
                    <div class="">
                        <a <?php if($_SERVER['SCRIPT_NAME']=="/co3049-assignment/user_page/login.php" || $_SERVER['SCRIPT_NAME']=="/co3049-assignment/user_page/register.php") { ?>  class="header__item active"   <?php   }?> class="header__item" href="<?php echo SITEURL; ?>">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                    </div>
                </div>

                <div class="d-flex mobile__none">
                    <?php
                        if (isset($_SESSION['user'])) {
                            $username = $_SESSION['user'];
                            $sql = "SELECT * FROM users WHERE username = '$username'";
                            $res = mysqli_query($connection, $sql);
                            $count = mysqli_num_rows($res);
                            if ($count == 1) {
                                $row = mysqli_fetch_assoc($res);
                                $id = $row['id'];                                  
                            }
                            ?>  
                                <div>
                                    <a <?php if($_SERVER['SCRIPT_NAME']=="/co3049-assignment/user_page/user.php" || $_SERVER['SCRIPT_NAME']=="/co3049-assignment/user_page/update_user.php" || $_SERVER['SCRIPT_NAME']=="/co3049-assignment/user_page/change_password.php") { ?>  class="header__item active"   <?php   }?> class="header__item" href="<?php echo SITEURL; ?>user_page/user.php?id=<?php echo $id; ?>">
                                        <i class="fas fa-user"></i>
                                        My Information
                                    </a>
                                </div>

                                <div>
                                    <a <?php if($_SERVER['SCRIPT_NAME']=="/co3049-assignment/user_page/feedback.php") { ?>  class="header__item active"   <?php   }?> class="header__item" href="<?php echo SITEURL; ?>user_page/feedback.php?id=<?php echo $id; ?>">
                                    <i class="fas fa-comments"></i>
                                        Feedback
                                    </a>
                                </div>
                            <?php
                        }
                    ?>
                </div>
                
                <div class="d-flex mobile__none">
                    <?php
                        if (isset($_SESSION['user'])) {
                            ?>
                                <div>
                                    <a class="header__item" href="<?php echo SITEURL; ?>user_page/logout.php">
                                        <i class="fas fa-sign-out-alt"></i>
                                        Logout
                                    </a>
                                </div>
                            <?php
                        }
                    ?>
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
        <?php
            if (isset($_SESSION['user'])) {
                $username = $_SESSION['user'];
                $sql = "SELECT * FROM users WHERE username = '$username'";
                $res = mysqli_query($connection, $sql);
                $count = mysqli_num_rows($res);
                if ($count == 1) {
                    $row = mysqli_fetch_assoc($res);
                    $id = $row['id'];                                  
                }
                ?>  
                    <div class="ml-3">
                        <a <?php if($_SERVER['SCRIPT_NAME']=="/co3049-assignment/user_page/user.php" || $_SERVER['SCRIPT_NAME']=="/co3049-assignment/user_page/update_user.php" || $_SERVER['SCRIPT_NAME']=="/co3049-assignment/user_page/change_password.php") { ?>  class="header__item active"   <?php   }?> class="header__item" href="<?php echo SITEURL; ?>user_page/user.php?id=<?php echo $id; ?>">
                            <i class="fas fa-user"></i>
                            My Information
                        </a>
                    </div>

                    <div class="mt-3 ml-3">
                        <a <?php if($_SERVER['SCRIPT_NAME']=="/co3049-assignment/user_page/feedback.php") { ?>  class="header__item active"   <?php   }?> class="header__item" href="<?php echo SITEURL; ?>user_page/feedback.php?id=<?php echo $id; ?>">
                        <i class="fas fa-comments"></i>
                            Feedback
                        </a>
                    </div>
                <?php
            }
        ?>
        <?php
            if (isset($_SESSION['user'])) {
                ?>
                    <div class="mt-3 ml-3 mb-3">
                        <a class="header__item" href="<?php echo SITEURL; ?>user_page/logout.php">
                            <i class="fas fa-sign-out-alt"></i>
                            Logout
                        </a>
                    </div>
                <?php
            }
        ?>
    </div>