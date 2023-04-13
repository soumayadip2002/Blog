<?php 
    include 'partials/header.php';

    $title = $_SESSION['category-add-data']['title'] ?? null;
    $description = $_SESSION['category-add-data']['description'] ?? null;

    unset($_SESSION['category-add-data']);
?>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Category</h2>
            <?php if(isset($_SESSION['category-add'])){ ?>
            <div class="alert_message error">
                <p>
                    <?= $_SESSION['category-add'];
                        unset($_SESSION['category-add']);
                    ?>
                </p>
            </div>
            <?php } ?>
            <form action="./add-category-logic.php" method="post">
                <input type="text" name="title" value="<?= $title ?>" placeholder="Title">
                <textarea rows="4" name="description"placeholder="description"><?= $description ?></textarea>
                <button type="submit" name="submit" class="btn">Add category</button>
            </form>
        </div>
    </section>

<?php
    include './partials/footer.php';
?>