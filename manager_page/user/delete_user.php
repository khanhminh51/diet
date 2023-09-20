<?php
    include('../../config/constants.php');

    // 1. Get ID of admin
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    // 2. Create SQL Query to delete admin
    $sql = "DELETE FROM users WHERE id=$id";

    $res = mysqli_query($connection, $sql);

    // 3. Redirect page
    if ($res == TRUE) {
        $_SESSION['delete'] = "<h3 class='text-success text-center'> User deleted successfully! </h3>"; //display message
        header("location:".SITEURL."manager_page/user/user.php"); //redirect page
    } else {
        $_SESSION['delete'] = "<h3 class='text-danger text-center'> User deleted failed! </h3>"; //display message
        header("location:".SITEURL."manager_page/user/user.php"); //redirect page
    }  
?>