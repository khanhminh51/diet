<?php
include('partials_front/header.php');
?>
<!-- 1. Search -->
<section class="interior-search text-center">
  <?php
  if (isset($_SESSION['login'])) {
    echo $_SESSION['login'];
    unset($_SESSION['login']);
  }

  if (isset($_SESSION['order'])) {
    echo $_SESSION['order'];
    unset($_SESSION['order']);
  }
  ?>
  <div class="container">
    <h3 class="dynamic-words text-center ">Welcome to Vietfood Healthy Diet</h3>

    <form action="<?php echo SITEURL; ?>food-search.php" method="POST">
      <input type="search" name="search" placeholder="Search for Dish" required class="pl-5">
      <input type="submit" name="submit" value="Search" class="btn btn__login btn__login-primary w-25">
    </form>
  </div>
</section>

<!-- 2. Info -->
<section class="info">
  <div class="container info-text d-flex flex-column justify-content-center">
    <h1 class="info-text-1 mb-5">Về chúng tôi</h1>
    <h2 class="info-text-2 d-flex justify-content-center text-center"> Owned &amp; Operated</h2>
    <div class="d-flex justify-content-center">
      <hr class="yline">
    </div>
    <p class="info-text-3 mt-4"> Vietfood Healthy Diet  là một dự án cung cấp các món ăn thuần Việt đầy đủ dinh dưỡng và an toàn cho sức khỏe thông qua website của chúng tôi, dành cho: <br>
    Những người bận rộn nhưng quan tâm về lối sống lành mạnh, mong muốn một cơ thể khỏe đẹp (dân công sở) <br>
    Những người có nhu cầu dinh dưỡng đặc biệt (phụ nữ sau sinh, phụ nữ có thai)
    </p>
  </div>
</section>

<!-- 3. Categories -->
<section class="categories-home">
  <div class="container">
    <h2 class="text-center info-text-1 text-dark mb-5">Categories</h2>

    <div class="row d-flex">
      <?php
      // 1. SQL to display categories from db
      $sql = "SELECT * FROM category WHERE featured='Yes' AND active='Yes' LIMIT 3";
      $res = mysqli_query($connection, $sql);

      $count = mysqli_num_rows($res);

      if ($count > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          $id = $row['id'];
          $title = $row['title'];
          $image_name = $row['image_name'];

      ?>
          <a href="<?php echo SITEURL; ?>category-foods.php?category_id=<?php echo $id; ?>" class="col-md-4 mt-3">
            <div class="float-container text-center">
              <?php
              if ($image_name != "") {
              ?>
                <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-responsive img_category">
              <?php
              } else {
                echo "<h3 class='text-danger text-center'> Image not availables! </h3>";
              }
              ?>

              <h3 class="categories__title text-white"><?php echo $title; ?></h3>
            </div>
          </a>
      <?php
        }
      } else {
        echo "<h3 class='text-danger text-center'> Category not added! </h3>";
      }
      ?>
    </div>
  </div>
</section>

<!-- 4. Interior -->
<section class="interior-home">
  <div class="container">
    <h2 class="text-center info-text-1 text-dark mb-5">Best Selling</h2>

    <div class="row">
      <?php
      $sql2 = "SELECT * FROM food WHERE featured='Yes' AND active='Yes' LIMIT 6";
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
        echo "<h3 class='text-danger text-center'> Dish not availables! </h3>";
      }
      ?>
    </div>

    <p class="text-center mt-5">
      <a href="<?php echo SITEURL; ?>foods.php">See All Dishes</a>
    </p>
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
      echo ("<script>location.href = '" . SITEURL . "';</script>");
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