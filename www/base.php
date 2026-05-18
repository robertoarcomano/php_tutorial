<?php
    $host = "127.0.0.1";
    $db   = "db";
    $user = "utente";
    $pass = "utente";

    function db_pdo($host, $db, $user, $pass) {
        try {
            $pdo = new PDO(
                "mysql:host=$host;dbname=$db;charset=utf8",
                $user,
                $pass
            );

            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->query("SELECT * FROM utenti");

            while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
                echo $row['id'] . " - " . $row['nome'] . "<br>";

        } catch (PDOException $e) {
            echo "Errore connessione: " . $e->getMessage();
        }
    }

    function db($host, $db, $user, $pass) {
        $conn = mysqli_connect($host, $user, $pass, $db);

        if (!$conn)
            die("Connessione fallita: " . mysqli_connect_error());

        $sql = "SELECT * FROM utenti";
        $result = mysqli_query($conn, $sql);

        if (!$result)
            die("Errore query: " . mysqli_error($conn));

        while ($row = mysqli_fetch_assoc($result))
            echo $row['id'] . " - " . $row['nome'] . "<br>";

        mysqli_close($conn);
    }

    db_pdo($host, $db, $user, $pass);
    echo "<br>";
    db($host, $db, $user, $pass);
?>