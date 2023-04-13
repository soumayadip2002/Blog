<?php 
    include 'partials/header.php';

    $fname = $_SESSION['add-user-data']['fname'] ?? null;
    $lname = $_SESSION['add-user-data']['lname'] ?? null;
    $uname = $_SESSION['add-user-data']['uname'] ?? null;
    $email = $_SESSION['add-user-data']['email'] ?? null;
    $pass = $_SESSION['add-user-data']['pass'] ?? null;
    $conpass = $_SESSION['add-user-data']['conpass'] ?? null;
    $role = $_SESSION['add-user-data']['role'] ?? null;

    unset($_SESSION['add-user-data']);
?>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add user</h2>
            <?php 
               if(isset($_SESSION['add-user'])) {?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['add-user'];
                        unset($_SESSION['add-user']);
                    ?>
                </p>
            </div>

            <?php } ?>

            <form action="./add-user-logic.php" method="post" enctype="multipart/form-data">
                <input type="text" name="fname" value="<?= $fname ?>" placeholder="first name">
                <input type="text" name="lname" value="<?= $lname ?>" placeholder="last name">
                <input type="text" name="uname" value="<?= $uname ?>" placeholder="user name">
                <input type="email" name="email" value="<?= $email ?>" placeholder="email">
                <input type="password" name="create_password" value="<?= $pass ?>" placeholder="create password">
                <input type="password" name="confirm_password" value="<?= $conpass ?>" placeholder="confirm password">
                <select name="user_role" value="<?= $role ?>">
                    <option value="0">author</option>
                    <option value="1">admin</option>
                </select>

                <div class="form_control">
                    <label for="avatar">add avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">Add user</button>
            </form>
        </div>
    </section>

<?php
    include './partials/footer.php';
?>