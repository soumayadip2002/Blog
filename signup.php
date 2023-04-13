<?php
    require './config/constants.php';
    $firstname = $_SESSION['signup-data']['firstname'] ?? null;
    $lastname = $_SESSION['signup-data']['lastname'] ?? null;
    $username = $_SESSION['signup-data']['username'] ?? null;
    $uemail = $_SESSION['signup-data']['uemail'] ?? null;
    $upassword = $_SESSION['signup-data']['upassword'] ?? null;
    $ucpassword = $_SESSION['signup-data']['ucpassword'] ?? null;

    unset($_SESSION['signup-data']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bloging Website</title>
    <link rel="stylesheet" href="./CSS/style.css">

    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body>
    <section class="form_section">
        <div class="container form_section-container">
            <h2>sign up</h2>

            <?php
                if(isset($_SESSION['signup'])){ ?>
                <div class="alert_message error">
                    <p>
                        <?= $_SESSION['signup'];
                            unset($_SESSION['signup']);
                        ?>
                    </p>
                    
                </div>
            
            <?php } ?>
            

            <form action="signup-logic.php" method="post" enctype="multipart/form-data">
                <input type="text" name="ufname" value="<?= $firstname ?>" placeholder="first name">
                <input type="text" name="ulname" value="<?= $lastname ?>" placeholder="last name">
                <input type="text" name="uname" value="<?= $username ?>" placeholder="user name">
                <input type="email" name="uemail" value="<?= $uemail ?>" placeholder="email">
                <input type="password" name="upassword" value="<?= $upassword ?>" placeholder="create password">
                <input type="password" name="ucpassword" value="<?= $ucpassword ?>" placeholder="confirm password">

                <div class="form_control">
                    <label for="avatar"></label>
                    <input type="file" name="avatar" id="avatar">
                </div>
                <button type="submit" name="usubmit" class="btn">sign up</button>

                <small>already have an account ? <a href="./signin.php">sign in</a></small>
            </form>
        </div>
    </section>
</body>

</html>