<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-4 container">

            <!-- Display session -->
            <?php
                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if (isset($_SESSION['change_pass'])) {
                    echo $_SESSION['change_pass'];
                    unset($_SESSION['change_pass']);
                }

                if (isset($_SESSION['feedback'])) {
                    echo $_SESSION['feedback'];
                    unset($_SESSION['feedback']);
                }
            ?>
            
            <div class="container-fluid pt-5">
                <div class="row main-content m-auto personal__content">
                    <div class="col-md-4 company__info d-flex flex-column justify-content-center align-items-center">
                        <span class="company__logo"><h2><i class="display-1 fas fa-user"></i></h2></span>
                        <h4 class="company_title">User</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form border-top border-right">
                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">
                            
                            <div class="row mb-3 mt-2">
                                <h2>Personal Information</h2>
                            </div>

                            <?php
                                // 1. Get ID user                           
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    //2. SQL to get Manager have $id
                                    $sql = "SELECT * FROM users WHERE id=$id";
                                    $res = mysqli_query($connection, $sql);

                                    $count = mysqli_num_rows($res);
                                    if ($count == 1) {
                                        $row = mysqli_fetch_assoc($res);

                                        $full_name = $row['full_name'];
                                        $birthday = $row['birthday'];
                                        $phone = $row['phone'];
                                        $email = $row['email'];
                                    }
                                } else {
                                    header("location:".SITEURL);
                                }
                            ?>

                            <div class="row w-100">
                                <form control="" class="form-group w-100">
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center">Full Name:</label>
                                        <div class="col-md-7 mb-3 p-2 pl-4"><?php echo $full_name; ?></div>
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center">Birthday:</label>
                                        <div class="col-md-7 mb-3 p-2 pl-4"><?php echo $birthday; ?></div>
                                    </div> 
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center">Phone:</label>
                                        <div class="col-md-7 mb-3 p-2 pl-4"><?php echo $phone; ?></div>
                                    </div> 
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center">Email:</label>
                                        <div class="col-md-7 mb-3 p-2 pl-4"><?php echo $email; ?></div>
                                    </div>                                   
                                    <div class="row">
                                        <a href="<?php echo SITEURL; ?>user_page/change_password.php?id=<?php echo $id; ?>" class="mobile__login btn btn__login ml-5 user__btn mt-3 p-2">Change Password</a>
                                        <a href="<?php echo SITEURL; ?>user_page/update_user.php?id=<?php echo $id; ?>" class="mobile__login btn btn__login ml-5 user__btn mt-3 p-2">Update</a>
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
    include('partials/footer.php');
?>