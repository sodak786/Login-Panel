<?php

if(isset($_POST['uname']) && isset($_POST['password'])){
    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $name = validate($_POST['uname']);
    $pass = validate($_POST['password']);


    if(empty($name)){
        header("Location: index.php?error=Username is required");
        exit();
    }elseif(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }else{
        echo "valid input";
    }

}else{
    header("Location: index.php");
    exit();
}