<?php
    include('partials_front/header.php');
?>
    <section class="interior-order">
    <div class="container card__content border">
        <div class="row">
            <!-- product -->
            <div class="col-md-8">
                <div class="title border-bottom py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="text-white"><b>Shopping Cart</b></h4>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <?php
                        $total = 0;
                        $items = 0;
                        if (!empty($_SESSION['cart'])) {
                            foreach($_SESSION['cart'] as $keys => $values) {
                                ?>
                                    <div class="row d-flex align-items-center m-0 my-3 w-100">
                                        <div class="col-md-2">
                                            <?php
                                                if ($values['image_name'] != "") {
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $values['image_name']; ?>" class="img-fluid">
                                                    <?php
                                                } else {
                                                    echo "<h6 class='text-danger img-fluid'> Image not FOUND! </h6>";
                                                }
                                            ?>
                                        </div>
                                        <div class="col-md-4 mobile__cart-info">
                                            <div class="row text-white"><?php echo $values['title']; ?></div>
                                        </div>
                                        <div class="col-md-3 mobile__cart-info">
                                            <a class="p-2 text-white" href="<?php echo SITEURL; ?>cart.php?action=sub_quantity&id=<?php echo $values['id']; ?>">-</a>
                                            <input class="w-25 form__input text-center rounded" type="number" name="quantity" value="<?php echo $values['quantity']; ?>">
                                            <a class="p-2 text-white" href="<?php echo SITEURL; ?>cart.php?action=add_quantity&id=<?php echo $values['id']; ?>">+</a>
                                        </div>
                                        <div class="col-md-2 text-white mobile__cart-info">
                                            <?php echo $values['price']; ?>
                                        </div>
                                        <div class="col-md-1 mobile__cart-info">
                                            <a class="text-white" href="<?php echo SITEURL; ?>cart.php?action=delete&id=<?php echo $values['id']; ?>">&#10005;</a>
                                        </div>
                                    </div>
                                <?php
                                    $items = $items + $values['quantity'];
                                    $total = $total + ($values['quantity'] * $values['price']);
                            }
                        } else {
                            ?>
                                <div class="row d-flex align-items-center m-0 my-3 w-100">
                                    <div class="col-md-12">
                                        <h4 class="text-danger text-center">No items added</h4>
                                    </div>
                                </div>
                            <?php
                        }
                    ?>
                </div>
            </div>

            <!-- sumarry -->
            <div class="col-md-4 summary">
                <div class="title border-bottom py-3">
                    <div class="row">
                        <div class="col">
                            <h4 class="text-white"><b>Sumarry</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-white"><?php echo $items; ?> items</div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col text-white">ITEMS</div>
                    <div class="col text-right text-white"><?php echo $items; ?></div>
                </div>
                <div class="row">
                    <div class="col text-white">TOTAL PRICE</div>
                    <div class="col text-right text-white" >
                        $<?php echo  round($total) ;echo "k"; ?> 
                    </div>
                </div>

                <form action="" method="POST" class="mt-3 mx-3">
                    <div class="row">
                        <input type="text" name="full_name" id="full_name" class="form__input mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Full Name'" placeholder="Enter your Full Name">
                    </div>
                    <div class="row">
                        <input type="text" name="contact" id="contact" class="form__input mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Contact'" placeholder="Enter your Contact">
                    </div>
                    <div class="row">
                        <input type="text" name="email" id="email" class="form__input mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Email'" placeholder="Enter your Email">
                    </div>
                    <div class="row">
                        <textarea name="address" id="address" class="form__input mb-3 p-2 pl-4" rows="3" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Address'" placeholder="Enter your Address"></textarea>
                    </div>
                    <div class="row">
                        <input type="text" name="note" id="note" class="form__input mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Note'" placeholder="Enter your Note">
                    </div>
                    <div class="row mb-3">
                        <input type="submit" value="Order" name="submit" class="btn btn__login btn__login-primary mx-5 mt-3 p-2">
                    </div>
                </form>
            </div>
        </div>
    </div>
    </section>

<?php
    include('partials_front/footer.php');
?>

<!-- Program -->
<?php
    // 1. Remove item
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "delete") {
            foreach($_SESSION['cart'] as $keys => $values) {
                if ($values['id'] == $_GET['id']) {
                    unset($_SESSION['cart'][$keys]);
                    echo("<script>location.href = '".SITEURL."cart.php';</script>");
                }
            }
        }
    }

    // 2. Add quantity
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "add_quantity") {
            foreach($_SESSION['cart'] as $keys => $values) {
                if ($values['id'] == $_GET['id']) {
                    $_SESSION['cart'][$keys]['quantity'] += 1;
                    echo("<script>location.href = '".SITEURL."cart.php';</script>");
                }
            }
        }
    }

    // 3. Sub quantity
    if (isset($_GET['action'])) {
        if ($_GET['action'] == "sub_quantity") {
            foreach($_SESSION['cart'] as $keys => $values) {
                if ($values['id'] == $_GET['id']) {
                    if ($_SESSION['cart'][$keys]['quantity'] > 1) {
                        $_SESSION['cart'][$keys]['quantity'] -= 1;
                    }
                    echo("<script>location.href = '".SITEURL."cart.php';</script>");
                }
            }
        }
    }

    // 4. Insert order into db
    if (isset($_POST['submit'])) {
        // interior title
        $interior = "";
        $n_food = 0;
        foreach($_SESSION['cart'] as $keys => $values) {
            $interior = $interior.'<span class="font-weight-bold">'.++$n_food.') '.'</span>'.$values['title'].'(x'.$values['quantity'].')'.'; ';
        }

        // interior price
        $price = 0;
        foreach($_SESSION['cart'] as $keys => $values) {
            $price = $price + $values['price'];
        }

        // interior quantity
        $quantity = 0;
        foreach($_SESSION['cart'] as $keys => $values) {
            $quantity = $quantity + $values['quantity'];
        }
        // total
        $order_date = date("Y-m-d H:i:sa"); // get current date and time
        $status = "Ordered"; // orderred, on delivery, delivered, cancelled
        $customer_name = $_POST['full_name'];
        $customer_contact = $_POST['contact'];
        $customer_email = $_POST['email'];
        $customer_address = $_POST['address'];
        $note = $_POST['note'];

        // 2.1 SQL to insert order to db
        $sql = "INSERT INTO food_order SET
            food = '$interior',
            price = '$price',
            quantity = '$quantity',
            total = '$total',
            order_date = '$order_date',
            status = '$status',
            customer_name = '$customer_name',
            customer_contact = '$customer_contact',
            customer_email = '$customer_email',
            customer_address = '$customer_address',
            note = '$note'
        ";
        $res = mysqli_query($connection, $sql);
        if ($res == TRUE) {
            $_SESSION['order'] = "<h3 class='login-success text-center'> Cart ordered successfully! </h3>";
            unset($_SESSION['cart']);
            echo("<script>location.href = '".SITEURL."';</script>");
        } else {
            $_SESSION['order'] = "<h3 class='text-danger text-center'> Failed to order Cart! </h3>";
            echo("<script>location.href = '".SITEURL."';</script>");
        }
    }
?>