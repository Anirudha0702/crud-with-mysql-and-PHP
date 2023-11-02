<?php
include "credentials.php";
    
        $tableName=$_GET['table_name'];
        $conncetion=mysqli_connect($server,$db_username,$db_password,$databasename);
        if(!$conncetion){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/error.html");
        }
        $query="drop table ".$tableName.";";
        echo $query;
        try{
            $res=mysqli_query($conncetion,$query);
            mysqli_close($conncetion);
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=success&msg=Table%20Deleted%20Successfully");
        }
        catch(Exception $e){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=failed&err=".$e->getMessage());
        }
    
?>