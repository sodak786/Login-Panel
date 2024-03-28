<?php
session_start();
global $conn;
include "db_conn.php";
if(isset($_POST['rname']) && isset($_POST['rpassword']) && isset($_POST['name'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['rname']);
    $pass = validate($_POST['rpassword']);
    $name= validate($_POST['name']);



    if(empty($uname)){
        header("Location: register.php?error=Username is required");
        exit();
    }elseif(empty($pass)){
        header("Location: register.php?error=Password is required");
        exit();
    }else{
        $sql = "INSERT INTO users (user_name, password, name) VALUES ('$uname', '$pass', '$name')";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        $conn->close();
    }

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
<form action="register.php" method="post">
    <h1>Register</h1>
    <?php if(isset($_GET['error'])){?>
        <p class="error"><?php echo $_GET['error']; ?></p>
    <?php } ?>
    <p>Username</p>
    <input type="text" name="rname" placeholder="username">
    <p>Name</p>
    <input type="text" name="name" placeholder="name">
    <p>Password</p>
    <input type="password" name="rpassword" placeholder="password">
    <br>
    <button type="submit">Register</button>
    <a href="login.php">login</a>
</form>
</body>
</html>