<?php
    include('../partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-4 container">
            
            <div class="container-fluid pt-5">
                <div class="row main-content m-auto add-food__content">
                    <div class="col-md-4 company__info d-flex flex-column justify-content-center align-items-center">
                        <span class="company__logo"><h2><i class="display-3 fas fa-user"></i></h2></span>
                        <h4 class="company_title">User</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form border-top border-right">
                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">
                            
                            <div class="row mb-3">
                                <h2>Change Password</h2>
                            </div>

                            <!-- Get ID user -->
                            <?php
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];
                                }
                            ?>

                            <!-- Display session -->
                            <?php              
                                if (isset($_SESSION['pass_not_match'])) {
                                    echo $_SESSION['pass_not_match'];
                                    unset($_SESSION['pass_not_match']);
                                }
                            ?>

                            <div class="row w-100 mt-4">
                                <form control="" class="form-group w-100" method="POST">
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="new_password">New Password:</label>
                                        <input type="password" name="new_password" id="new_password" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter New Password'" placeholder="Enter New Password">
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="confirm_password">Confirm Password:</label>
                                        <input type="password" name="confirm_password" id="confirm_password" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Confirm New Password'" placeholder="Confirm New Password">
                                    </div>  
                                    <div class="row mt-3">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="submit" value="Change" name="submit" class="btn btn__login mx-5 mt-3 p-2">
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
        // 1. Get data form Form
        $id = $_POST['id'];
        $new_password = md5($_POST['new_password']);
        $confirm_password = md5($_POST['confirm_password']);

        // 2. SQL to Check ID existed or not
        $sql = "SELECT * FROM users WHERE id = $id";
        $res = mysqli_query($connection, $sql);

        if ($res == TRUE) {
            $count = mysqli_num_rows($res);

            if ($count == 1) { // user existed
                if ($new_password == $confirm_password) {
                    $sql2 = "UPDATE users SET
                        password = '$new_password'
                    WHERE id = $id
                    ";
                    $res2 = mysqli_query($connection, $sql2);
                    if ($res2 == TRUE) {
                        $_SESSION['change_pass'] = "<h6 class='text-success text-center'> Password changed succesfully! </h6>";
                        echo("<script>location.href = '".SITEURL."manager_page/user/user.php';</script>");
                    } else {
                        $_SESSION['change_pass'] = "<h6 class='text-danger text-center'> Failed to change Password! </h6>";
                        echo("<script>location.href = '".SITEURL."manager_page/user/user.php';</script>");
                    }
                } else {
                    $_SESSION['pass_not_match'] = "<h6 class='text-danger'> New Password and Confirm Password NOT match ! </h6>";
                    echo("<script>location.href = '".SITEURL."manager_page/user/change_password.php?id=$id';</script>");
                }
            } else {
                $_SESSION['user_not_found'] = "<h6 class='text-danger'> User DOESN'T EXIST! </h6>";
                echo("<script>location.href = '".SITEURL."manager_page/user/user.php;</script>"); 
            }
        }
    }
?>