<?php
    include('../../config/constants.php');

    // 1. Get ID of Manager
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
    }

    // 2. SQL to delete manager
    $sql = "DELETE FROM manager WHERE id=$id";
    $res = mysqli_query($connection, $sql);

    // 3. Check Manager deleted or not
    if ($res == TRUE) {
        $_SESSION['delete'] = "<h6 class='text-success text-center'> Manager deleted successfully! </h6>";
        header("location:".SITEURL."manager_page/manager/manager.php");
    } else {
        $_SESSION['delete'] = "<h6 class='text-danger text-center'> Manager deleted failed! </h6>";
        header("location:".SITEURL."manager_page/manager/manager.php");
    }  
?>