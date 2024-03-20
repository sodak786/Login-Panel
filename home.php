<?php
    session_start();

    if(isset($_SESSION['user_name']) && isset($_SESSION['id'])){ ?>
        <!doctype html>
        <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport"
                      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <title>home</title>
                <link rel="stylesheet" href="login.css">
            </head>
            <body id="HOME">
                <h1>Hello, <?php echo $_SESSION['name'];?></h1><br>
                <a href="logout.php">Logout</a>
            </body>
        </html>
    <?php }
    else{
        header('Location: index.php');
    } ?>


