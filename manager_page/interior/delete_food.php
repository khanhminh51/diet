<?php
    include('../../config/constants.php');

    if (isset($_GET['id']) AND isset($_GET['image_name'])) {
        // 1. Get ID and image_name of interior
        $id = $_GET['id'];
        $image_name = $_GET['image_name'];

        // 2. Delete image
        if ($image_name != "") {
            $path = "../../images/food/".$image_name;
            $remove = unlink($path);

            if ($remove == FALSE) { // failed to delete image
                $_SESSION['remove'] = "<h6 class='text-danger text-center'> Interior Image delete FAILED! </h6>";
                header("location:".SITEURL."manager_page/interior/food.php");
                die();
            }
        }

        // 3. SQL to delete data in db
        $sql = "DELETE FROM food WHERE id=$id";
        $res = mysqli_query($connection, $sql);
        if ($res == TRUE) {
            $_SESSION['delete'] = "<h6 class='text-success text-center'> Interior delete successfully! </h6>";
            header("location:".SITEURL."manager_page/interior/food.php");
        } else {
            $_SESSION['delete'] = "<h6 class='text-danger text-center'> Interior delete FAILED! </h6>";
            header("location:".SITEURL."manager_page/interior/food.php");
        }

    } else {
        $_SESSION['unauthorized'] = "<h6 class='text-danger text-center'> Unauthorized Access! </h6>";
        header("location:".SITEURL."manager_page/interior/food.php");
    }
?>