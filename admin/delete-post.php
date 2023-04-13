<?php 
    require 'config/database.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $select_post = "SELECT * from posts where id=$id";
        $select_result = mysqli_query($conn, $select_post);
        

        if(mysqli_num_rows($select_result)==1){
            $user_select = mysqli_fetch_assoc($select_result);
            $thumbnail_name = $user_select['thumbnil'];
            $thumbnail_path = '../upload/' . $thumbnail_name;

            if($thumbnail_name){
                unlink($thumbnail_path);
            }
        }
        $delete_post_query = "DELETE from posts where id=$id";
        $delete_post_success = mysqli_query($conn, $delete_post_query);

        if(!mysqli_errno($conn)){
            $_SESSION['delete-post-success'] = "{$user_select['title']} is deleted successfully successfully";
        }
        else{
            $_SESSION['delete-post'] = "{$user_select['title']} is couldn't delete";
        }
    }

    header('location: ' . ROOT_URL . 'admin/');
    die();
?>