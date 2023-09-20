<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-4 container">
            
            <div class="container-fluid py-5">
                <div class="row main-content m-auto">
                    <div class="col-md-4 company__info d-flex flex-column justify-content-center align-items-center">
                        <span class="company__logo"><h2><i class="display-1 fas fa-user"></i></h2></span>
                        <h4 class="company_title">User</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form border-top border-right">
                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">
                            
                            <div class="row mt-3">
                                <h2>Log In</h2>
                            </div>

                            <!-- Display session -->
                            <?php
                                if (isset($_SESSION['login'])) {
                                    echo $_SESSION['login'];
                                    unset($_SESSION['login']);
                                }

                                if (isset($_SESSION['not_login'])) {
                                    echo $_SESSION['not_login'];
                                    unset($_SESSION['not_login']);
                                }

                                if (isset($_SESSION['register'])) {
                                    echo $_SESSION['register'];
                                    unset($_SESSION['register']);
                                }
                            ?>

                            <div class="row w-100">
                                <form control="" class="form-group w-100" method="POST">
                                    <div class="row">
                                        <input type="text" name="username" id="username" class="form__input mobile__login p-2 pl-5 my-3 mx-5" onfocus="this.placeholder=''" onblur="this.placeholder='Username'" placeholder="Username">
                                    </div>
                                    <div class="row">
                                        <input type="password" name="password" id="password" class="form__input mobile__login p-2 pl-5 my-3 mx-5" onfocus="this.placeholder=''" onblur="this.placeholder='Password'" placeholder="Password">
                                    </div>
                                    <div class="row">
                                        <input type="submit" value="Login" name="submit" class="mobile__login btn btn__login mx-5 mt-3 p-2">
                                    </div>
                                </form>
                            </div>

                            <div class="row w-100 d-flex justify-content-center">
                                <a href="<?php echo SITEURL; ?>manager_page/login.php" class="mobile__login btn btn__login manager__btn mx-5 mt-3 p-2">Login with Manager</a>
                            </div>

                            <div class="row mt-5 text-center">
                                <p>Don't have an account? <a href="<?php echo SITEURL; ?>user_page/register.php">Register Here</a></p>
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

<!-- Program -->
<?php
    if (isset($_POST['submit'])) {
        // 1, Get data from Form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // 2. SQL to check user existed or not
        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $res = mysqli_query($connection, $sql);

        // 3. Check user existed or not
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $_SESSION['login'] = "<h6 class='login-success text-center'> Login successfully! </h6>";
            $_SESSION['user'] = $username; // logged
            echo("<script>location.href = '".SITEURL."';</script>");
        } else {
            $_SESSION['login'] = "<h6 class='text-danger'> Username or Password WRONG! </h6>";
            echo("<script>location.href = '".SITEURL."user_page/login.php';</script>");
        }
    }
?>