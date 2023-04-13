<?php
    require 'config/database.php';
    if(isset($_POST['submit'])){

        $author_id = $_SESSION['user-id'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $content = $_POST['content'];
        $is_featured = $_POST['is_featured'];
        $thumbnail = $_FILES['thumbnail'];


        $is_featured = $is_featured == 1 ?: 0;


        if(!$title){
            $_SESSION['add-post'] = "enter title";
        }
        elseif(!$content){
            $_SESSION['add-post'] = "enter content";
        }
        elseif(!$category){
            $_SESSION['add-post'] = "select category";
        }
        elseif(!$thumbnail['name']){
            $_SESSION['add-post'] = "enter thumbnail";
        }
        else{
            $thumbnail_name = $thumbnail['name'];
            $thumbnail_temp = $thumbnail['tmp_name'];
            $thumbnail_path = '../upload/' . $thumbnail_name;
            

            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);


            if(in_array($extension, $allowed_files)){
                move_uploaded_file($thumbnail_temp, $thumbnail_path);
            }
            else{
                $_SESSION['add-post'] = "file should be png, jpg, jpeg";
            }
        }

        if(isset($_SESSION['add-post'])){
            $_SESSION['add-post-data'] = $_POST;
            header('loaction: ' . ROOT_URL . 'admin/add-post.php');
            die();
        }
        else{
            if($is_featured == 1){
                $featured_query = "UPDATE posts set is_featured=0";
                $featured_result = mysqli_query($conn, $featured_query);
            }

            $query = "INSERT INTO posts (title, tbody, thumbnil, category_id, author_id, is_featured) VALUES ('$title', '$content', '$thumbnail_name', $category, $author_id, $is_featured)";

            
            $result = mysqli_query($conn, $query);

            if(!mysqli_errno($conn)){
                $_SESSION['add-post-success'] = "New post $title created successfully";
                header('location: ' . ROOT_URL . 'admin/');
                die();
            }
            else{
                $_SESSION['add-post'] = "post couldn't create";
                header('location: ' . ROOT_URL . 'admin/add-post.php');
                die();
            }
        }


    }
    
    // header('location: ' .ROOT_URL . 'admin/add-post.php');
    // die();
?>

