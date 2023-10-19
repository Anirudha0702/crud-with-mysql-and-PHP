<?php
include "credentials.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $connection=mysqli_connect($server,$db_username,$db_password,$databasename);
    if(!$connection){
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php?message=connection failed");
    }
    $sql="SELECT Password FROM `Student` WHERE `Name`='$username'";
    $res=mysqli_query($connection,$sql);
    if ($res) {
        $row = mysqli_fetch_assoc($res);
    }
    if( $password == implode($row)){
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html");
    }
    else{
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php?message=Invalid Credentials");
    }
    mysqli_close($connection);
} 
else {
    echo "Invalid 404 bad request";
}
?>