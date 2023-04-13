<?php
    require 'config/database.php';

    if(isset($_GET['id'])){
        $id = $_GET['id'];

        $select_query = "SELECT * from category where cid='$id'";
        $select_result = mysqli_query($conn, $select_query);
        $user = mysqli_fetch_assoc($select_result);

        $update_query = "UPDATE posts set category_id=14 where category_id=$id";
        $update_result = mysqli_query($conn, $update_query);

        if(!mysqli_errno($conn)){
            $delete_query = "DELETE from category where cid='$id'";
            $delete_result = mysqli_query($conn, $delete_query);
            $_SESSION['delete-category-success']  ="successfully deleted {$user['ctitle']}";
              
        }
        else{
            $_SESSION['delete-category'] = "couldn't delete {$user['ctitle']}";
        }

    }

    header('location: ' . ROOT_URL . 'admin/manage-category.php');
?>