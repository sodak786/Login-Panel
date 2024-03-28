<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport"
              content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>login panel</title>
        <link rel="stylesheet" href="login.css">
    </head>
    <body>
        <form action="login.php" method="post">
            <h1>Login</h1>
            <?php if(isset($_GET['error'])){?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <p>Username</p>
            <input type="text" name="uname" placeholder="username">
            <p>Password</p>
            <input type="password" name="password" placeholder="password">
            <br>
            <button type="submit">Login</button>
            <a href="register.php">register</a>
        </form>
    </body>
</html>