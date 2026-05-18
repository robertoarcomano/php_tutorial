<?php
    $host = "127.0.0.1";
    $db   = "db";
    $user = "utente";
    $pass = "utente";

    function db_pdo_html($host, $db, $user, $pass) {
        echo "<table border=1>";
            echo "<tr>";
                echo "<th>";
                    echo "ID";
                echo "</th>";
                echo "<th>";
                    echo 'NOME';
                echo "</th>";
            echo "</tr>";        
            try {
                $pdo = new PDO(
                    "mysql:host=$host;dbname=$db;charset=utf8",
                    $user,
                    $pass
                );

                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $stmt = $pdo->query("SELECT * FROM utenti");

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo "<tr>";
                        echo "<td>";
                            echo $row['id'];
                        echo "</td>";
                        echo "<td>";
                            echo $row['nome'];
                        echo "</td>";
                    echo "</tr>";
                }

            } catch (PDOException $e) {
                echo "Errore connessione: " . $e->getMessage();
            }
        echo "</table>";
    }

    function db_html($host, $db, $user, $pass) {
        echo "<table border=1>";
            echo "<tr>";
                echo "<th>";
                    echo "ID";
                echo "</th>";
                echo "<th>";
                    echo 'NOME';
                echo "</th>";
            echo "</tr>";        
            $conn = mysqli_connect($host, $user, $pass, $db);

            if (!$conn)
                die("Connessione fallita: " . mysqli_connect_error());

            $sql = "SELECT * FROM utenti";
            $result = mysqli_query($conn, $sql);

            if (!$result)
                die("Errore query: " . mysqli_error($conn));

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                    echo "<td>";
                        echo $row['id'];
                    echo "</td>";
                    echo "<td>";
                        echo $row['nome'];
                    echo "</td>";
                echo "</tr>";
            }

            mysqli_close($conn);
        echo "</table>";
    }

    db_pdo_html($host, $db, $user, $pass);
    echo "<br>";
    db_html($host, $db, $user, $pass);
?>