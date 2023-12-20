<?php
include "credentials.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];
    $connection=mysqli_connect($server,$db_username,$db_password,$databasename,$port);
    if(!$connection){
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.php?message=connection failed");
    }
    $sql="SELECT Password FROM `student` WHERE Email='$email'";
    try{
        $res=mysqli_query($connection,$sql);
        $row='A';
    if ($res) {
        $row = mysqli_fetch_assoc($res);
    }
    echo "PAssword".implode($row);
    if( $password == implode($row)){
        session_start();
        $_SESSION['logined']=true;
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html");

    }
    else{
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/login.html?message=Invalid Credentials");
    }
    mysqli_close($connection);
    }
    catch(Exception $e){
        echo 'DATABASE ERror';
        mysqli_close($connection);
    }
} 
else {
    echo "Invalid 404 bad request";
}
?>