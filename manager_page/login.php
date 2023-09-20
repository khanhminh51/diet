<?php
    include('../config/constants.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dish Order Website - Home Page</title>

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/manager.css">
    <link rel="stylesheet" href="../font/fontawesome-free-5.15.4/css/all.min.css">
</head>
<body>
    <!-- Header -->
    <div class="header border-bottom">
        <div class="py-3 container">
            <div class="header__content mb-0 pl-0 d-flex justify-content-between">
                <div>
                    <div class="">
                        <a class="header__item active" href="<?php echo SITEURL; ?>">
                            <i class="fas fa-home"></i>
                            Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="content">
        <div class="py-4 container">

            <div class="container-fluid pt-5">
                <div class="row main-content m-auto">
                    <div class="col-md-4 company__info d-flex flex-column justify-content-center align-items-center">
                        <span class="company__logo"><h2><i class="display-3 fas fa-user-cog"></i></h2></span>
                        <h4 class="company_title">Manager</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form border-top border-right">
                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">

                            <div class="row mb-3">
                                <h2>Log In</h2>
                            </div>

                            <!-- Display session -->
                            <?php
                                if (isset($_SESSION['login'])) {
                                    echo $_SESSION['login'];
                                    unset($_SESSION['login']);
                                }

                                if (isset($_SESSION['manager_not_login'])) {
                                    echo $_SESSION['manager_not_login'];
                                    unset($_SESSION['manager_not_login']);
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
        // 1. Get data from Form
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // 2. SQL to Check username and password existed or not
        $sql = "SELECT * FROM manager WHERE username = '$username' AND password = '$password'";
        $res = mysqli_query($connection, $sql);

        // 3. Check Manager existed or not
        $count = mysqli_num_rows($res);

        if ($count == 1) {
            $_SESSION['login'] = "<h6 class='text-success text-center'> Login successfully! </h6>";
            $_SESSION['manager'] = $username; // logged
            echo("<script>location.href = '".SITEURL."manager_page/index.php';</script>");
        } else {
            $_SESSION['login'] = "<h6 class='text-danger'> Username or Password WRONG! </h6>";
            echo("<script>location.href = '".SITEURL."manager_page/login.php';</script>");
        }
    }
?>