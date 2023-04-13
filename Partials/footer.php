 <!-- footer section starts  -->
 <footer>
        <div class="footer_socials">
            <a href="#" target="blank"><i class="uil uil-youtube"></i></a>
            <a href="#" target="blank"><i class="uil uil-facebook-f"></i></a>
            <a href="#" target="blank"><i class="uil uil-linkedin"></i></a>
            <a href="#" target="blank"><i class="uil uil-instagram"></i></a>
            <a href="#" target="blank"><i class="uil uil-twitter"></i></a>

        </div>

        <div class="container footer_container">
            <article>
                <h4>categories</h4>
                <ul>
                    <?php
                        $category_query = "SELECT * from category order by ctitle";
                        $category_result = mysqli_query($conn, $category_query);
                    ?>
                    <?php while($user = mysqli_fetch_assoc($category_result)) {?>
                        <li>
                        <a href="./category-post.php?cid=<?= $user['cid'] ?>"><?php echo $user['ctitle']; ?></a>
                    <?php } ?>
                        </li>

                </ul>

            </article>

            <article>
                <h4>support</h4>
                <ul>
                    <li><a href="">+123 456 7890</a></li>
                    <li><a href="">+999 999 999 9990</a></li>
                    <li><a href="">sahababu@gmail.com</a></li>
                    <li><a href="">tutorials@gmail.com</a></li>
                    <li><a href="">Hasnabad, North 24 parganas, west bengal</a></li>
                </ul>

            </article>

            <article>
                <h4>Blog</h4>
                <ul>
                    <li><a href="">safty</a></li>
                    <li><a href="">repair</a></li>
                    <li><a href="">recent</a></li>
                    <li><a href="">popular</a></li>
                    <li><a href="">categories</a></li>
                </ul>
            </article>


            <article>
                <h4>permalinks</h4>
                <ul>
                    <li><a href="./index.php">home</a></li>
                    <li><a href="./blog.php">blog</a></li>
                    <li><a href="./about.php">about</a></li>
                    <li><a href="./service.php">services</a></li>
                    <li><a href="./contact.php">contact</a></li>
                </ul>
            </article>
        </div>
        <div class="footer_copyright">
            <small>copyright &copy;soumayadip saha</small>
        </div>
    </footer>


    <!-- footer scetion ends  -->



    <script src="./JS/script.js"></script>
</body>

</html>