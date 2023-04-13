<?php
    require 'config/database.php';

    if(isset($_POST['submit'])){
        $id = $_POST['uid'];
        $previous_avatar_name = $_POST['previous_avatar_name'];
        $first_name = $_POST['fname'];
        $last_name = $_POST['lname'];
        $role = $_POST['role'];
        $avatar = $_FILES['avatar'];

        if(!$first_name || !$last_name){
            $_SESSION['edit-user'] = "Invalid  form input on edit page";
        }
        else{
            if($avatar['name']){
                $previous_avatar_path = '../upload/' . $previous_avatar_name;

                if($previous_avatar_path){
                    unlink($previous_avatar_path);
                }

                $avatar_name = $avatar['name'];
                $avatar_temp = $avatar['tmp_name'];
                $avatar_path = '../upload/' . $avatar_name;
                
    
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extension = explode('.', $avatar_name);
                $extension = end($extension);
    
    
                if(in_array($extension, $allowed_files)){
                    move_uploaded_file($avatar_temp, $avatar_path);
                }
                else{
                    $_SESSION['edit-user'] = "file should be png, jpg, jpeg";
                }
            }

        }

        if(isset($_SESSION['edit-user'])){
            header('location: ' . ROOT_URL . 'admin/edit-user.php');
            die();
        }
        else{

            $avatar_to_insert = $avatar_name ?? $previous_avatar_name;
            $query = "UPDATE users set ufname='$first_name', ulname='$last_name', avatar='$avatar_to_insert' , is_admin='$role' where uid=$id limit 1";
            $result = mysqli_query($conn, $query);
    
            if(mysqli_errno($conn)){
                $_SESSION['edit-user'] = "Failed to update user";
            }
            else{
                $_SESSION['edit-user-success'] = "User $first_name $last_name updated successfully";
            }
        }


        
    }

    header('location: ' . ROOT_URL . 'admin/manage-user.php');
?>