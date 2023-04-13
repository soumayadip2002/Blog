<?php
    include 'partials/header.php';
    $current_user_id = $_SESSION['user-id'];
    $post_query = "SELECT id, title, category_id from posts join users on posts.author_id=users.uid where 
    posts.author_id='$current_user_id' order by posts.id desc";
    $post_result = mysqli_query($conn, $post_query);
?>


    <section class="dashboard">
    <?php
        if(isset($_SESSION['user_is_admin'])){
    ?>
        <?php if(isset($_SESSION['add-post-success'])) {?>
            <div class="alert_message success container" style="text-align:center;">
                <p>
                    <?= $_SESSION['add-post-success'];
                        unset($_SESSION['add-post-success']);
                    ?>
                </p>
            </div>
        <?php } ?>

        <?php if(isset($_SESSION['post-edit-success'])) {?>
            <div class="alert_message success container" style="text-align:center;">
                <p>
                    <?= $_SESSION['post-edit-success'];
                        unset($_SESSION['post-edit-success']);
                    ?>
                </p>
            </div>
        <?php } elseif(isset($_SESSION['post-edit'])) {?>
            <div class="alert_message error container" style="text-align:center;">
                <p>
                    <?= $_SESSION['post-edit'];
                        unset($_SESSION['post-edit']);
                    ?>
                </p>
            </div>
        <?php } ?>
        <?php if(isset($_SESSION['delete-post-success'])) {?>
            <div class="alert_message success container" style="text-align:center;">
                <p>
                    <?= $_SESSION['delete-post-success'];
                        unset($_SESSION['delete-post-success']);
                    ?>
                </p>
            </div>
        <?php } elseif(isset($_SESSION['delete-post'])) {?>
            <div class="alert_message error container" style="text-align:center;">
                <p>
                    <?= $_SESSION['delete-post'];
                        unset($_SESSION['delete-post']);
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
                        <a href="./index.php" class="active">
                            <i class="uil uil-postcard"></i>
                            <h5>manage post</h5>
                        </a>
                    </li>

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
                        <a href="./manage-category.php">
                            <i class="uil uil-list-ul"></i>
                            <h5>manage categories</h5>
                        </a>
                    </li>
                    
                </ul>
            </aside>
            <main>
                <h2>manage posts</h2>
                <?php if(mysqli_num_rows($post_result)>0) {?>
                <table>
                    <thead>
                        <tr>
                            <th>title</th>
                            <th>category</th>
                            <th>edit</th>
                            <th>delete</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($result = mysqli_fetch_assoc($post_result)) {?>
                            <?php 
                                $category_id = $result['category_id'];
                                $category_query = "SELECT ctitle from category where cid='$category_id'";
                                $category_result = mysqli_query($conn, $category_query);
                                $category = mysqli_fetch_assoc($category_result);
                            ?>
                        <tr>
                            <td><?php echo $result['title']; ?></td>
                            <td><?php echo $category['ctitle']; ?></td>
                            <td><a href="<?= ROOT_URL ?>admin/edit-post.php?id=<?=$result['id'] ?>" class="btn sm">edit</a></td>
                            <td><a href="<?= ROOT_URL ?>admin/delete-post.php?id=<?=$result['id'] ?>" class="btn sm danger">delete</a></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } else {?>
                    <div class="alert_message error container" style="text-align: center;">
                        <?php echo "No posts available" ?>;
                    </div>
                <?php } ?>
            </main>
        </div>
        <?php } ?>
    </section>

<?php 
    include './partials/footer.php';
?>