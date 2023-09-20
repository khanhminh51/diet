<?php
    include('../partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-4 container">

            <div class="container-fluid py-3">
                <div class="row main-content m-auto add-food__content">
                    <div class="col-md-4 company__info d-flex flex-column justify-content-center align-items-center">
                        <span class="company__logo"><h2><i class="display-1 fas fa-clipboard-list"></i></i></h2></span>
                        <h4 class="company_title">Order</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form border-top border-right">
                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">

                            <div class="row my-3">
                                <h2>Update Order</h2>
                            </div>

                            <?php
                                // 1. Get ID order
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    //2. SQL to get order have id=$id
                                    $sql = "SELECT * FROM food_order WHERE id=$id";
                                    $res = mysqli_query($connection, $sql);

                                    $count = mysqli_num_rows($res);
                                    if ($count == 1) {
                                        $row = mysqli_fetch_assoc($res);

                                        $interior = $row['food'];
                                        $price = $row['price'];
                                        $quantity = $row['quantity'];
                                        $status = $row['status'];
                                        $customer_name = $row['customer_name'];
                                        $customer_contact = $row['customer_contact'];
                                        $customer_email = $row['customer_email'];
                                        $customer_address = $row['customer_address'];
                                        $note = $row['note'];
                                    } else {
                                        $_SESSION['not_order'] = "<h6 class='text-danger text-center'> Order NOT Found! </h6>";
                                        header("location:".SITEURL."manager_page/order/order.php");
                                    }
                                } else {
                                    header("location:".SITEURL."manager_page/order/order.php");
                                }
                            ?>

                            <div class="row w-100">
                                <form control="" class="form-group w-100" method="POST">
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center">Dish:</label>
                                        <div class="col-md-7 mb-3 p-2 pl-4"><?php echo $interior; ?></div>
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center">Price:</label>
                                        <div class="col-md-7 mb-3 p-2 pl-4"><?php echo $price; ?></div>
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="quantity">Quantity:</label>
                                        <input type="number" name="quantity" id="quantity" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $quantity; ?>">
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="status">Status:</label>
                                        <select name="status" id="status" class="form__input col-md-7 mb-3 p-2 pl-4">
                                            <option <?php if($status=="Ordered") {echo "selected";} ?> value="Ordered">Ordered</option>
                                            <option <?php if($status=="On Delivery") {echo "selected";} ?> value="On Delivery">On Delivery</option>
                                            <option <?php if($status=="Delivered") {echo "selected";} ?> value="Delivered">Delivered</option>
                                            <option <?php if($status=="Cancelled") {echo "selected";} ?> value="Cancelled">Cancelled</option>
                                        </select>
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="customer_name">Customer name:</label>
                                        <input type="text" name="customer_name" id="customer_name" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $customer_name; ?>">
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="customer_name">Customer contact:</label>
                                        <input type="text" name="customer_contact" id="customer_contact" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $customer_contact; ?>">
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="customer_email">Customer email:</label>
                                        <input type="text" name="customer_email" id="customer_email" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $customer_email; ?>">
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="customer_address">Customer address:</label>
                                        <input type="text" name="customer_address" id="customer_address" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $customer_address; ?>">
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="note">Note:</label>
                                        <input type="text" name="note" id="note" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $note; ?>">
                                    </div>
                                    <div class="row mb-3">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="hidden" name="price" value="<?php echo $price; ?>">
                                        <input type="submit" value="Update" name="submit" class="btn btn__login mx-5 mt-3 p-2">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

<?php
    include('../partials/footer.php');
?>

<!-- Program -->
<?php
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];
        $total = $price * $quantity;
        $status = $_POST['status'];
        $customer_name = $_POST['customer_name'];
        $customer_contact = $_POST['customer_contact'];
        $customer_email = $_POST['customer_email'];
        $customer_address = $_POST['customer_address'];
        $note = $_POST['note'];

        // 2. SQL to update order to db
        $sql2 = "UPDATE food_order SET
            quantity = '$quantity',
            total = '$total',
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address',
            note = '$note'
        WHERE id=$id
        ";

        $res2 = mysqli_query($connection, $sql2);

        // 3. Check order updated or not
        if ($res2 == TRUE) {
            $_SESSION['update'] = "<h6 class='text-success text-center'> Order updated successfully! </h6>"; //display message
            echo("<script>location.href = '".SITEURL."manager_page/order/order.php';</script>");
        } else {
            $_SESSION['update'] = "<h6 class='text-danger text-center'> Order updated failed! </h6>"; //display message
            echo("<script>location.href = '".SITEURL."manager_page/order/order.php';</script>");
        }
    }
?>