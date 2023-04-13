<?php
    require 'config/database.php';
    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $previous_thumbnail_name = $_POST['previous_thumbnail_name'];
        $title = $_POST['title'];
        $category = $_POST['category'];
        $content = $_POST['body'];
        $featured = $_POST['is_featured'];
        $thumbnail = $_FILES['thumbnail'];


        $featured = $featured == 1 ?: 0;


        if(!$title){
            $_SESSION['post-edit'] = "Invalid form data";
        }
        elseif(!$category){
            $_SESSION['post-edit'] = "Invalid form data";
        }
        elseif(!$content){
            $_SESSION['post-edit'] = "Invalid form data";
        }
        else{
            if($thumbnail['name']){
                $previous_thumbnail_path = '../upload/' . $previous_thumbnail_name;

                if($previous_thumbnail_path){
                    unlink($previous_thumbnail_path);
                }

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
                    $_SESSION['post-edit'] = "file should be png, jpg, jpeg";
                }
            }


        }

        if(($_SESSION['post-edit'])){
            header('location: ' . ROOT_URL . 'admin/');
            die();
        }
        else{
            if($featured == 1){
                $featured_query = "UPDATE posts set is_featured=0";
                $featured_result = mysqli_query($conn, $featured_query);
            }

            $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;
            $query = "UPDATE posts set title='$title', tbody='$content', thumbnil='$thumbnail_to_insert', category_id=$category, is_featured=$featured where id=$id limit 1";

            $result = mysqli_query($conn, $query);

        }
        
        if(!mysqli_errno($conn)){
            $_SESSION['post-edit-success'] = "post $title updated successfully";
        }

    }
    
    header('location: ' .ROOT_URL . 'admin/');
    die();
?>

