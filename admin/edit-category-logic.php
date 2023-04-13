<?php 

    require 'config/database.php';

    if(isset($_POST['submit'])){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        
        if(!$title || !$description){
            $_SESSION['edit-category'] = "invalid form input on edit page";
        }
        else{
            $update_query = "UPDATE category set ctitle='$title', cdescription='$description' where cid='$id'";
            $update_result = mysqli_query($conn, $update_query);

            if(mysqli_errno($conn)){
                $_SESSION['edit-category'] = "Failed to update $title";
            }
            else{
                $_SESSION['edit-category-success'] = "$title successfully updated";
            }
        }
    }

    header('location: ' . ROOT_URL . 'admin/manage-category.php');

?>