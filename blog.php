<?php
    include 'Partials/header.php';
    $featured_query = "SELECT * from posts where is_featured=1";
    $featured_result = mysqli_query($conn, $featured_query);
    $featured = mysqli_fetch_assoc($featured_result);

    $post_query = "SELECT * from posts";
    $post_result = mysqli_query($conn, $post_query);
?>

    <!-- search bar starts  -->

    <section class="search_br">
        <form action="./search.php" method="get" class="container search_bar-container">
            <div>
                <i class="uil uil-search"></i>
                <input type="search" name="search" placeholder="search" id="">
            </div>

            <button type="submit" name="submit" class="btn">go</button>
        </form>
    </section>

    <!-- search bar ends -->

    <section class="posts">
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

                    <p class="post_body">
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