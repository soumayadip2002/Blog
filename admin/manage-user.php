<?php
    include './partials/header.php';

    $current_admin_id = $_SESSION['user-id'];

    $query = "SELECT * from users where not uid = '$current_admin_id'";
    $users = mysqli_query($conn, $query);

?>

    <section class="dashboard">
        
        <?php if(isset($_SESSION['add-user-success'])){ ?>
            <div class="alert_message success container" style="text-align:center;">
                <p>
                    <?= $_SESSION['add-user-success'];
                        unset($_SESSION['add-user-success']);
                    ?>
                    
                </p>
            </div>
        <?php }
            elseif(isset($_SESSION['edit-user-success'])){ ?>
            
            <div class="alert_message success container" style="text-align:center;">
                <p>
                    <?= $_SESSION['edit-user-success'];
                        unset($_SESSION['edit-user-success']);
                    ?>
                    
                </p>
            </div>

        <?php }
            elseif(isset($_SESSION['edit-user'])){ ?>
                <div class="alert_message error container" style="text-align:center;">
                    <p>
                        <?= $_SESSION['edit-user'];
                            unset($_SESSION['edit-user']);
                        ?>
                        
                    </p>
                </div>
        <?php } ?>

        <?php if(isset($_SESSION['delete-user-success'])) {?>
            <div class="alert_message success container" style="text-align:center;">
                <p>
                    <?= $_SESSION['delete-user-success'];
                        unset($_SESSION['delete-user-success']);
                    ?>
                    
                </p>
            </div>
        <?php }
        elseif(isset($_SESSION['delete-user'])){?>
                <div class="alert_message error container" style="text-align:center;">
                    <p>
                        <?= $_SESSION['delete-user'];
                            unset($_SESSION['delete-user']);
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
                        <a href="./manage-user.php" class="active">
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

                    <?php } ?>
                </ul>
            </aside>
            <main>
                <h2>manage users</h2>
                <?php if((mysqli_num_rows($users)) > 0) {?>
                <table>
                    <thead>
                        <tr>
                            <th>name</th>
                            <th>username</th>
                            <th>edit</th>
                            <th>delete</th>
                            <th>admin</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while($user = mysqli_fetch_assoc($users)){ ?>
                        <tr>
                            <td><?php echo $user['ufname']."\n".$user['ulname']; ?></td>
                            <td><?= $user['uname']; ?></td>
                            <td><a href="<?= ROOT_URL ?>admin/edit-user.php?uid=<?= $user['uid']?>" class="btn sm">edit</a></td>
                            <td><a href="<?= ROOT_URL ?>admin/delete-user.php?uid=<?= $user['uid']?>" class="btn sm danger">delete</a></td>
                            <td><?= $user['is_admin'] ? 'yes' : 'no' ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <?php } else { ?>
                    <div class="alert_message error" style="text-align:center;">
                        <?= "No Users found" ?>
                    </div>
                <?php } ?>
            </main>
        </div>
    </section>


<?php
    include './partials/footer.php';
?>