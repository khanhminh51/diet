<?php
    include('../partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-4 container">
            
            <div class="container-fluid pt-5">
                <div class="row main-content m-auto add-food__content">
                    <div class="col-md-4 company__info d-flex flex-column justify-content-center align-items-center">
                        <span class="company__logo"><h2><i class="display-3 fas fa-user-cog"></i></h2></span>
                        <h4 class="company_title">Manager</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form border-top border-right">
                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">
                            
                            <div class="row mb-4">
                                <h2>Creat New Manager</h2>
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
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="full_name">Full name:</label>
                                        <input type="text" name="full_name" id="full_name" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Full Name'" placeholder="Enter your Full Name">
                                    </div> 
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="username">Username:</label>
                                        <input type="text" name="username" id="username" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Username'" placeholder="Enter your Username">
                                    </div>
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="password">Password:</label>
                                        <input type="password" name="password" id="password" class="form__input col-md-7 mb-3 p-2 pl-4" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Password'" placeholder="Enter your Password">
                                    </div>
                                    <div class="row">
                                        <input type="submit" value="Create" name="submit" class="btn btn__login mx-5 mt-3 p-2">
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

        // 1. Get data from Form
        $full_name = $_POST['full_name'];
        $username = $_POST['username'];
        $password = md5($_POST['password']);

        // 2. SQL Query to insert data into db
        $sql = "INSERT INTO manager SET
            full_name = '$full_name',
            username = '$username',
            password = '$password'
        ";
        $res = mysqli_query($connection, $sql);

        // 3. Check data inserted or not
        if ($res == TRUE) {
            $_SESSION['add'] = "<h6 class='text-success text-center'> Manager added successfully! </h6>";
            echo("<script>location.href = '".SITEURL."manager_page/manager/manager.php';</script>");
        } else {
            $_SESSION['add'] = "<h6 class='text-danger text-center'> Manager added failed! </h6>";
            echo("<script>location.href = '".SITEURL."manager_page/manager/add_manager.php';</script>");
        }
    }
?>