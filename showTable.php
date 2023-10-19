<?php
    include "credentials.php";
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tableName=$_POST['table_name'];
        $conncetion=mysqli_connect($server,$db_username,$db_password,$databasename);
        if(!$conncetion){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/error.html");
        }
        $query="select * from ".$tableName.";";
        
        try{
            $res=mysqli_query($conncetion,$query);
            echo '<table border="3">';
                while($row=mysqli_fetch_array($res)){
                    echo "<tr>";
                    for($i=0;$i<sizeof($row)/2;$i++){
                        echo "<td>".$row[$i]."</td>";
                    }
                    echo "</tr>";
                }
                mysqli_close($conncetion);
                echo "</table>";
        }
        catch(Exception $e){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=failed&err=".$e->getMessage());
        }
    }
    else {
        echo "Invalid 404 bad request";
    }
?>