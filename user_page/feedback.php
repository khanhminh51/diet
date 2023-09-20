<?php
    include('partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-4 container">

        <?php
            // 1. Get ID user
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
            }
        ?>
            
            <div class="container-fluid py-3">
                <div class="row main-content m-auto personal__content">
                    <div class="col-md-4 company__info d-flex flex-column justify-content-center align-items-center">
                        <span class="company__logo"><h2><i class="display-1 fas fa-comments"></i></h2></span>
                        <h4 class="company_title">Feedback</h4>
                    </div>
                    <div class="col-md-8 col-xs-12 col-sm-12 login_form border-top border-right">
                        <div class="container-fluid d-flex flex-column justify-content-center align-items-center h-100">

                            <div class="row w-100">
                                <form control="" class="form-group w-100" method="POST">
                                    <div class="modal-body text-center">
                                        <h3>Your opinion matters</h3>
                                        <h5>Help us improve our product? <strong>Give us your feedback.</strong></h5>
                                        <hr>
                                        <h6>Your Rating</h6>
                                    </div>

                                    <div class="form-check mb-2 ml-5">
                                        <input name="rating" id="verygood" type="radio" value="Very Good">
                                        <label class="ml-3" for="verygood">Very good</label>
                                    </div>
                                    <div class="form-check mb-2 ml-5">
                                        <input name="rating" id="good" type="radio" value="Good">
                                        <label class="ml-3" for="good">Good</label>
                                    </div>
                                    <div class="form-check mb-2 ml-5">
                                        <input name="rating" id="mediocre" type="radio" value="Mediocre">
                                        <label class="ml-3" for="mediocre">Mediocre</label>
                                    </div>
                                    <div class="form-check mb-2 ml-5">
                                        <input name="rating" id="bad" type="radio" value="Bad">
                                        <label class="ml-3" for="bad">Bad</label>
                                    </div>
                                    <div class="form-check mb-2 ml-5">
                                        <input name="rating" id="verybad" type="radio" value="Very Bad">
                                        <label class="ml-3" for="verybad">Very Bad</label>
                                    </div>

                                    <div class="text-center">
                                        <h4>What could we improve?</h4>
                                    </div> 
                                    <div class="row">
                                        <textarea name="feedback" rows="3" class="form__input p-2 pl-3 mb-3 mx-5" onfocus="this.placeholder=''" onblur="this.placeholder='Enter your Feedback'" placeholder="Enter your Feedback"></textarea>
                                    </div>

                                    <div class="row mb-3">
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                                        <input type="submit" value="Send" name="submit" class="btn btn__login mx-5 mt-3 p-2">
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
        echo $id = $_POST['id'];
        if (isset($_POST['rating'])) {
            $rating = $_POST['rating'];
        } else {
            $rating = "Mediocre";
        }
        echo $feedback = $_POST['feedback'];

        // 2. SQL to update feedback to db
        $sql = "UPDATE users SET
            rating = '$rating',
            feedback = '$feedback'
        WHERE id=$id             
        ";
        $res = mysqli_query($connection, $sql);

        // 3. Check Feedback updated or not
        if ($res == TRUE) {
            $_SESSION['feedback'] = "<h4 class='text-success text-center'> Thanks for your feedback! </h4>";
            echo("<script>location.href = '".SITEURL."user_page/user.php?id=$id';</script>");
        } else {
            $_SESSION['feedback'] = "<h4 class='text-danger text-center'> Failed to sent your feedback! </h4>";
            echo("<script>location.href = '".SITEURL."user_page/user.php?id=$id';</script>");
        }
    }
?>