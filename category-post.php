<?php 
    include 'Partials/header.php';
    if(isset($_GET['cid'])){
        $id = $_GET['cid'];

        $filter_category_query = "SELECT * from posts where category_id='$id'";
        $filter_category_result = mysqli_query($conn, $filter_category_query);

        $category_query = "SELECT * from category where cid='$id'";
        $category_result = mysqli_query($conn, $category_query);
        $category = mysqli_fetch_assoc($category_result);
    }
?>

    <header class="category_title">
        <h2><?= $category['ctitle'] ?></h2>
    </header>

    <!-- post section starts -->

    <section class="posts">
    <?php if(mysqli_num_rows($filter_category_result) > 0){?>
        <div class="container posts_container">
            <?php while($post = mysqli_fetch_assoc($filter_category_result)) {?>
            <article class="post">
                <div class="post_thumbnil">
                    <img src="./upload/<?= $post['thumbnil'] ?>" alt="">
                </div>

                <div class="post_info">
                    <a href="" class="category_button"><?= $category['ctitle'] ?></a>
                    <h3 class="post_title"><a href="./post.php?id=<?= $post['id'] ?>"><?= $post['title'] ?></a></h3>

                    <p class="post_body">
                        <?= substr($post['tbody'], 0, 150) ?>... <small><a href="./post.php?id=<?= $post['id'] ?>"  style="color:coral;">read more</a></small>
                    </p>

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
                </div>
            </article>
            <?php } ?>
        </div>
        <?php } else{?>
            <div class="alert_message error container" style="display:flex; justify-content:center; align-items:center;">
                    <?= "No posts available for" . "\n" . $category['ctitle'] ?>
            </div>
        <?php } ?>
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

<?php 
    include 'Partials/footer.php';
?>