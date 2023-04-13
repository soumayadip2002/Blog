<?php
    include './partials/header.php';
    $category_post_query = "SELECT * from category";
    $category_post_result = mysqli_query($conn, $category_post_query);

    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $edit_post_query = "SELECT * from posts where id='$id'";
        $edit_post_result = mysqli_query($conn, $edit_post_query);
        $post_result = mysqli_fetch_assoc($edit_post_result);

    }
?>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>edit Post</h2>
            <form action="./edit-post-logic.php" enctype="multipart/form-data" method="post">
                <input type="hidden" value="<?= $post_result['id'] ?>" name="id">
                <input type="hidden" value="<?= $post_result['thumbnil'] ?>" name="previous_thumbnail_name">
                <input type="text" value="<?= $post_result['title'] ?>" name="title" placeholder="Title">
                <select name="category">
                    <?php while($category = mysqli_fetch_assoc($category_post_result)) {?>
                    <option value="<?= $category['cid'] ?>"><?= $category['ctitle'] ?></option>
                    <?php } ?>
                </select>
                <textarea rows="15" placeholder="body" id="myTextarea" name="body"><?= $post_result['tbody'] ?></textarea>
                <div class="form_control inline">
                    <input type="checkbox"  name="is_featured" value="1" id="is_featured" checked>
                    <label for="is_featured">featured</label>
                </div>

                <div class="form_control">
                    <label for="thumbnail">change thumbnil</label>
                    <input type="file" name="thumbnail" id="thumbnail">
                </div>
                <button type="submit" name="submit" class="btn">update post</button>
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