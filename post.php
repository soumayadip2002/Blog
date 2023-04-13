<?php 
    include 'Partials/header.php';
    if(isset($_GET['pid'])){
        $id = $_GET['pid'];

        $post_query = "SELECT * from posts where id='$id'";
        $post_result = mysqli_query($conn, $post_query);
        $post = mysqli_fetch_assoc($post_result);

    }
?>


    <!-- post section starts  -->

    <section class="signlepost">
        <div class="container singlepost_container">
            <h2><?= $post['title'] ?></h2>
            <div class="post_author">
                <?php 
                    $author_id = $post['author_id'];
                    $author_query = "SELECT * from users where uid='$author_id'";
                    $author_result = mysqli_query($conn, $author_query);
                    $author = mysqli_fetch_assoc($author_result);
                ?>
                <div class="post_author-avatar">
                    <img src="./upload/<?= $author['avatar'] ?>" alt="">
                </div>
                <div class="post_author-info">
                    <h5>by: <?= $author['ufname'] . "\n" . $author['ulname'] ?></h5>
                    <small><?= date("M d Y - h:i", strtotime($post['date_time'])) ?></small>
                </div>
            </div>

            <div class="singlepost_thumbnil">
                <img src="./upload/<?= $post['thumbnil'] ?>" alt="">
            </div>
            <p>
                <?= $post['tbody'] ?>
            </p>
        </div>
    </section>
    <!-- post section ends -->

    <section class="form_section" id="contact">
        <h2>send your thoughts</h2>
        <div class="container form_section-container">
        <?php if(isset($_SESSION['send-details-success'])){ ?>
            <div class="alert_message success container" style="text-align:center;">
                <p>
                    <?= $_SESSION['send-details-success'];
                        unset($_SESSION['send-details-success']);
                    ?>
                    
                </p>
            </div>
        <?php } ?>
            <form action="./contact.php" method="post">
                <input type="text" name="name" id="" placeholder="Enter Name...">
                <input type="email" name="email" id="" placeholder="Enter Email...">
                <textarea name="message" id="" cols="30" rows="10" placeholder="say hello...."></textarea>
                <input type="submit" class="btn" value="send" name="submit">
            </form>
        </div>
    </section>

<?php 
    include 'Partials/footer.php';
?>