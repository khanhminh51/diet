<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1 class="text-center primary-color mt-3">Dashboard</h1>

            <!-- Display session -->
            <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
            ?>

            <div class="row">
                <a href="<?php echo SITEURL; ?>manager_page/category/category.php" class="col-xl-3 col-md-6 mt-4 dashboard-link">
                    <div class="dashboard d-flex flex-column align-items-center justify-content-center">
                        <?php
                            // Get total category
                            $sql = "SELECT * FROM category";
                            $res = mysqli_query($connection, $sql);
                            $count = mysqli_num_rows($res);
                        ?>
                        <i class="display-1 mb-5 fas fa-utensils"></i>
                        <h1><?php echo $count; ?></h1>
                        Categories
                    </div>
                </a>

                <a href="<?php echo SITEURL; ?>manager_page/interior/food.php" class="col-xl-3 col-md-6 mt-4 dashboard-link">
                    <div class="dashboard d-flex flex-column align-items-center justify-content-center">
                        <?php
                            // Get total interior
                            $sql2 = "SELECT * FROM food";
                            $res2 = mysqli_query($connection, $sql2);
                            $count2 = mysqli_num_rows($res2);
                        ?>
                        <i class="display-1 mb-5 fas fa-hamburger"></i>
                        <h1><?php echo $count2; ?></h1>
                        Dishes
                    </div>
                </a>

                <a href="<?php echo SITEURL; ?>manager_page/order/order.php" class="col-xl-3 col-md-6 mt-4 dashboard-link">
                    <div class="dashboard d-flex flex-column align-items-center justify-content-center">
                        <?php
                            // Get total order
                            $sql3 = "SELECT * FROM food_order";
                            $res3 = mysqli_query($connection, $sql3);
                            $count3 = mysqli_num_rows($res3);
                        ?>
                        <i class="display-1 mb-5 fas fa-clipboard-list"></i>
                        <h1><?php echo $count3; ?></h1>
                        Total Order
                    </div>
                </a>

                <div class="col-xl-3 col-md-6 mt-4">
                    <div class="dashboard d-flex flex-column align-items-center justify-content-center">
                        <?php
                            // Get total coins order have status is "delivered"
                            $sql4 = "SELECT SUM(total) AS Total FROM food_order WHERE status='Delivered'";
                            $res4 = mysqli_query($connection, $sql4);
                            $row4 = mysqli_fetch_assoc($res4);

                            $total_revenue = $row4['Total'];
                        ?>
                        <i class="display-1 mb-5 fas fa-coins"></i>
                        <h1>
                            
                            <?php
                                if ($total_revenue == 0) {
                                    echo 0;
                                } else {
                                    echo round($total_revenue); echo "K";
                                }
                            ?>
                        </h1>
                        Revenue
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
    include('partials/footer.php');
?>