<?php
    require 'config/database.php';


    if(isset($_POST['submit'])){
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $uname = $_POST['uname'];
        $email = $_POST['email'];
        $pass = $_POST['create_password'];
        $conpass = $_POST['confirm_password'];
        $role = $_POST['user_role'];
        $avatar = $_FILES['avatar'];

        if(!$fname){
            $_SESSION['add-user'] = "please enter first name";
        }
        elseif(!$lname){
            $_SESSION['add-user'] = "please enter last name";
        }
        elseif(!$uname){
            $_SESSION['add-user'] = "please enter user name";
        }
        elseif(!$email){
            $_SESSION['add-user'] = "please enter email";
        }
        elseif(strlen($pass)<8 ||strlen($conpass)<8){
            $_SESSION['add-user'] = "password should be 8+ character";
        }
        else if(!$avatar['name']){
            $_SESSION['add-user'] = "please add avatar";
        }
        else{
            if($pass !== $conpass){
                $_SESSION['add-user'] = "password do not match";
            }

            else{
                $hashed = password_hash($pass, PASSWORD_DEFAULT);

               $add_user = "SELECT * from users where uname='$uname'";
               $add_user_result = mysqli_query($conn, $add_user);

               if(mysqli_num_rows($add_user_result) > 0){
                    $_SESSION['add-user'] = "user already exist";
               }
               else{
                    $avatar_name = $avatar['name'];
                    $avatar_temp = $avatar['tmp_name'];
                    $avatar_destination = '../upload/' . $avatar_name;

                    $allowed_files = ['png', 'jpeg', 'jpg'];
                    $extension = explode('.', $avatar_name);
                    $extension = end($extension);

                    if(in_array($extension, $allowed_files)){
                        move_uploaded_file($avatar_temp, $avatar_destination);
                    }
                    else{
                        $_SESSION['signup'] = "File should be png, jpg, jpeg";
                    }
               }
            }
        }

        if($_SESSION['add-user']){
            $_SESSION['add-user-data'] = $_POST;
            header('location: '. ROOT_URL .'admin/add-user.php');
            die();
        }
        else{
            $insert_query = "INSERT into users (ufname, ulname, uname, uemail, upassword, avatar, is_admin) values('$fname', '$lname', '$uname', 
            '$email', '$hashed', '$avatar_name', '$role')";
    
            $insert_result = mysqli_query($conn, $insert_query);
    
            
            if(!mysqli_errno($conn)){
                $_SESSION['add-user-success'] = "New user $fname $lname added successfully 😀";
                header('location: ' . ROOT_URL . 'admin/manage-user.php');
                die();
            }
    
            else{
    
            }
    
        }
    }

    else{
        header('location: '. ROOT_URL . 'admin/add-user.php');
        die();
    }
?>