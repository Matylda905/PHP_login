<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prohlížet katalog</title>
</head>
<body>
    <h1>Prohlížet katalog</h1>
    <p>Zde si můžete prohlédnout katalog dostupných souborů</p>
    <?php
    $files = scandir('files');
    foreach ($files as $file) {
        if ($file !== '.' && $file !== '..') {
            echo "<p>$file <a href='files/$file' download>Download</a></p>";
        }
    }
    ?>
</body>
</html>