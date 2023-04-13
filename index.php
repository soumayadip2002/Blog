<?php
    include 'Partials/header.php';

    $featured_query = "SELECT * from posts where is_featured=1";
    $featured_result = mysqli_query($conn, $featured_query);
    $featured = mysqli_fetch_assoc($featured_result);

    $post_query = "SELECT * from posts";
    $post_result = mysqli_query($conn, $post_query);
?>

    <!-- featured section starts -->
    <?php if(mysqli_num_rows($featured_result)==1) {?>
    <section class="featured">
        <div class="container featured_container">
            <div class="post_thumbnil" style="border-top-left-radius: 5rem; border-bottom-right-radius:5rem; border: 1rem solid var(--color-gray-900);
    overflow: hidden;">
                <img src="./upload/<?= $featured['thumbnil'] ?>" alt="">
            </div>

            <div class="post_info">
                <?php
                    $category_id = $featured['category_id'];
                    $category_query_featured = "SELECT * from category where cid='$category_id'";
                    $category_result_featured = mysqli_query($conn, $category_query_featured);
                    $category = mysqli_fetch_assoc($category_result_featured);
                ?>
                <a href="./category-post.php?cid=<?= $category['cid']?>" class="category_button"><?= $category['ctitle'] ?></a>
                <h2 class="post_title"><a href="./post.php?pid=<?= $featured['id'] ?>"><?= $featured['title'] ?></a></h2>
                <p class="post_body">
                    <?= substr($featured['tbody'], 0, 300) ?>... <small><a href="./post.php?pid=<?= $featured['id'] ?>"  style="color:coral;">read more</a></small>
                </p>
                <div class="post_author">
                    <?php
                        $author_id = $featured['author_id'];
                        $author_query = "SELECT * from users where uid=$author_id";
                        $author_result = mysqli_query($conn, $author_query);
                        $author = mysqli_fetch_assoc($author_result);
                    ?>
                    <div class="post_author-avatar">
                        <img src="./upload/<?= $author['avatar'] ?>" alt="">
                    </div>

                    <div class="post_author-info">
                        <h5>by: <?= $author['ufname'] . "\n" . $author['ulname'] ?></h5>
                        <small><?= date("M d Y - h:i", strtotime($featured['date_time'])) ?></small>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php }?>
    <!-- featured section ends -->

    <!-- post section starts -->

    <section class="posts <?= $featured ? '' : 'section-extra-margin' ?>">
        <div class="container posts_container">
            <?php while($post = mysqli_fetch_assoc($post_result)) {?>
            <article class="post">
                <div class="post_thumbnil">
                    <img src="./upload/<?= $post['thumbnil'] ?>" alt="">
                </div>

                <div class="post_info">
                    <?php 
                        $category_id_id = $post['category_id'];
                        $category_query_query = "SELECT * from category where cid='$category_id_id'";
                        $category_result_result = mysqli_query($conn, $category_query_query);
                        $category_post = mysqli_fetch_assoc($category_result_result);

                    ?>
                    <a href="./category-post.php?cid=<?= $category_post['cid'] ?>" class="category_button"><?= $category_post['ctitle'] ?></a>
                    <h3 class="post_title"><a href="./post.php?pid=<?= $post['id'] ?>"><?= $post['title'] ?></a></h3>

                    <p class="post_body" style="text-align: justify;">
                        <?= substr(($post['tbody']), 0, 150) ?>...<small><a href="./post.php?pid=<?= $post['id'] ?>"  style="color:coral;">read more</a></small>
                    </p>

                    <div class="post_author">
                        <?php
                            $post_author_id = $post['author_id'];
                            $post_author_query = "SELECT * from users where uid='$post_author_id'";
                            $post_author_result = mysqli_query($conn, $post_author_query);
                            $post_author = mysqli_fetch_assoc($post_author_result);
                        ?>
                        <div class="post_author-avatar">
                            <img src="./upload/<?= $post_author['avatar'] ?>" alt="">
                        </div>
                        <div class="post_author-info">
                            <h5>by: <?= $post_author['ufname'] . "\n" . $post_author['ulname'] ?></h5>
                            <small><?=date("M d Y - h:i", strtotime($post['date_time'])) ?></small>
                        </div>
                    </div>
                </div>
            </article>

            <?php }?>
        </div>
    </section>


    <!-- post section ends -->

    <!-- category section starts  -->
    <section class="category_buttons">
        <div class="container category_buttons-container">
            <?php
                $category_query = "SELECT * from category order by ctitle";
                $category_result = mysqli_query($conn, $category_query);
            ?>
            <?php while($user = mysqli_fetch_assoc($category_result)) {?>
            <a href="./category-post.php?cid=<?= $user['cid'] ?>" class="category_button"><?php echo $user['ctitle']; ?></a>
            <?php } ?>
        </div>
    </section>

     <!-- category section ends -->

    <!-- contact section starts -->

    <section class="form_section" id="contact">
        <h2>Contact us</h2>
        <div class="container form_section-container">
        <?php if(isset($_SESSION['send-details-success'])){ ?>
            <div class="alert_message success container" style="text-align:center;">
                <p>
                    <?= $_SESSION['send-details-success'];
                        unset($_SESSION['send-details-success']);
                    ?>
                    
                </p>
            </div>
        <?php } elseif(isset($_SESSION['send-details'])){?>
            <div class="alert_message error container" style="text-align:center;">
                <p>
                    <?= $_SESSION['send-details'];
                        unset($_SESSION['send-details']);
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

   <!-- contact section ends -->

<?php 
    include 'Partials/footer.php';
?>