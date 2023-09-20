<?php
    include('../partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 px-5 mobile__content">
            <h1 class="text-center primary-color mt-3">List of User</h1>

            <!-- Display session -->
            <?php
                if (isset($_SESSION['user_not_found'])) {
                    echo $_SESSION['user_not_found'];
                    unset($_SESSION['user_not_found']);
                }

                if (isset($_SESSION['change_pass'])) {
                    echo $_SESSION['change_pass'];
                    unset($_SESSION['change_pass']);
                }

                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }
            ?>

            <!-- pc -->
            <table class="table table-striped mt-4 mobile__none tablet__none">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Username</th>
                    <th scope="col" class="text-center">Full Name</th>
                    <th scope="col" class="text-center">Birthday</th>
                    <th scope="col" class="text-center">Phone</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Rating</th>
                    <th scope="col" class="text-center">Feedback</th>
                    <th scope="col" class="text-center">Operation</th>
                </tr>
            </thead>
                <tbody>

                    <?php
                        // 1. SQL to get all user from db
                        $sql = "SELECT * FROM users";
                        $res = mysqli_query($connection, $sql);
                        
                        $n = 1;

                        $count = mysqli_num_rows($res);

                        if ($count > 0) {
                            // 2. Get each user
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $username = $row['username'];
                                $full_name = $row['full_name'];
                                $birthday = $row['birthday'];
                                $phone = $row['phone'];
                                $email = $row['email'];
                                $rating = $row['rating'];
                                $feedback = $row['feedback'];

                                ?>
                                    <!-- 3. Display each user -->
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $n++; ?></th>
                                        <td class="text-center"><?php echo $username; ?></td>
                                        <td class="text-center"><?php echo $full_name; ?></td>
                                        <td class="text-center"><?php echo $birthday; ?></td>
                                        <td class="text-center"><?php echo $phone; ?></td>
                                        <td class="text-center"><?php echo $email; ?></td>
                                        <td class="text-center">                                          
                                            <?php 
                                                if ($rating == "Very Bad") {                                                   
                                                    echo "<label class='text-danger'>$rating</label>";
                                                }
                                                else if ($rating == "Bad") {
                                                    echo "<label class='text-warning'>$rating</label>";
                                                }
                                                else if ($rating == "Mediocre") {
                                                    echo "<label>$rating</label>";
                                                }
                                                else if ($rating == "Good") {
                                                    echo "<label class='text-success'>$rating</label>";
                                                } 
                                                else if ($rating == "Very Good") {
                                                    echo "<label class='text-primary'>$rating</label>";
                                                } 
                                            ?>
                                        </td>
                                        <td class="text-center"><?php echo $feedback; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo SITEURL; ?>manager_page/user/change_password.php?id=<?php echo $id; ?>" class="btn btn-outline-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>manager_page/user/update_user.php?id=<?php echo $id; ?>" class="btn btn-outline-success mx-2 mt-2">Update</a>
                                            <a href="<?php echo SITEURL; ?>manager_page/user/delete_user.php?id=<?php echo $id; ?>" class="btn btn-outline-danger mt-2">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="8"><div class="text-danger">No User</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>

            <!-- tablet -->
            <table class="table table-striped mt-4 d-block d-xl-none mobile__none">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Username</th>
                    <th scope="col" class="text-center">Email</th>
                    <th scope="col" class="text-center">Operation</th>
                </tr>
            </thead>
                <tbody>

                    <?php
                        // 1. SQL to get all user from db
                        $sql1 = "SELECT * FROM users";
                        $res1 = mysqli_query($connection, $sql1);
                        
                        $n = 1;

                        $count1 = mysqli_num_rows($res1);

                        if ($count1 > 0) {
                            // 2. Get each user
                            while ($row1 = mysqli_fetch_assoc($res1)) {
                                $id = $row1['id'];
                                $username = $row1['username'];
                                $email = $row1['email'];

                                ?>
                                    <!-- 3. Display each user -->
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $n++; ?></th>
                                        <td class="text-center"><?php echo $username; ?></td>
                                        <td class="text-center"><?php echo $email; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo SITEURL; ?>manager_page/user/change_password.php?id=<?php echo $id; ?>" class="btn btn-outline-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>manager_page/user/update_user.php?id=<?php echo $id; ?>" class="responsive__operation btn btn-outline-success mx-2">Update</a>
                                            <a href="<?php echo SITEURL; ?>manager_page/user/delete_user.php?id=<?php echo $id; ?>" class="responsive__operation btn btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="4"><div class="text-danger">No User</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>

            <!-- mobile -->
            <table class="table table-striped mt-4 d-block d-xl-none tablet__none">
            <thead>
                <tr>
                    <th scope="col" class="text-center">#</th>
                    <th scope="col" class="text-center">Username</th>
                    <th scope="col" class="text-center">Operation</th>
                </tr>
            </thead>
                <tbody>

                    <?php
                        // 1. SQL to get all user from db
                        $sql1 = "SELECT * FROM users";
                        $res1 = mysqli_query($connection, $sql1);
                        
                        $n = 1;

                        $count1 = mysqli_num_rows($res1);

                        if ($count1 > 0) {
                            // 2. Get each user
                            while ($row1 = mysqli_fetch_assoc($res1)) {
                                $id = $row1['id'];
                                $username = $row1['username'];

                                ?>
                                    <!-- 3. Display each user -->
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $n++; ?></th>
                                        <td class="text-center"><?php echo $username; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo SITEURL; ?>manager_page/user/change_password.php?id=<?php echo $id; ?>" class="btn btn-outline-primary">Change Password</a>
                                            <a href="<?php echo SITEURL; ?>manager_page/user/update_user.php?id=<?php echo $id; ?>" class="responsive__operation btn btn-outline-success mx-2">Update</a>
                                            <a href="<?php echo SITEURL; ?>manager_page/user/delete_user.php?id=<?php echo $id; ?>" class="responsive__operation btn btn-outline-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="3"><div class="text-danger">No User</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include('../partials/footer.php');
?>