<?php
    include('../../config/constants.php');

    // 1. Get ID and image_name of category
    if (isset($_GET['id']) AND isset($_GET['image_name'])) {
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // Delete image
        if ($image_name != "") {
            $path = "../../images/category/".$image_name;
            $remove = unlink($path);

            if ($remove == FALSE) { // failed to delete image
                $_SESSION['remove'] = "<h6 class='text-danger text-center'> Category Image delete FAILED! </h6>"; //display message
                header("location:".SITEURL."manager_page/category/category.php");
                die();
            }
        }

        // 2. SQL to delete data in db
        $sql = "DELETE FROM category WHERE id=$id";
        $res = mysqli_query($connection, $sql);

        if ($res == TRUE) {
            $_SESSION['delete'] = "<h6 class='text-success text-center'> Category delete successfully! </h6>"; //display message
            header("location:".SITEURL."manager_page/category/category.php");
        } else {
            $_SESSION['delete'] = "<h6 class='text-danger text-center'> Category delete FAILED! </h6>"; //display message
            header("location:".SITEURL."manager_page/category/category.php");
        }
    } else {
        header("location:".SITEURL."manager_page/category/category.php");
    }
?>