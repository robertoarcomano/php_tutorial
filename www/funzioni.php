<?php
function query($host, $user,  $password, $db, $tabella){
        $arr= [];

        $conn = mysqli_connect($host, $user,  $password, $db);
        if(!$conn){
            die("Connessoine fallita: " . mysqli_connect_error);
        }
        $sql ="SELECT * FROM " . $tabella;
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)){
            array_push($arr, $row);

           
        }
        
        
        return $arr;
    }
?>