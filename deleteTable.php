<?php
include "credentials.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tableName=$_POST['table_name'];
        $conncetion=mysqli_connect($server,$db_username,$db_password,$databasename);
        if(!$conncetion){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/error.html");
        }
        $query="drop table ".$tableName.";";
        try{
            $res=mysqli_query($conncetion,$query);
            mysqli_close($conncetion);
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=success");
        }
        catch(Exception $e){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=failed&err=".$e->getMessage());
        }
    }
    else {
        echo "Invalid 404 bad request";
    }
?>