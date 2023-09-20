<?php
    include('../partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-4 container">

            <div class="container-fluid py-3">
                <div class="row main-content m-auto add-food__content">
                    <div class="col-md-4 company__info d-flex flex-column justify-content-center align-items-center">
                        <span class="company__logo"><h2><i class="display-1 fas fa-hamburger"></i></h2></span>
                        <h4 class="company_title">Dish</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form border-top border-right">
                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">

                            <div class="row my-3">
                                <h2>Update Dish</h2>
                            </div>

                            <?php
                                // 1. Get ID interior
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    // 2. SQL to get Interior have $id
                                    $sql2 = "SELECT * FROM food WHERE id=$id";
                                    $res2 = mysqli_query($connection, $sql2);

                                    $count2 = mysqli_num_rows($res2);
                                    if ($count2 == 1) {
                                        $row2 = mysqli_fetch_assoc($res2);

                                        $title = $row2['title'];
                                        $description = $row2['description'];
                                        $price = $row2['price'];
                                        $current_image = $row2['image_name'];
                                        $current_category = $row2['category_id'];
                                        $featured = $row2['featured'];
                                        $active = $row2['active'];
                                    } else {
                                        $_SESSION['not_food'] = "<h6 class='text-danger text-center'> Interior NOT Found! </h6>";
                                        header("location:".SITEURL."manager_page/.php");
                                    }
                                } else {
                                    header("location:".SITEURL."manager_page/interior/food.php");
                                }
                            ?>

                            <div class="row w-100">
                                <form control="" class="form-group w-100" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="title">Title:</label>
                                        <input type="text" name="title" id="title" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $title; ?>">
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="description">Description:</label>
                                        <textarea name="description" id="description" class="form__input col-md-7 mb-3 p-2 pl-4" rows="3"><?php echo $description; ?></textarea>
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="price">Price:</label>
                                        <input type="number" name="price" id="price" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $price; ?>">
                                    </div>

                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="category">Category:</label>
                                        <select name="category" id="category" class="form__input col-md-7 mb-3 p-2 pl-4">
                                        <?php
                                            // 1. SQL to get category from db
                                            $sql = "SELECT * FROM category WHERE active='Yes'";
                                            $res = mysqli_query($connection, $sql);

                                            // 2. Display in select category
                                            $count = mysqli_num_rows($res);
                                            if ($count > 0) {
                                                while ($row = mysqli_fetch_assoc($res)) {
                                                    // Get information of category
                                                    $category_id = $row['id'];
                                                    $category_title = $row['title'];

                                                    ?>
                                                        <option <?php if($category_id == $current_category) {echo "selected";} ?> value="<?php echo $category_id; ?>"><?php echo $category_title; ?></option>
                                                    <?php
                                                }
                                            } else {
                                                ?>
                                                    <option value="0">No Category Found</option>
                                                <?php
                                            }
                                        ?>
                                        </select>
                                    </div>

                                    <div class="row mb-3">
                                        <label class="mobile__label col-md-3 ml-5 text-right col-form-label text-center">Current Image:</label>
                                        <?php
                                            if ($current_image != "") {
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>images/food/<?php echo $current_image; ?>" class="rounded img-thumbnail" style="width: 200px; height: 100px;">
                                                <?php
                                            } else {
                                                echo "<h3 class='text-danger text-center'> Image not added! </h3>";
                                            }
                                        ?>
                                    </div>

                                    <div class="row d-flex align-items-center">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="image">New Image:</label>
                                        <input type="file" class="col-md-7 pl-0" id="image" name="image">
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="featured">Featured:</label>
                                        <input <?php if($featured=="Yes"){echo "checked";} ?> type="radio" class="" id="featured" name="featured" value="Yes"> Yes
                                        <input <?php if($featured=="No"){echo "checked";} ?> type="radio" class="ml-3" id="featured" name="featured" value="No"> No
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="active">Active:</label>
                                        <input <?php if($active=="Yes"){echo "checked";} ?> type="radio" class="" id="active" name="active" value="Yes"> Yes
                                        <input <?php if($active=="No"){echo "checked";} ?> type="radio" class="ml-3" id="active" name="active" value="No"> No
                                    </div>
                                    <div class="row mb-3">
                                        <input type="hidden" name="current_image" value="<?php echo $current_image; ?>">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
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
        // 1. Get data from Form
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $current_image = $_POST['current_image'];
        $category = $_POST['category'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];

        // 2. Update New Image if selected
        if (isset($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];

            if ($image_name != "") {
                // 2.1 Upload New Image
                // Rename image
                $ext = end(explode('.', $image_name));
                $image_name = "Food_".rand(0000,9999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../../images/food/".$image_name;

                // 2.2 Upload image
                $upload = move_uploaded_file($source_path, $destination_path);
                if ($upload == FALSE) {
                    $_SESSION['upload'] = "<h6 class='text-danger text-center'> Image upload failed! </h6>"; //display message
                    header("location:".SITEURL."manager_page/interior/food.php");
                    die();
                }

                // 2.3 Remove Old Image
                if ($current_image != "") {
                    $path = "../../images/food/".$current_image;
                    $remove = unlink($path);

                    if ($remove == FALSE) { // failed to delete image
                        $_SESSION['remove_old_image'] = "<h6 class='text-danger text-center'> Category Image change FAILED! </h6>"; //display message
                        header("location:".SITEURL."manager_page/interior/food.php");
                        die();
                    }
                }

            } else {
                $image_name = $current_image;
            }
        } else {
            $image_name = $current_image;
        }

        // 3. SQL to Update interior in db
        $sql3 = "UPDATE food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = '$category',
            featured = '$featured',
            active = '$active'
        WHERE id = $id
        ";
        $res3 = mysqli_query($connection, $sql3);

        // 4. Check interior updated or not
        if ($res3 == TRUE) {
            $_SESSION['update'] = "<h6 class='text-success text-center'> Interior updated successfully! </h6>"; //display message
            echo("<script>location.href = '".SITEURL."manager_page/interior/food.php';</script>");
        } else {
            $_SESSION['update'] = "<h6 class='text-danger text-center'> Interior updated failed! </h6>"; //display message
            echo("<script>location.href = '".SITEURL."manager_page/interior/food.php';</script>");
        }
    }
?>