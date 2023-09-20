<?php
    include('../partials/header.php');
?>

    <!-- Content -->
    <div class="content">
        <div class="py-3 container">
            <h1 class="text-center primary-color mt-3">List of Category</h1>

            <!-- Button add Category -->           
            <div class="text-center">
                <a href="add_category.php" class="btn__mobile btn btn__login w-25 mb-2 mt-2">Create New Category</a>
            </div>

            <!-- Display session -->
            <?php
                if (isset($_SESSION['add'])) {
                    echo $_SESSION['add'];
                    unset($_SESSION['add']);
                }

                if (isset($_SESSION['remove'])) {
                    echo $_SESSION['remove'];
                    unset($_SESSION['remove']);
                }

                if (isset($_SESSION['delete'])) {
                    echo $_SESSION['delete'];
                    unset($_SESSION['delete']);
                }

                if (isset($_SESSION['not_category'])) {
                    echo $_SESSION['not_category'];
                    unset($_SESSION['not_category']);
                }

                if (isset($_SESSION['update'])) {
                    echo $_SESSION['update'];
                    unset($_SESSION['update']);
                }

                if (isset($_SESSION['upload'])) {
                    echo $_SESSION['upload'];
                    unset($_SESSION['upload']);
                }

                if (isset($_SESSION['remove_old_image'])) {
                    echo $_SESSION['remove_old_image'];
                    unset($_SESSION['remove_old_image']);
                }
            ?>

            <table class="table table-striped mt-3 mobile__none">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Title</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Featured</th>
                        <th scope="col" class="text-center">Active</th>
                        <th scope="col" class="text-center">Operation</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        // 1. SQL to get all category from db
                        $sql = "SELECT * FROM category";
                        $res = mysqli_query($connection, $sql);

                        $n = 1;

                        $count = mysqli_num_rows($res);
                        if ($count > 0) {
                            // 2. Get each category
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];
                                $featured = $row['featured'];
                                $active = $row['active'];

                                ?>
                                    <!-- 3. Display each category -->
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $n++; ?></th>
                                        <td class="text-center"><?php echo $title; ?></td>

                                        <td class="text-center">
                                            <?php
                                                if ($image_name != "") {
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-thumbnail" style="width: 100px; height: 100px;">
                                                    <?php
                                                } else {
                                                    echo "Image not found";
                                                }
                                            ?>                                   
                                        </td>

                                        <td class="text-center"><?php echo $featured; ?></td>
                                        <td class="text-center"><?php echo $active; ?></td>
                                        <td class="text-center">
                                            <a href="<?php echo SITEURL; ?>manager_page/category/update_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-outline-success">Update</a>
                                            <a href="<?php echo SITEURL; ?>manager_page/category/delete_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="btn btn-outline-danger ml-2">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="6"><div class="text-danger">No Category Added.</div></td>
                                </tr>
                            <?php
                        }
                    ?>
                </tbody>
            </table>

            <!-- mobile -->
            <table class="table table-striped mt-3 d-md-none">
                <thead>
                    <tr>
                        <th scope="col" class="text-center">#</th>
                        <th scope="col" class="text-center">Title</th>
                        <th scope="col" class="text-center">Image</th>
                        <th scope="col" class="text-center">Operation</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                        // 1. SQL to get all category from db
                        $sql = "SELECT * FROM category";
                        $res = mysqli_query($connection, $sql);

                        $n = 1;

                        $count = mysqli_num_rows($res);
                        if ($count > 0) {
                            // 2. Get each category
                            while ($row = mysqli_fetch_assoc($res)) {
                                $id = $row['id'];
                                $title = $row['title'];
                                $image_name = $row['image_name'];

                                ?>
                                    <!-- 3. Display each category -->
                                    <tr>
                                        <th scope="row" class="text-center"><?php echo $n++; ?></th>
                                        <td class="text-center"><?php echo $title; ?></td>

                                        <td class="text-center">
                                            <?php
                                                if ($image_name != "") {
                                                    ?>
                                                        <img src="<?php echo SITEURL; ?>images/category/<?php echo $image_name; ?>" class="img-thumbnail" style="width: 100px; height: 100px;">
                                                    <?php
                                                } else {
                                                    echo "Image not found";
                                                }
                                            ?>                                   
                                        </td>

                                        <td class="text-center">
                                            <a href="<?php echo SITEURL; ?>manager_page/category/update_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="responsive__operation btn btn-outline-success">Update</a>
                                            <a href="<?php echo SITEURL; ?>manager_page/category/delete_category.php?id=<?php echo $id; ?>&image_name=<?php echo $image_name; ?>" class="responsive__operation btn btn-outline-danger ml-2">Delete</a>
                                        </td>
                                    </tr>
                                <?php
                            }
                        } else {
                            ?>
                                <tr>
                                    <td colspan="4"><div class="text-danger">No Category Added.</div></td>
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