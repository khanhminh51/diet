<?php
    include('../config/constants.php');

    // 1. Delete Session
    unset($_SESSION['user']); // delete $_SESSION['user']
    unset($_SESSION['cart']);

    // 2. Redirect page
    header("location:".SITEURL);
?>