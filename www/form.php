<?php
$host = "127.0.0.1";
$db   = "db";
$user = "utente";
$pass = "utente";
$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("DB error");
}

// funzione unica per query
function q($sql)
{
    global $conn;
    return mysqli_query($conn, $sql);
}

// ADD
if (isset($_POST['add'])) {
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    q("INSERT INTO utenti (nome) VALUES ('$nome')");
}

// DELETE
if (isset($_POST['delete'])) {
    $id = (int)$_POST['id'];
    q("DELETE FROM utenti WHERE id=$id");
}

// EDIT
if (isset($_POST['edit'])) {
    $id = (int)$_POST['id'];
    $nome = mysqli_real_escape_string($conn, $_POST['nome']);
    q("UPDATE utenti SET nome='$nome' WHERE id=$id");
}

// SEARCH
$s = $_GET['s'] ?? '';

if ($s != '') {
    $s = mysqli_real_escape_string($conn, $s);
    $res = q("SELECT * FROM utenti WHERE nome LIKE '%$s%'");
} else {
    $res = q("SELECT * FROM utenti");
}

?>

<h3>Utenti</h3>

<!-- ADD -->
<form method="post">
    <input name="nome" placeholder="nome">
    <button name="add">aggiungi</button>
</form>

<!-- SEARCH -->
<form method="get">
    <input name="s" value="<?= htmlspecialchars($s) ?>" placeholder="cerca">
    <button>cerca</button>
</form>

<hr>

<table border="1" cellpadding="5">

<?php while ($r = mysqli_fetch_assoc($res)): ?>

<tr>
    <td><?= $r['id'] ?></td>

    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $r['id'] ?>">
            <input name="nome" value="<?= htmlspecialchars($r['nome']) ?>">
            <button name="edit">salva</button>
        </form>
    </td>

    <td>
        <form method="post">
            <input type="hidden" name="id" value="<?= $r['id'] ?>">
            <button name="delete" onclick="return confirm('delete?')">x</button>
        </form>
    </td>
</tr>

<?php endwhile; ?>

</table>