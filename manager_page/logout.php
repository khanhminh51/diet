<?php
    include('../config/constants.php');

    // 1. Delete Session
    unset($_SESSION['manager']);

    // 2. Redirect page
    header("location:".SITEURL."manager_page/login.php");
?>