<?php
    $host = "127.0.0.1";
    $db = "scuola_sql";
    $user = "root";
    $password = "";

    function query($host, $user,  $password, $db){
        $conn = mysqli_connect($host, $user,  $password, $db);
        if(!$conn){
            die("Connessoine fallita: " . mysqli_connect_error);
        }else{
            echo "Tutto apposto!";
        }
    }
    query($host, $user,  $password, $db);
?>