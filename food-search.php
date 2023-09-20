<?php
    include('partials_front/header.php');
?>

    <!-- 1. Search -->
    <section class="interior-search img-search text-center">
        <div class="container">

            <?php
                $search = $_POST['search'];
            ?>
            <h2><a  class="text-white">Dishes on Your Search "<?php echo $search; ?>"</a></h2>

        </div>
    </section>

    <!-- 2. Interior -->
    <section class="interior-home">
        <div class="container">
            <h2 class="text-center info-text-1 text-dark mb-5">Dishes</h2>

            <div class="row">
                <?php
                    $sql2 = "SELECT * FROM food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
                    $res2 = mysqli_query($connection, $sql2);

                    $count2 = mysqli_num_rows($res2);

                    if ($count2 > 0) {
                        while ($row2 = mysqli_fetch_assoc($res2)) {
                            $id = $row2['id'];
                            $title = $row2['title'];
                            $description = $row2['description'];
                            $price = $row2['price'];
                            $image_name = $row2['image_name'];

                            ?>
                                <div class="col-md-6 mt-5">
                                    <div class="interior-menu-box">
                                        <div class="row">
                                            <div class="col-md-4 d-flex align-items-center">
                                                <?php
                                                    if ($image_name != "") {
                                                        ?>
                                                        <img src="<?php echo SITEURL; ?>images/food/<?php echo $image_name; ?>" class="img-responsive img-curve h-100 img__food">
                                                        <?php
                                                    } else {
                                                        echo "<h3 class='text-danger text-center'> Image not availables! </h3>";
                                                    }
                                                ?>
                                            </div>

                                            <div class="col-md-8 d-flex flex-column justify-content-center my-3 food__info">
                                                <h4 class="mb-0"><?php echo $title; ?></h4>
                                                <p class="m-0 mb-3 interior-detail"><?php custom_echo($description, 100); ?></p>
                                                <p class="m-0">Price: <?php echo  round($price) ;echo "K"; ?></p>
                                                <?php
                                                    if (isset($_SESSION['user'])) {
                                                        ?>
                                                            <form action="" method="POST" class="mt-2">
                                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                                <input type="hidden" name="title" value="<?php echo $title; ?>">
                                                                <input type="hidden" name="price" value="<?php echo $price; ?>">
                                                                <input type="hidden" name="image_name" value="<?php echo $image_name; ?>">
                                                                <input class="form__input w-25 pl-3 rounded" type="number" name="quantity" value="1">
                                                                <input class="btn btn__login btn__login-primary w-50 ml-2 rounded" type="submit" value="Add to Cart" name="add_to_cart">
                                                            </form>
                                                        <?php
                                                    }
                                                ?>
                                            </div>
                                        </div>
                                        <a href="
                                            <?php
                                                if (!isset($_SESSION['user'])) {
                                                    $_SESSION['not_login'] = "<h6 class='text-danger'> LOGIN to ORDER Interior! </h6>";
                                                    echo SITEURL; ?>user_page/login.php<?php
                                                } else {
                                                    echo SITEURL; ?>order.php?food_id=<?php echo $id;
                                                }
                                            ?>
                                        " class="btn btn__login btn__login-primary btn__order">Order Now
                                        </a>
                                    </div>
                                </div>
                            <?php
                        }
                    } else {
                        echo "<h3 class='text-danger text-center'> Dish not FOUND! </h3>";
                    }
                ?>
            </div>
        </div>
    </section>

<?php
    include('partials_front/footer.php');
?>

<!-- Program -->
<?php
    if (isset($_POST['add_to_cart'])) {
        if (isset($_SESSION['cart'])) {
            $cart_array_id = array_column($_SESSION['cart'], "id");

            if (!in_array($_POST['id'], $cart_array_id)) {
                $count = count($_SESSION['cart']);
                $cart_array = array(
                    'id'            => $_POST['id'],
                    'title'         => $_POST['title'],
                    'quantity'      => $_POST['quantity'],
                    'price'         => $_POST['price'],
                    'image_name'    => $_POST['image_name']
                );
                $_SESSION['cart'][$count] = $cart_array;
            } else {
                echo "<script>alert('Item already added')</script>";
                echo("<script>location.href = '".SITEURL."interior-search.php';</script>");
            }
        } else {
            $cart_array = array(
                'id'            => $_POST['id'],
                'title'         => $_POST['title'],
                'quantity'      => $_POST['quantity'],
                'price'         => $_POST['price'],
                'image_name'    => $_POST['image_name']
            );
            $_SESSION['cart'][0] = $cart_array;
        }
    }
?>