<?php
    include "credentials.php";
        $tableName=$_GET['table_name'];
        $conncetion=mysqli_connect($server,$db_username,$db_password,$databasename,$port);
        if(!$conncetion){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/error.html");
        }
        $query="SELECT COLUMN_NAME, DATA_TYPE
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_SCHEMA = 'college_db'
          AND TABLE_NAME = '".$tableName."';";
        
        
        try{
            $res=mysqli_query($conncetion,$query);
            if ($res ) {
                echo "<form action='./insert.php?table=".$tableName."' method='POST'>";
                while($row=mysqli_fetch_array($res)){
                    echo "<label for='".$row['COLUMN_NAME']."'>".$row['COLUMN_NAME']."(".$row['DATA_TYPE'].")</label>";
                    echo "<input type='text' name='".$row['COLUMN_NAME']."' id='".$row['DATA_TYPE']."'>";
                   
                }
                mysqli_close($conncetion);
                echo    "<button type='submit'>Insert</button>";
                echo "</form>";
            } else {
                echo "No records found.";
            }
            
        }
        catch(Exception $e){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=failed&err=".$e->getMessage());
        }
?>