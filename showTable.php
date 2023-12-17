<?php
    include "credentials.php";
    // if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tableName=$_GET['table_name'];
        $conncetion=mysqli_connect($server,$db_username,$db_password,$databasename,$port);
        if(!$conncetion){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/error.html");
        }
        $query="select * from ".$tableName.";";
        
        try{
            $res=mysqli_query($conncetion,$query);
            if (mysqli_num_rows($res) > 0) {
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
            } else {
                echo '<script>';
                echo 'console.log("Message from PHP");';
                echo '</script>';
                echo "No records fovcvund.";
            }
            
        }
        catch(Exception $e){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/index.html?message=failed&err=".$e->getMessage());
        }
    // }
    // else {
    //     echo "Invalid 404 bad request";
    // }
?>