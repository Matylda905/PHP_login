<?php

$filename = $_POST['filename'];
$content = $_POST['content'];

$path = "files/" . $filename;

file_put_contents($path, $content);

echo "Soubor byl uložen.";
?>