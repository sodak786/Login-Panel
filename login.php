<?php
global $conn;
session_start();
include "db_conn.php";
$error = null;

if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);


    if(empty($uname)){
        header("Location: index.php?error=Username is required");
        exit();
    }elseif(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }else{
        $sql = "";
        $stmt = $conn->prepare("SELECT * FROM users WHERE user_name = ? AND password=?");
        $stmt->bind_param("ss", $uname, $pass);

        $result = $stmt->execute();

        if(mysqli_num_rows($result) === 1){
            $row = mysqli_fetch_assoc($result);
            if($row['user_name'] === $uname && $row['password'] === $pass){
                $_SESSION["loggedin"] = true;
                header("Location: /index.php");
            }else{
                $error = "Incorrect username or password";
            }
        }else{
            $error = "Incorrect username or password";
        }
    }

}else{
    header("Location: index.php");
    exit();
}

?>


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
        <form method="post">
            <h1>Login</h1>
            <?php if(isset($error)){?>
                <p class="error"><?php echo $error; ?></p>
            <?php } ?>
            <p>Username</p>
            <input type="text" name="uname" placeholder="username">
            <p>Password</p>
            <input type="password" name="password" placeholder="password">
            <br>
            <button type="submit">Login</button>
        </form>
    </body>
</html>