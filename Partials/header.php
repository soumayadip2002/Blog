<?php 
    require 'config/database.php';
    if(isset($_SESSION['user-id'])){
        $id = $_SESSION['user-id'];
        $query = "SELECT avatar from users where uid='$id'";
        $result = mysqli_query($conn, $query);
        $avatar = mysqli_fetch_assoc($result);
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>The Thought Box</title>
    <link rel="stylesheet" href="./CSS/style.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <!-- start of navbar -->
    <nav>
        <div class="container nav_container">
            <a href="<?php echo ROOT_URL ?>" class="nav_logo">home</a>

            <ul class="nav_items">
                <li><a href="<?php echo ROOT_URL ?>./blog.php">Blog</a></li>
                <li><a href="<?php echo ROOT_URL ?>./about.php">about</a></li>
                <li><a href="<?php echo ROOT_URL ?>./service.php">services</a></li>
                <li><a href="#contact">contact</a></li>
                <?php if(isset($_SESSION['user-id'])){ ?>
                    <li class="nav_profile">
                    <div class="avatar">
                        <img src="<?=ROOT_URL . 'upload/' . $avatar['avatar']?>" alt="">
                    </div>
                    <ul>
                        <?php if(isset($_SESSION['user_is_admin'])){?>
                        <li><a href="./admin/">dashboard</a></li>
                        <?php } ?>
                        <li><a href="./logout.php">logout</a></li>
                    </ul>
                </li>
                <?php } else{ ?>
                <li><a href="./signin.php">sign in</a></li>
                <?php } ?>

            </ul>

            <button id="open_nav-btn"><i class="fa-sharp fa-solid fa-bars"></i></button>
            <button id="close_nav-btn"><i class="uil uil-times"></i></button>
        </div>
    </nav>

    <!-- close of navbar -->