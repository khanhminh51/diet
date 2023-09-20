<?php
    include('../partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-4 container">
            
            <div class="container-fluid pt-5">
                <div class="row main-content m-auto add-food__content">
                    <div class="col-md-4 company__info d-flex flex-column justify-content-center align-items-center">
                        <span class="company__logo"><h2><i class="display-3 fas fa-utensils"></i></h2></span>
                        <h4 class="company_title">Category</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form border-top border-right">
                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">
                            
                            <div class="row mb-3">
                                <h2>Creat New Category</h2>
                            </div>

                            <!-- Display session -->
                            <?php
                                if (isset($_SESSION['add'])) {
                                    echo $_SESSION['add'];
                                    unset($_SESSION['add']);
                                }

                                if (isset($_SESSION['upload'])) {
                                    echo $_SESSION['upload'];
                                    unset($_SESSION['upload']);
                                }
                            ?>

                            <div class="row w-100 mt-2">
                                <form control="" class="form-group w-100" method="POST" enctype="multipart/form-data">
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="title">Title:</label>
                                        <input type="text" name="title" id="title" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter Category Title'" placeholder="Enter Category Title">
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
                                    <div class="row">
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

        if (isset($_FILES['image']['name'])) { // Check image selected or not
            // 1.1 To upload image, need image name, source path and destination
            $image_name = $_FILES['image']['name'];
            if ($image_name != "") {
                // Rename image
                $ext = end(explode('.', $image_name));
                $image_name = "Category_".rand(0000,9999).'.'.$ext;

                $source_path = $_FILES['image']['tmp_name'];
                $destination_path = "../../images/category/".$image_name;

                // 1.2 Upload image
                $upload = move_uploaded_file($source_path, $destination_path);
                if ($upload == FALSE) {
                    $_SESSION['upload'] = "<h6 class='text-danger text-center'> Image upload failed! </h6>";
                    header("location:".SITEURL."manager_page/category/add_category.php");
                    die();
                }
            }
        } else {
            $image_name = "";
        }

        // 2. SQL to insert category to db
        $sql = "INSERT INTO category SET
            title = '$title',
            image_name = '$image_name',
            featured = '$featured',
            active = '$active'
        ";
        $res = mysqli_query($connection, $sql);

        // 3. Check category inserted or not
        if ($res == TRUE) {
            $_SESSION['add'] = "<h6 class='text-success text-center'> Category added successfully! </h6>";
            echo("<script>location.href = '".SITEURL."manager_page/category/category.php';</script>");
        } else {
            $_SESSION['add'] = "<h6 class='text-danger text-center'> Category added failed! </h6>";
            echo("<script>location.href = '".SITEURL."manager_page/category/add_category.php';</script>");
        }
    }
?>