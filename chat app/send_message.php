<?php
$file = 'messages.txt';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = isset( $_POST['message'] ) ? $_POST['message'] :'';

    if ($message) {
        $timestamp = date('Y-m-d H:i:s');
        file_put_contents($file, "[$timestamp] $message\n", FILE_APPEND);
    }
}
?>