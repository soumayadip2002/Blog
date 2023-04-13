<?php
    include './partials/header.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $query = "SELECT * from category where cid='$id'";
        $result = mysqli_query($conn, $query);
        
        if((mysqli_num_rows($result)==1)){
            $user = mysqli_fetch_assoc($result);
        }
    }
    else{
        header('location: ' . ROOT_URL . 'admin/manage-category.php');
        die();
    }
?>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>edit Category</h2>

            <form action="./edit-category-logic.php" method="post">
                <input type="hidden" value="<?= $user['cid'] ?>" name="id">
                <input type="text" value="<?= $user['ctitle'] ?>" name="title" placeholder="Title">
                <textarea rows="4" name="description" placeholder="description"><?= $user['cdescription'] ?></textarea>
                <button type="submit" name="submit" class="btn">update category</button>
            </form>
        </div>
    </section>

<?php
    include '../Partials/footer.php';
?>