<?php

    include("databaze.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $uname = $_POST["uname"];
        $psw = $_POST["psw"];

        $stmt = $db->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$uname]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $user["password"] == $psw) {
            
            $_SESSION["user"] = $user["username"];
            header("Location: users.php");
            exit();

        }else{
            echo "uzivatel neni prihlasen";
        }
    }

?>