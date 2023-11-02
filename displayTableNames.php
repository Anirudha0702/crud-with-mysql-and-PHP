<!-- <option value="Student">Student</option> -->
<?php
    include "credentials.php";
    $conncetion=mysqli_connect($server,$db_username,$db_password,$databasename);
    if(!$conncetion){
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/error.html");
    }
    try{
        $res=mysqli_query($conncetion,"show tables;");
        mysqli_close($conncetion);
        while($row=mysqli_fetch_array($res)){
            echo "<option value='".$row[0]."'>".$row[0]."</option>";
        }
    }
    catch(Exception $e){
        header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=failed&err=".$e->getMessage());
    }
?>