<?php
include "credentials.php";
$key= $_GET['key'];
$value= $_GET['val'];
$table= $_GET['table_name'];
$conncetion=mysqli_connect($server,$db_username,$db_password,$databasename,$port);
        if(!$conncetion){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/error.html");
        }
        $query="DELETE FROM ".$table." WHERE ".$key."='".$value."';";
        try{
            $res=mysqli_query($conncetion,$query);
            if ($res ) {
                echo "Record deleted successfully";
            } else {
                echo "No records found.";
            }
            
        }
        catch(Exception $e){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=failed&err=".$e->getMessage());
        }
?>