<?php
require 'config/database.php';

if(isset($_POST['usubmit'])){
    $firstname = $_POST['ufname'];
    $lastname = $_POST['ulname'];
    $username = $_POST['uname'];
    $uemail = $_POST['uemail'];
    $upassword = $_POST['upassword'];
    $ucpassword = $_POST['ucpassword'];
    $avatar = $_FILES['avatar'];
    
    if(!$firstname){
        $_SESSION['signup'] = "please enter your first name";
    }
    elseif(!$lastname){
        $_SESSION['signup'] = "please enter your last name";
    }
    elseif(!$username){
        $_SESSION['signup'] = "please enter your user name";
    }
    elseif(!$uemail){
        $_SESSION['signup'] = "please enter your email";
    }
    elseif(strlen($upassword)<8 ||strlen($ucpassword)<8){
        $_SESSION['signup'] = "password should be 8+ character";
    }
    else if(!$avatar['name']){
        $_SESSION['signup'] = "please add avatar";
    }else{
        if($upassword !==$ucpassword){
            $_SESSION['signup'] = "Password do not match";
        }
        else{
            $hashed_password = password_hash($upassword, PASSWORD_DEFAULT);

            $user_check = "SELECT * from users where uname='$username' or uemail='$uemail'";

            $result = mysqli_query($conn, $user_check);

            if(mysqli_num_rows($result)>0){
                $_SESSION['signup'] = "Username or email already exist";
            }
            else{
                
                $avatar_name = $avatar['name'];
                $avatar_temp = $avatar['tmp_name'];
                $avatar_destination = 'upload/' . $avatar_name;

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

    if($_SESSION['signup']){
        $_SESSION['signup-data'] = $_POST;
        header('location: '. ROOT_URL .'signup.php');
        die();
    }
    else{
        $insert_query = "INSERT into users (ufname, ulname, uname, uemail, upassword, avatar, is_admin) values('$firstname', '$lastname', '$username', 
        '$uemail', '$hashed_password', '$avatar_name', 0)";

        $insert_result = mysqli_query($conn, $insert_query);

        
        if(!mysqli_errno($conn)){
            $_SESSION['signup-success'] = "Registration successfull 😀";
            header('location: ' . ROOT_URL . 'signin.php');
            die();
        }

        else{

        }

    }


}
else{
    header('location: '. ROOT_URL . 'signup.php');
    die();
}

?>