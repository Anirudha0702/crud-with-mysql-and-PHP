<?php
include "credentials.php";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $conncetion=mysqli_connect($server,$db_username,$db_password,$databasename,$port);
        if(!$conncetion){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/error.html");
        }
    $values = $_POST;
    $tableName = $_GET['table'];
    $mutation = "UPDATE ".$tableName." SET ";
    $mutation = $mutation . $_POST['cols_vals']; 
        if(isset($_POST['where'])){
            $mutation = $mutation." "  . $_POST['where'].";";
        }
    try{
        $res=mysqli_query($conncetion,$mutation);
        mysqli_close($conncetion);
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=success&msg=Data%20Inserted");
        
    }
    catch(Exception $e){
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=failed&err=".$e->getMessage());
    }
    }
    else{
        echo "404 bad request";
    }

?>