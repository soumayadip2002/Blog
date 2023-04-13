<?php
    require 'config/database.php';

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $description = $_POST['description'];

        if(!$title){
            $_SESSION['category-add'] = "please enter title";
        }
        elseif(!$description){
            $_SESSION['category-add'] = "please enter description";
        }
        else{
            $query = "SELECT * from category where ctitle='$title'";
            $result = mysqli_query($conn, $query);
            if(mysqli_num_rows($result)>0){
                $_SESSION['category-add'] = "Category already existed";
            } 
        }

        if($_SESSION['category-add']){
            $_SESSION['category-add-data'] = $_POST;
            header('location: ' . ROOT_URL . 'admin/add-category.php');
            die();
            
        }
        else{
            $insert_category = "INSERT into category (ctitle, cdescription) values ('$title', '$description')";
            $insert_result = mysqli_query($conn, $insert_category);

            if(!mysqli_errno($conn)){
                $_SESSION['category-add-success'] = "New category $title added successfully";
                header('location: ' . ROOT_URL . 'admin/manage-category.php');
                die();
            }
            else{
                $_SESSION['category-add'] = "New category $title couldn't add";
                header('location: ' . ROOT_URL . 'admin/add-category.php');
                die();
            }
        }
    }
    else{
        header('location: ' . ROOT_URL . 'admin/add-category.php');
        die();   
    }

?>