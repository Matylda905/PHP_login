<?php 
session_start();
require "databaze.php";

if (isset($_SESSION["user"])) {
    header("Location: index.php");
    exit();
}
/* INSERT */

if (isset($_POST["add"])) {
   $stmt = $db->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
   $stmt->execute([$_POST["username"], $_POST["password"]]);
}

/* DELETE */

if (isset($_GET["delete"])) {
   $stmt = $db->prepare("DELETE FROM users WHERE id = ?");
   $stmt->execute([$_GET["delete"]]);
}

/* SELECT */

$stmt = $db->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<form method="POST">
    <input type="text" name="username" placeholder="Jméno">
    <input type="text" name="password" placeholder="Heslo">
    <button type="submit" name="add">Přidat</button>
</form>

<hr>

<table border="1">
<tr>
    <th>ID</th>
    <th>Username</th>
    <th>Akce</th>
</tr>

<?php foreach ($users as $u): ?>

<tr>
    <td><?= $u["id"] ?></td>
    <td><?= $u["username"] ?></td>
    <td>
        <a href="?delete=<?= $u["id"] ?>">Smazat</a>
    </td>
</tr>

<?php endforeach; ?>

</table>
 