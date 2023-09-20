<?php
    include('../partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 px-5 mobile__content">
            <h1 class="text-center primary-color mt-3">List of Order</h1>

            <!-- Display session -->
            <?php
                if (isset($_SESSION['not_order'])) {
                    echo $_SESSION['not_order'];
                    unset($_SESSION['not_order']);
                }

                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }
            ?>

            <!-- pc -->
            <table class="table table-striped mt-4 d-none d-xl-block">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Dish</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-center">Total</th>
                        <th scope="col" class="text-center">Order_date</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Customer Name</th>
                        <th scope="col" class="text-center">Customer Contact</th>
                        <th scope="col" class="text-center">Customer Email</th>
                        <th scope="col" class="text-center">Customer Address</th>
                        <th scope="col" class="text-center">Note</th>
                        <th scope="col" class="text-center">Operation</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        // 1. SQL to get all order from db
                        $sql = "SELECT * FROM food_order ORDER BY id DESC";
                        $res = mysqli_query($connection, $sql);

                        $n = 1;

                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            // 2. Get each order
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $food = $row['food'];
                                $price = $row['price'];
                                $quantity = $row['quantity'];
                                $total = $row['total'];
                                $order_date = $row['order_date'];
                                $status = $row['status'];
                                $customer_name = $row['customer_name'];
                                $customer_contact = $row['customer_contact'];
                                $customer_email = $row['customer_email'];
                                $customer_address = $row['customer_address'];
                                $note = $row['note'];

                                ?>
                                    <!-- 3. Display each order -->
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $n++; ?></th>
                                        <td class="text-center"><?php echo $food; ?></td>
                                        <td class="text-center"><?php echo $price; ?></td>
                                        <td class="text-center"><?php echo $quantity; ?></td>
                                        <td class="text-center"><?php echo $total; ?></td>
                                        <td class="text-center"><?php echo $order_date; ?></td>

                                        <td class="text-center">
                                            <?php
                                                if ($status == "Ordered") {
                                                    echo "<label>$status</label>";
                                                }
                                                else if ($status == "On Delivery") {
                                                    echo "<label class='text-warning'>$status</label>";
                                                }
                                                else if ($status == "Delivered") {
                                                    echo "<label class='text-success'>$status</label>";
                                                }
                                                else if ($status == "Cancelled") {
                                                    echo "<label class='text-danger'>$status</label>";
                                                }
                                            ?>
                                        </td>

                                        <td class="text-center"><?php echo $customer_name; ?></td>
                                        <td class="text-center"><?php echo $customer_contact; ?></td>
                                        <td class="text-center"><?php echo $customer_email; ?></td>
                                        <td class="text-center"><?php echo $customer_address; ?></td>
                                        <td class="text-center"><?php echo $note; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo SITEURL; ?>manager_page/order/update_order.php?id=<?php echo $id; ?>" class="btn btn-outline-success">Update</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="13"><div class="text-danger">No Order</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>

            <!-- tablet -->
            <table class="table table-striped mt-4 d-md-block d-xl-none d-none">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Dish</th>
                        <th scope="col" class="text-center">Quantity</th>
                        <th scope="col" class="text-center">Total</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Operation</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        // 1. SQL to get all order from db
                        $sql = "SELECT * FROM food_order ORDER BY id DESC";
                        $res = mysqli_query($connection, $sql);

                        $n = 1;

                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            // 2. Get each order
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $food = $row['food'];
                                $quantity = $row['quantity'];
                                $total = $row['total'];
                                $status = $row['status'];
                                ?>
                                    <!-- 3. Display each order -->
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $n++; ?></th>
                                        <td class="text-center"><?php echo $food; ?></td>
                                        <td class="text-center"><?php echo $quantity; ?></td>
                                        <td class="text-center"><?php echo $total; ?></td>

                                        <td class="text-center">
                                            <?php
                                                if ($status == "Ordered") {
                                                    echo "<label>$status</label>";
                                                }
                                                else if ($status == "On Delivery") {
                                                    echo "<label class='text-warning'>$status</label>";
                                                }
                                                else if ($status == "Delivered") {
                                                    echo "<label class='text-success'>$status</label>";
                                                }
                                                else if ($status == "Cancelled") {
                                                    echo "<label class='text-danger'>$status</label>";
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo SITEURL; ?>manager_page/order/update_order.php?id=<?php echo $id; ?>" class="btn btn-outline-success">Update</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="6"><div class="text-danger">No Order</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>

            <!-- mobile -->
            <table class="table table-striped mt-4 d-block d-md-none">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Dish</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col" class="text-center">Operation</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        // 1. SQL to get all order from db
                        $sql = "SELECT * FROM food_order ORDER BY id DESC";
                        $res = mysqli_query($connection, $sql);

                        $n = 1;

                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            // 2. Get each order
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $food = $row['food'];
                                $status = $row['status'];
                                ?>
                                    <!-- 3. Display each order -->
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $n++; ?></th>
                                        <td class="text-center"><?php echo $food; ?></td>

                                        <td class="text-center">
                                            <?php
                                                if ($status == "Ordered") {
                                                    echo "<label>$status</label>";
                                                }
                                                else if ($status == "On Delivery") {
                                                    echo "<label class='text-warning'>$status</label>";
                                                }
                                                else if ($status == "Delivered") {
                                                    echo "<label class='text-success'>$status</label>";
                                                }
                                                else if ($status == "Cancelled") {
                                                    echo "<label class='text-danger'>$status</label>";
                                                }
                                            ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?php echo SITEURL; ?>manager_page/order/update_order.php?id=<?php echo $id; ?>" class="btn btn-outline-success">Update</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="4"><div class="text-danger">No Order</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include('../partials/footer.php');
?>