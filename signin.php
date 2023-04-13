<?php
    require 'config/constants.php';
    $user_name = $_SESSION['signin-data']['user_name'] ?? null;
    $user_pass = $_SESSION['signin-data']['user_password'] ?? null;



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
            <h2>sign in</h2>
            <?php
                if(isset($_SESSION['signup-success'])){ ?>
                    <div class="alert_message success">
                        <p>
                            <?= $_SESSION['signup-success'];
                                unset($_SESSION['signup-success']);
                            ?>
                            
                        </p>
                    </div>
            <?php } 
            elseif(isset($_SESSION['signin'])){?>
                <div class="alert_message error">
                        <p>
                            <?= $_SESSION['signin'];
                                unset($_SESSION['signin']);
                            ?>
                            
                        </p>
                    </div>
            <?php }?>
            <form action="./signin-logic.php" method="post">
                <input type="text" name="user_name" value="<?= $user_name ?>" placeholder="user name">
                <input type="password" name="user_password" value="<?= $user_pass ?>" placeholder="password">
                <button type="submit" name="user_submit" class="btn">sign in</button>

                <small>don't have an account ? <a href="./signup.php">sign up</a></small>
            </form>
        </div>
    </section>
</body>

</html>