<?php
include "credentials.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $positionToRemove=-3;
        $string="create table ".$_POST['table_name']."(".implode(",",explode(";",$_POST['name_of_columns'])).");";
        $query = substr($string, 0, $positionToRemove) . substr($string, $positionToRemove + 1);
        $conncetion=mysqli_connect($server,$db_username,$db_password,$databasename,$port);
        if(!$conncetion){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/error.html");
        }
        try{
            $res=mysqli_query($conncetion,$query);
            mysqli_close($conncetion);
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=success&msg=Table%20Created%20Successfully");
        }
        catch(Exception $e){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=failed&err=".$e->getMessage());
        }
    }
?>