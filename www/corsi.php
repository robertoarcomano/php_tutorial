<?php
    $host = "127.0.0.1";
    $db = "scuola_sql";
    $user = "root";
    $password = "";



    require("funzioni.php");    
    $rows = query($host, $user,  $password, $db, "corsi");
?>

<table border = "1">
    <tr>
        <th>id_corso</th>
        <th>nome_corso</th>
        <th>id_docente</th>
    </tr>
    <?php foreach($rows as $row) { ?>
            <tr>
                <?php foreach(array_keys($row) as $chiave) { ?>
                    <td>
                        <?php echo $row[$chiave]?>
                    </td>
                <?php } ?>
            </tr>
    <?php } ?> 
    

</table>