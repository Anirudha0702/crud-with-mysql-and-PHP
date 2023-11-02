<?php
include "credentials.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $connection=mysqli_connect($server,$db_username,$db_password,$databasename);
    if(!$connection){
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php?message=connection failed");
    }
    $sql="SELECT Password FROM `Student` WHERE `email`='$email'";
    $res=mysqli_query($connection,$sql);
    if ($res) {
        $row = mysqli_fetch_assoc($res);
    }
    if( $password == implode($row)){
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html");


    }
    else{
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.html?message=Invalid Credentials");
    }
    mysqli_close($connection);
} 
else {
    echo "Invalid 404 bad request";
}
?>