<?php 
    require 'config/database.php';

    if(isset($_GET['uid'])){
        $id = $_GET['uid'];

        $query = "SELECT * from users where uid='$id'";
        $result = mysqli_query($conn, $query);
        $user = mysqli_fetch_assoc($result);

        if(mysqli_num_rows($result)==1){
            $avatar_name = $user['avatar'];
            $avatar_path = '../upload/' . $avatar_name;

            if($avatar_path){
                unlink($avatar_path);
            }

        }

        $thumbnail_query = "SELECT thumbnil from posts where author_id=$id";
        $thumbnil_result = mysqli_query($conn, $thumbnail_query);

        if(mysqli_num_rows($thumbnil_result)>0){
            while($thumbnail = mysqli_fetch_assoc($thumbnil_result)){
                $thumbnail_path = '../upload/' . $thumbnail['thumbnil'];

                if($thumbnail_path){
                    unlink($thumbnail_path);
                }
            }
        }

        $delete_query = "DELETE from users where uid='$id'";
        $delete_result = mysqli_query($conn, $delete_query);
        if(mysqli_errno($conn)){
            $_SESSION['delete-user'] = "couldn't delete user {$user['ufname']} {$user['ulname']}";
        }
        else{
            $_SESSION['delete-user-success'] = "user {$user['ufname']} {$user['ulname']} is successfully deleted";
        }
    }

    header('location: '. ROOT_URL .'admin/manage-user.php');
?>