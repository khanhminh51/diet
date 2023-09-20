<?php
    include('../partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">

            <h1 class="text-center primary-color mt-3">List of Manager</h1>

            <!-- Button add Manager-->
            <div class="text-center">
                <a href="add_manager.php" class="btn__mobile btn btn__login w-25 mb-2 mt-2">Create New Manager</a>
            </div>

            <!-- Display session -->
            <?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if (isset($_SESSION['change_pass'])) {
                    echo $_SESSION['change_pass'];
                    unset($_SESSION['change_pass']);
                }
            ?>

            <!-- pc and tablet -->
            <table class="table table-striped mt-3 mobile__none">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Full Name</th>
                        <th scope="col" class="text-center">Username</th>
                        <th scope="col" class="text-center">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // 1. SQL to get all manager from db
                        $sql = "SELECT * FROM manager";
                        $res = mysqli_query($connection, $sql);

                        $n = 1;

                        if ($res == TRUE) {
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                // 2. Get each manager
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    $id = $rows['id'];
                                    $full_name = $rows['full_name'];
                                    $username = $rows['username'];
                                
                                    ?>
                                        <!-- 3. Display each manager -->
                                        <tr>
                                            <th scope="row" class="text-center"><?php echo $n++; ?></th>
                                            <td class="text-center"><?php echo $full_name; ?></td>
                                            <td class="text-center"><?php echo $username; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo SITEURL; ?>manager_page/manager/change_password.php?id=<?php echo $id; ?>" class="btn btn-outline-primary">Change Password</a>
                                                <a href="<?php echo SITEURL; ?>manager_page/manager/update_manager.php?id=<?php echo $id; ?>" class="responsive__operation btn btn-outline-success mx-2">Update</a>
                                                <a href="<?php echo SITEURL; ?>manager_page/manager/delete_manager.php?id=<?php echo $id; ?>" class="responsive__operation btn btn-outline-danger">Delete</a>
                                            </td>
                                        </tr>

                                    <?php
                                }                               
                            } else {
                                ?>
                                    <tr>
                                        <td colspan="4"><div class="text-danger">No Manager</div></td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>

            <!-- mobile -->
            <table class="table table-striped mt-3 d-block d-md-none">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Username</th>
                        <th scope="col" class="text-center">Operation</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        // 1. SQL to get all manager from db
                        $sql = "SELECT * FROM manager";
                        $res = mysqli_query($connection, $sql);

                        $n = 1;

                        if ($res == TRUE) {
                            $count = mysqli_num_rows($res);

                            if ($count > 0) {
                                // 2. Get each manager
                                while ($rows = mysqli_fetch_assoc($res)) {
                                    $id = $rows['id'];
                                    $username = $rows['username'];
                                
                                    ?>
                                        <!-- 3. Display each manager -->
                                        <tr>
                                            <th scope="row" class="text-center"><?php echo $n++; ?></th>
                                            <td class="text-center"><?php echo $username; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo SITEURL; ?>manager_page/manager/change_password.php?id=<?php echo $id; ?>" class="btn btn-outline-primary">Change Password</a>
                                                <a href="<?php echo SITEURL; ?>manager_page/manager/update_manager.php?id=<?php echo $id; ?>" class="responsive__operation btn btn-outline-success mx-2">Update</a>
                                                <a href="<?php echo SITEURL; ?>manager_page/manager/delete_manager.php?id=<?php echo $id; ?>" class="responsive__operation btn btn-outline-danger">Delete</a>
                                            </td>
                                        </tr>

                                    <?php
                                }                               
                            } else {
                                ?>
                                    <tr>
                                        <td colspan="3"><div class="text-danger">No Manager</div></td>
                                    </tr>
                                <?php
                            }
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

<?php
    include('../partials/footer.php');
?>