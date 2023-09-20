<?php
    include('config/constants.php');

    function custom_echo($x, $length) {
        if(strlen($x)<=$length) {
            echo $x;
        } else {
            $y=substr($x,0,$length) . '...';
            echo $y;
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vietfood Healthy Diet</title>

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="font/fontawesome-free-5.15.4/css/all.min.css">
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="0" >
    <!-- Navbar -->
    <section class="header__navbar fixed-top p-0">
        <div class="container d-flex justify-content-between align-items-center">
            <div class="">
                <a class="navbar-brand" href="<?php echo SITEURL; ?>">
                    <img src="images/logo_diet.jpg" alt="Restaurant Logo" class="img-responsive img__logo">
                </a>
            </div>

            <!-- pc and tablet -->
            <div class="menu d-none d-md-flex">
                <div>
                    <a <?php if($_SERVER['SCRIPT_NAME']=="/diet/index.php") { ?>  class="navbar__item active"   <?php   }?> class="navbar__item" href="<?php echo SITEURL; ?>">Home</a>
                </div>
                <div>
                <a <?php if($_SERVER['SCRIPT_NAME']=="/diet/recommend.php") { ?>  class="navbar__item active"   <?php   }?> class="navbar__item" href="<?php echo SITEURL; ?>recommend.php">Recommend</a>
                </div>
                <div>
                    <a <?php if($_SERVER['SCRIPT_NAME']=="/diet/categories.php") { ?>  class="navbar__item active"   <?php   }?> class="navbar__item" href="<?php echo SITEURL; ?>categories.php">Categories</a>
                </div>
                <div>
                    <a <?php if($_SERVER['SCRIPT_NAME']=="/diet/foods.php" || $_SERVER['SCRIPT_NAME']=="/diet/category-foods.php" || $_SERVER['SCRIPT_NAME']=="/diet/interior-search.php") { ?>  class="navbar__item active"   <?php   }?> class="navbar__item" href="<?php echo SITEURL; ?>foods.php">Dishes</a>
                </div>

                <?php
                    if (isset($_SESSION['manager'])) {
                        ?>
                            <div>
                                <a href="<?php echo SITEURL; ?>manager_page/" class="navbar__item">Manager</a>
                            </div>
                        <?php
                    }
                ?>

                <div>
                    <?php
                        if (!isset($_SESSION['user'])) {
                            ?>
                                <a href="<?php echo SITEURL; ?>user_page/login.php" class="navbar__item">Login</a>
                            <?php
                        } else {
                            // Get ID user
                            $username = $_SESSION['user'];
                            $sql = "SELECT * FROM users WHERE username = '$username'";
                            $res = mysqli_query($connection, $sql);
                            $count = mysqli_num_rows($res);
                            if ($count == 1) {
                                $row = mysqli_fetch_assoc($res);
                                $id = $row['id'];
                            }

                            ?>
                                <a href="<?php echo SITEURL; ?>user_page/user.php?id=<?php echo $id; ?>" class="navbar__item">Personal</a></div>
                                <div><a <?php if($_SERVER['SCRIPT_NAME']=="/co3049-assignment/cart.php") { ?>  class="navbar__item active"   <?php   }?> href="<?php echo SITEURL; ?>cart.php" class="navbar__item"><i class="fas fa-shopping-cart"></i></a></div>
                                <div><a href="<?php echo SITEURL; ?>user_page/logout.php" class="navbar__item">Logout</a>
                            <?php
                        }
                    ?>
                </div>
            </div>

            <div class="d-block d-md-none">
                    <div class="">
                        <a class="navbar__item header__menu text-right" href="#">
                            <i class="fas fa-bars"></i>
                        </a>
                    </div>
            </div>
        </div>

        <!-- mobile -->
        <div class="mobile__navbar menu d-none flex-column d-md-none">
            <div>
                <a <?php if($_SERVER['SCRIPT_NAME']=="/diet/index.php") { ?>  class="navbar__item active"   <?php   }?> class="navbar__item" href="<?php echo SITEURL; ?>">Home</a>
            </div>
            <div class="mt-2">
                <a <?php if($_SERVER['SCRIPT_NAME']=="/diet/categories.php") { ?>  class="navbar__item active"   <?php   }?> class="navbar__item" href="<?php echo SITEURL; ?>categories.php">Categories</a>
            </div>
            <div class="mt-2">
                <a <?php if($_SERVER['SCRIPT_NAME']=="/diet/foods.php" || $_SERVER['SCRIPT_NAME']=="/diet/category-foods.php" || $_SERVER['SCRIPT_NAME']=="/diet/interior-search.php") { ?>  class="navbar__item active"   <?php   }?> class="navbar__item" href="<?php echo SITEURL; ?>foods.php">Dishes</a>
            </div>

            <?php
                if (isset($_SESSION['manager'])) {
                    ?>
                        <div class="mt-2">
                            <a href="<?php echo SITEURL; ?>manager_page/" class="navbar__item">Manager</a>
                        </div>
                    <?php
                }
            ?>

            <div class="mt-2">
                <?php
                    if (!isset($_SESSION['user'])) {
                        ?>
                            <a href="<?php echo SITEURL; ?>user_page/login.php" class="navbar__item">Login</a>
                        <?php
                    } else {
                        // Get ID user
                        $username = $_SESSION['user'];
                        $sql = "SELECT * FROM users WHERE username = '$username'";
                        $res = mysqli_query($connection, $sql);
                        $count = mysqli_num_rows($res);
                        if ($count == 1) {
                            $row = mysqli_fetch_assoc($res);
                            $id = $row['id'];
                        }

                        ?>
                            <a href="<?php echo SITEURL; ?>user_page/user.php?id=<?php echo $id; ?>" class="navbar__item">Personal</a></div>
                            <div class="mt-2"><a <?php if($_SERVER['SCRIPT_NAME']=="/diet/cart.php") { ?>  class="navbar__item active"   <?php   }?> href="<?php echo SITEURL; ?>cart.php" class="navbar__item"><i class="fas fa-shopping-cart"></i></a></div>
                            <div class="mt-2"><a href="<?php echo SITEURL; ?>user_page/logout.php" class="navbar__item">Logout</a>
                        <?php
                    }
                ?>
            </div>
        </div>
    </section>