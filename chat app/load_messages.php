<?php
$file = 'messages.txt';

if (file_exists($file)) {
    $messages = file_get_contents($file);
    echo nl2br($messages);
}
?>