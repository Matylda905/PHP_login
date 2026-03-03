<?php

$dsn = "mysql:host=localhost;dbname=test;charset=utf8";
$username = "testuser";
$password = "testuser";

try {
    $db = new PDO($dsn, $username, $password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}

catch (PDOException $e) {
    die("Nelze se pripojit k databázi: " . $e->getMessage());
    //exit();
}

function ja ($uname, $psw){

    global $db;

        $sql = "SELECT username, psw FROM userdata WHERE username =:username";
        $stmt = $db->prepare($sql);
        $stmt->execute([':username' => $uname]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user["psw"] == $psw) {
            
            $_SESSION["user"] = $user["username"];
            header("Location: users.php");
            exit();

        }else{
            echo "uzivatel neni prihlasen";
        }
}

/*function getAll($table) {
    global $db;
    $sql = "SELECT * FROM $table";
    $stmt = $db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}*/

?>