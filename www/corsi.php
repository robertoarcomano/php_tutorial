<?php
    $host = "127.0.0.1";
    $db = "scuola_sql";
    $user = "root";
    $password = "";

    function query($host, $user,  $password, $db, $tabella){
        $conn = mysqli_connect($host, $user,  $password, $db);
        if(!$conn){
            die("Connessoine fallita: " . mysqli_connect_error);
        }
        $sql ="SELECT * FROM " . $tabella;
        $result = mysqli_query($conn, $sql);
        print_r($result);
        echo "<br>";
        echo "<table border = 1>";
        echo "<tr>";
            echo "<th>" . "id_corso" . "</th>";
            echo "<th>" . "nome_corso" . "</th>";
            echo "<th>" . "id_docente" . "</th>";
        echo "</tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
                echo "<td>";
                echo $row["id_corso"];
                echo "</td>";
                echo "<td>";
                echo $row["nome_corso"];
                echo "</td>";
                echo "<td>";
                echo $row["id_docente"];
                echo "</td>";
            echo "</tr>";
        }
        echo "</table>";
        
    }
    query($host, $user,  $password, $db, "corsi");
?>