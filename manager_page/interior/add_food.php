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
                                <h2>Creat New Dish</h2>
                            </div>

                            <div class="row w-100">
                                <form control="" class="form-group w-100" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="title">Title:</label>
                                        <input type="text" name="title" id="title" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Title'" placeholder="Title">
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="description">Description:</label>
                                        <textarea name="description" id="description" class="form__input col-md-7 mb-3 p-2 pl-4" rows="3" onfocus="this.placeholder=''" onblur="this.placeholder='Description'" placeholder="Description"></textarea>
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="price">Price:</label>
                                        <input type="number" name="price" id="price" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Price'" placeholder="Price">
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
                                                        $id = $row['id'];
                                                        $title = $row['title'];

                                                        ?>
                                                            <option value="<?php echo $id ?>"><?php echo $title ?></option>
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

                                    <div class="row d-flex align-items-center">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="image">Image:</label>
                                        <input type="file" class="col-md-7 pl-0" id="image" name="image">
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="featured">Featured:</label>
                                        <input type="radio" class="" id="featured" name="featured" value="Yes"> Yes
                                        <input type="radio" class="ml-3" id="featured" name="featured" value="No"> No
                                    </div>
                                    <div class="row d-flex align-items-center">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="active">Active:</label>
                                        <input type="radio" class="" id="active" name="active" value="Yes"> Yes
                                        <input type="radio" class="ml-3" id="active" name="active" value="No"> No
                                    </div>
                                    <div class="row mb-3">
                                        <input type="submit" value="Create" name="submit" class="btn btn__login mx-5 mt-3 p-2">
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
        $title = $_POST['title'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $category = $_POST['category'];

        if (isset($_POST['featured'])) {
            $featured = $_POST['featured'];
        } else {
            $featured = "No";
        }

        if (isset($_POST['active'])) {
            $active = $_POST['active'];
        } else {
            $active = "No";
        }

        // 1.1 Upload image
        if (isset($_FILES['image']['name'])) { // Check image selected or not
            // 1. To upload image, need image name, source path and destination
            $image_name = $_FILES['image']['name'];
            if ($image_name != "") {
                // Rename image
                $ext = end(explode('.', $image_name));
                $image_name = "Food_".rand(0000,9999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../../images/food/".$image_name;

                // 2. Upload image
                $upload = move_uploaded_file($source_path, $destination_path);
                if ($upload == FALSE) { // image upload failed
                    $_SESSION['upload'] = "<h6 class='text-danger text-center'> Image upload failed! </h6>"; //display message
                    header("location:".SITEURL."manager_page/interior/add_food.php");
                    die();
                }
            }
        } else {
            $image_name = "";
        }

        // 2. SQL to insert interior to db
        $sql2 = "INSERT INTO food SET
            title = '$title',
            description = '$description',
            price = $price,
            image_name = '$image_name',
            category_id = $category,
            featured = '$featured',
            active = '$active'
        ";
        $res2 = mysqli_query($connection, $sql2);

        // 3. Check Interior inserted or not
        if ($res == TRUE) {
            $_SESSION['add'] = "<h6 class='text-success text-center'> Interior added successfully! </h6>"; //display message
            echo("<script>location.href = '".SITEURL."manager_page/interior/food.php';</script>");
        } else {
            $_SESSION['add'] = "<h6 class='text-danger text-center'> Interior added failed! </h6>"; //display message
            echo("<script>location.href = '".SITEURL."manager_page/interior/add_food.php';</script>");
        }
    }
?>