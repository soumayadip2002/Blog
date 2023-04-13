<?php
require './config/database.php';

if(isset($_POST['user_submit'])){
    $user_name = $_POST['user_name'];
    $user_password = $_POST['user_password'];

    if(!$user_name){
        $_SESSION['signin'] = "Username required";
    }
    elseif(!$user_password){
        $_SESSION['signin'] = "password required";
    }
    else{
        $fetch_data = "SELECT * from users where uname='$user_name'";

        $fetch_result = mysqli_query($conn, $fetch_data);

        if(mysqli_num_rows($fetch_result)==1){
            $user_record = mysqli_fetch_assoc($fetch_result);
            $db_password = $user_record['upassword'];

            if(password_verify($user_password, $db_password)){
                $_SESSION['user-id'] = $user_record['uid'];

                if($user_record['is_admin']==1){
                    $_SESSION['user_is_admin'] = true;
                }

                header('location: ' .ROOT_URL . 'index.php');
            }
            else{
                $_SESSION['signin'] = "please check your input";
            }

        }
        else{
            $_SESSION['signin'] = "user not found";
        }

       
    }

    if(isset($_SESSION['signin'])){
        $_SESSION['signin-data'] = $_POST;
        header('location: ' . ROOT_URL . 'signin.php');
        die();
    }
}

else{
    header('location: ' . ROOT_URL . 'signin.php');
    die();
}

?>