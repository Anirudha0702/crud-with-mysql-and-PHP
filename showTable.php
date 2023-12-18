<?php
    include "credentials.php";
    // if($_SERVER["REQUEST_METHOD"] == "POST"){
        $tableName=$_GET['table_name'];
        $conncetion=mysqli_connect($server,$db_username,$db_password,$databasename,$port);
        if(!$conncetion){
            header("Location: " . $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'].dirname($_SERVER['PHP_SELF'])."/error.html");
        }
        $query="select * from ".$tableName.";";
        $Colm_query="SELECT COLUMN_NAME, DATA_TYPE
        FROM INFORMATION_SCHEMA.COLUMNS
        WHERE TABLE_SCHEMA = 'college_db'
          AND TABLE_NAME = '".$tableName."';";
        try{
            $colm_res=mysqli_query($conncetion,$Colm_query);
            if ($colm_res ) {
                echo '<table border="3"><tr>';

                while($row=mysqli_fetch_array($colm_res)){
                    echo "<th>".$row['COLUMN_NAME']."</th>"; 
                }
                echo "<th>DELETE</th>";
                echo "</tr>";
            }
            $res=mysqli_query($conncetion,$query);
            if (mysqli_num_rows($res) > 0) {
                
                while($row=mysqli_fetch_array($res)){
                    echo "<tr>";
                    for($i=0;$i<sizeof($row)/2;$i++){
                        echo "<td>".$row[$i]."</td>";
                    }
                    echo "<td class='delete_record' style='cursor: pointer; color: red' onClick=\"deleteRecord(event, '$tableName')\">&#10006;</td>";

                    echo "</tr>";
                }
                mysqli_close($conncetion);
                echo "</table>";
            } else {
                echo "No records found.";
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