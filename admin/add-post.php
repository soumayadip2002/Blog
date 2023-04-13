<?php
    include 'partials/header.php';
    $query = "SELECT * from category";
    $categories = mysqli_query($conn, $query);

    $title = $_SESSION['add-post-data']['title'] ?? null;
    $body = $_SESSION['add-post-data']['content'] ?? null;

    unset($_SESSION['add-post-data']);



?>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Add Post</h2>
            <?php if(isset($_SESSION['add-post'])) {?>
                <div class="alert_message error">
                    <p>
                        <?= $_SESSION['add-post'];
                            unset($_SESSION['add-post']);
                        ?>
                    </p>
                </div>
            <?php } ?>

            <form action="./add-post-logic.php" enctype="multipart/form-data" method="post">
                <input type="text" value="<?= $title ?>" name="title" placeholder="Title">
                <select name="category">
                    <option value="" selected disabled>Select Category</option>
                    <?php while($user = mysqli_fetch_assoc($categories)){?>
                    <option value="<?php echo $user['cid'] ?>">
                        <?php echo $user['ctitle'] ?>
                    </option>
                    <?php }?>
                </select>
                <textarea rows="10" name="content" id="myTextarea" placeholder="body"><?= $body?></textarea>
                <?php if(isset($_SESSION['user_is_admin'])) {?>
                <div class="form_control inline">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                    <label for="is_featured" >featured</label>
                </div>
                <?php } ?>

                <div class="form_control">
                    <label for="thumbnail">add thumbnail</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">Add post</button>
            </form>
        </div>
    </section>
    <script src="../tinymce/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
    selector: '#myTextarea',
    plugins: 'preview importcss searchreplace autolink autosave save directionality code visualblocks visualchars fullscreen image link media template codesample table charmap pagebreak nonbreaking anchor insertdatetime advlist lists wordcount help charmap quickbars emoticons',
    menubar: 'file edit view insert format tools table help',
    toolbar: 'undo redo | bold italic underline strikethrough | fontfamily fontsize blocks | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist | forecolor backcolor removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media template link anchor codesample | ltr rtl',
    toolbar_sticky: true,
    autosave_ask_before_unload: true,
    autosave_interval: '30s',
    autosave_prefix: '{path}{query}-{id}-',
    autosave_restore_when_empty: false,
    autosave_retention: '2m',
    image_advtab: true,
    link_list: [{
        title: 'My page 1',
        value: 'https://www.codexworld.com'
    }, {
        title: 'My page 2',
        value: 'http://www.codexqa.com'
    }],
    image_list: [{
        title: 'My page 1',
        value: 'https://www.codexworld.com'
    }, {
        title: 'My page 2',
        value: 'http://www.codexqa.com'
    }],
    image_class_list: [{
        title: 'None',
        value: ''
    }, {
        title: 'Some class',
        value: 'class-name'
    }],
    importcss_append: true,
    file_picker_callback: (callback, value, meta) => {
        /* Provide file and text for the link dialog */
        if (meta.filetype === 'file') {
            callback('https://www.google.com/logos/google.jpg', {
                text: 'My text'
            });
        }

        /* Provide image and alt text for the image dialog */
        if (meta.filetype === 'image') {
            callback('https://www.google.com/logos/google.jpg', {
                alt: 'My alt text'
            });
        }

        /* Provide alternative source and posted for the media dialog */
        if (meta.filetype === 'media') {
            callback('movie.mp4', {
                source2: 'alt.ogg',
                poster: 'https://www.google.com/logos/google.jpg'
            });
        }
    },
    templates: [{
        title: 'New Table',
        description: 'creates a new table',
        content: '<div class="mceTmpl"><table width="98%%"  border="0" cellspacing="0" cellpadding="0"><tr><th scope="col"> </th><th scope="col"> </th></tr><tr><td> </td><td> </td></tr></table></div>'
    }, {
        title: 'Starting my story',
        description: 'A cure for writers block',
        content: 'Once upon a time...'
    }, {
        title: 'New list with dates',
        description: 'New List with dates',
        content: '<div class="mceTmpl"><span class="cdate">cdate</span><br><span class="mdate">mdate</span><h2>My List</h2><ul><li></li><li></li></ul></div>'
    }],
    template_cdate_format: '[Date Created (CDATE): %m/%d/%Y : %H:%M:%S]',
    template_mdate_format: '[Date Modified (MDATE): %m/%d/%Y : %H:%M:%S]',
    height: 400,
    image_caption: true,
    quickbars_selection_toolbar: 'bold italic | quicklink h2 h3 blockquote quickimage quicktable',
    noneditable_class: 'mceNonEditable',
    toolbar_mode: 'sliding',
    contextmenu: 'link image table',
    content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
});
    </script>

<?php
include './partials/footer.php';
?>