<?php
    include('partials_front/header.php');
?>
    <!-- 1. Background -->
    <section class="interior-search img-category text-center"></section>

    <!-- 2. Categories -->
    <section class="categories-home">
        <div class="container">
            <h2 class="text-center info-text-1 text-dark mb-5">Categories</h2>

            <div class="row d-flex">
                <?php
                    // 1. SQL to display categories from db
                    $sql = "SELECT * FROM category WHERE active='Yes'";
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

<?php
    include('partials_front/footer.php');
?>