<?php 
    include './partials/header.php';

    if(isset($_GET['uid'])){
        $id = $_GET['uid'];
        $query = "SELECT * from users where uid='$id'";

        $result = mysqli_query($conn, $query);

        $user = mysqli_fetch_assoc($result);

    }

?>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>edit user</h2>
            <form action="./edit-user-logic.php" enctype="multipart/form-data" method="post">
                <input type="hidden" value="<?= $user['uid'] ?>" name="uid">
                <input type="hidden" value="<?= $user['avatar'] ?>" name="previous_avatar_name">
                <input type="text" value="<?= $user['ufname'] ?>" name="fname" placeholder="first name">
                <input type="text" value="<?= $user['ulname'] ?>"  name="lname" placeholder="last name">
                <select name="role">
                    <option value="0">author</option>
                    <option value="1">admin</option>
                </select>
                <div class="form_control">
                    <label for="avatar">update avatar</label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="submit" class="btn">update user</button>
            </form>
        </div>
    </section>

<?php
    include './partials/footer.php';
?>