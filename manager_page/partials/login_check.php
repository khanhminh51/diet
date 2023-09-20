<?php
    if (!isset($_SESSION['manager'])) { // if not login
        $_SESSION['manager_not_login'] = "<h6 class='text-danger'> Please LOGIN to access Manager Panel! </h6>";
        header("location:".SITEURL."manager_page/login.php");
    }
?>
