<?php
    require 'config/database.php';

    if(isset($_POST['submit'])){
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];

        if(!$name){
            $_SESSION['send-details'] = "Enter name";
        }
        elseif(!$email){
            $_SESSION['send-details'] = 'Enter email';
        }
        elseif(!$message){
            $_SESSION['send-details'] = 'Enter message';
        }
        

        if(isset($_SESSION['send-details'])){
            header('location: ' . ROOT_URL . 'index.php');
            die();
        }
        else{
            $send_query = "INSERT into contact (Name, Email, Message) values ('$name', '$email', '$message')";
            $send_result = mysqli_query($conn, $send_query);

            if(!mysqli_errno($conn)){
                $_SESSION['send-details-success'] = "Thank you for your Response 🙂";
            }
        }
    }
    header('location: ' .ROOT_URL . 'index.php');
?>