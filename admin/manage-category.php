<?php
    include './partials/header.php';

    $query = "SELECT * from category order by ctitle";
    $result=mysqli_query($conn, $query);
    
?>
    <section class="dashboard">
        <?php if(isset($_SESSION['category-add-success'])) {?>
            <div class="alert_message success container" style="text-align: center;">
                <p>
                    <?= $_SESSION['category-add-success'];
                        unset($_SESSION['category-add-success']);
                    ?>
                </p>
            </div>
        <?php } elseif(isset($_SESSION['edit-category-success'])) {?>
            <div class="alert_message success container" style="text-align: center;">
                <p>
                    <?= $_SESSION['edit-category-success'];
                        unset($_SESSION['edit-category-success']);
                    ?>
                </p>
            </div>
        <?php } elseif(isset($_SESSION['edit-category'])) {?>
            <div class="alert_message error container" style="text-align: center;">
                <p>
                    <?= $_SESSION['edit-category'];
                        unset($_SESSION['edit-category']);
                    ?>
                </p>
            </div>
        <?php } ?>

        <?php if(isset($_SESSION['delete-category-success'])) {?>
            <div class="alert_message success container" style="text-align: center;">
                <p>
                    <?= $_SESSION['delete-category-success'];
                        unset($_SESSION['delete-category-success']);
                    ?>
                </p>
            </div>
        <?php } elseif(isset($_SESSION['delete-category'])) {?>
            <div class="alert_message error container" style="text-align: center;">
                <p>
                    <?= $_SESSION['delete-category'];
                        unset($_SESSION['delete-category']);
                    ?>
                </p>
            </div>
        <?php } ?>
        <div class="container dashboard_container">
            <button class="sider_toggle" id="show_sidebar-btn"><i class="uil uil-angle-right-b"></i></button>
            <button class="sider_toggle" id="hide_sidebar-btn"><i class="uil uil-angle-left-b"></i></button>
            <aside>
                <ul>
                    <li>
                        <a href="./add-post.php">
                            <i class="uil uil-pen"></i>
                            <h5>add post</h5>
                        </a>
                    </li>

                    <li>
                        <a href="./index.php">
                            <i class="uil uil-postcard"></i>
                            <h5>manage post</h5>
                        </a>
                    </li>

                    <?php
                        if(isset($_SESSION['user_is_admin'])){
                    ?>

                    <li>
                        <a href="./add-user.php">
                            <i class="uil uil-user-plus"></i>
                            <h5>add user</h5>
                        </a>
                    </li>

                    <li>
                        <a href="./manage-user.php">
                            <i class="uil uil-users-alt"></i>
                            <h5>manage users</h5>
                        </a>
                    </li>

                    <li>
                        <a href="./add-category.php">
                            <i class="uil uil-edit"></i>
                            <h5>add categories</h5>
                        </a>
                    </li>

                    <li>
                        <a href="./manage-category.php" class="active">
                            <i class="uil uil-list-ul"></i>
                            <h5>manage categories</h5>
                        </a>
                    </li>

                    <?php } ?>
                </ul>
            </aside>
            <main>
                <h2>manage categories</h2>
                <table>
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($user = mysqli_fetch_assoc($result)){ ?>
                        <tr>
                            <td><?php echo $user['ctitle'] ?></td>
                            <td><a href="<?= ROOT_URL ?>admin/edit-category.php?id=<?= $user['cid'] ?>" class="btn sm">edit</a></td>
                            <td><a href="<?= ROOT_URL ?>admin/delete-category.php?id=<?= $user['cid'] ?>" class="btn sm danger">delete</a></td>
                        </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </main>
        </div>
    </section>


<?php
    include './partials/footer.php';
?>