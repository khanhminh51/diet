<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-4 container">
            
            <div class="container-fluid pt-5">
                <div class="row main-content m-auto personal__content">
                    <div class="col-md-4 company__info d-flex flex-column justify-content-center align-items-center">
                        <span class="company__logo"><h2><i class="display-1 fas fa-user"></i></h2></span>
                        <h4 class="company_title">User</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form border-top border-right">
                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">
                            
                            <div class="row my-3">
                                <h2>Update Information</h2>
                            </div>

                            <?php
                                // 1. Get ID user
                                if (isset($_GET['id'])) {
                                    $id = $_GET['id'];

                                    //2. SQL to get user have id=$id
                                    $sql = "SELECT * FROM users WHERE id=$id";
                                    $res = mysqli_query($connection, $sql);

                                    $count = mysqli_num_rows($res);
                                    if ($count == 1) {
                                        $row = mysqli_fetch_assoc($res);

                                        $full_name = $row['full_name'];
                                        $birthday = $row['birthday'];
                                        $phone = $row['phone'];
                                        $email = $row['email'];
                                    } else {
                                        header("location:".SITEURL);
                                    }
                                }
                            ?>

                            <div class="row w-100">
                                <form control="" class="form-group w-100" method="POST">
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="full_name">Full name:</label>
                                        <input type="text" name="full_name" id="full_name" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $full_name; ?>">
                                    </div> 
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="birthday">Birthday:</label>
                                        <input type="text" name="birthday" id="birthday" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $birthday; ?>">
                                    </div> 
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="phone">Phone:</label>
                                        <input type="text" name="phone" id="phone" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $phone; ?>">
                                    </div> 
                                    <div class="row">
                                        <label class="mobile__label col-md-3 ml-5 col-form-label text-center" for="email">Email:</label>
                                        <input type="email" name="email" id="email" class="form__input col-md-7 mb-3 p-2 pl-4" value="<?php echo $email; ?>">
                                    </div> 
                                    <div class="row mb-3">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="submit" value="Update" name="submit" class="btn btn__login mx-5 mt-3 p-2">
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
        $id = $_POST['id'];
        $full_name = $_POST['full_name'];
        $birthday = $_POST['birthday'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        // 2. SQL to update data into db
        $sql2 = "UPDATE users SET
            full_name = '$full_name',
            birthday = '$birthday',
            phone = '$phone',
            email = '$email'
        WHERE id = $id
        ";
        $res2 = mysqli_query($connection, $sql2);

        // 3. Check user updated or not
        if ($res2 == TRUE) {
            $_SESSION['update'] = "<h4 class='text-success text-center'> Personal Information updated successfully! </h4>";
            echo("<script>location.href = '".SITEURL."user_page/user.php?id=$id';</script>");
        } else {
            $_SESSION['update'] = "<h4 class='text-danger text-center'> Personal Information updated failed! </h4>";
            echo("<script>location.href = '".SITEURL."user_page/user.php?id=$id';</script>");
        }
    }
?>