<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-4 container">
            
            <div class="container-fluid py-3">
                <div class="row main-content m-auto">
                    <div class="col-md-4 company__info d-flex flex-column justify-content-center align-items-center">
                        <span class="company__logo"><h2><i class="display-1 fas fa-user"></i></h2></span>
                        <h4 class="company_title">User</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form border-top border-right">
                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">
                            
                            <div class="row my-3">
                                <h2>Register</h2>
                            </div>

                            <!-- Display session -->
                            <?php
                                if (isset($_SESSION['add'])) {
                                    echo $_SESSION['add'];
                                    unset($_SESSION['add']);
                                }
                            ?>

                            <div class="row w-100">
                                <form control="" class="form-group w-100" method="POST">
                                    <div class="row">
                                        <label class="col-md-3 mobile__label ml-5 col-form-label text-center" for="full_name">Full name:</label>
                                        <input type="text" name="full_name" id="full_name" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Full Name'" placeholder="Enter your Full Name">
                                    </div> 
                                    <div class="row">
                                        <label class="col-md-3 mobile__label ml-5 col-form-label text-center" for="birthday">Birthday:</label>
                                        <input type="text" name="birthday" id="birthday" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Birthday'" placeholder="Enter your Birthday">
                                    </div> 
                                    <div class="row">
                                        <label class="col-md-3 mobile__label ml-5 col-form-label text-center" for="phone">Phone:</label>
                                        <input type="text" name="phone" id="phone" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Phone'" placeholder="Enter your Phone">
                                    </div> 
                                    <div class="row">
                                        <label class="col-md-3 mobile__label ml-5 col-form-label text-center" for="email">Email:</label>
                                        <input type="email" name="email" id="email" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Email'" placeholder="Enter your Email">
                                    </div> 
                                    <div class="row">
                                        <label class="col-md-3 mobile__label ml-5 col-form-label text-center" for="username">Username:</label>
                                        <input type="text" name="username" id="username" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Username'" placeholder="Enter your Username">
                                    </div>
                                    <div class="row">
                                        <label class="col-md-3 mobile__label ml-5 col-form-label text-center" for="password">Password:</label>
                                        <input type="password" name="password" id="password" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Password'" placeholder="Enter your Password">
                                    </div>
                                    <div class="row mb-3">
                                        <input type="submit" value="Create" name="submit" class="mobile__login btn btn__login mx-5 mt-3 p-2">
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
        $full_name = $_POST['full_name'];
        $birthday = $_POST['birthday'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // 2. SQL to insert user into db
        $sql = "INSERT INTO users SET
            full_name = '$full_name',
            birthday = '$birthday',
            phone = '$phone',
            email = '$email',
            username = '$username',
            password = '$password'
        ";
        $res = mysqli_query($connection, $sql);

        // 3. Check user inserted or not
        if ($res == TRUE) {
            $_SESSION['register'] = "<h6 class='text-success text-center'> Register successfully! Now, you can Login </h6>";
            echo("<script>location.href = '".SITEURL."user_page/login.php';</script>");
        } else {
            $_SESSION['register'] = "<h6 class='text-danger text-center'> Register failed! </h6>";
            echo("<script>location.href = '".SITEURL."user_page/register.php';</script>");
        }
    }
?>