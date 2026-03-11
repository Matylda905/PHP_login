<!DOCTYPE html>
<html>
<head>
    <title>Editor souborů</title>
</head>

<body>
    <h2>Editor</h2>

    <form method="post" action="save.php">

        Název souboru:
        <input type="text" name="filename" placeholder="soubor.txt">

        <br><br>

        <textarea name="content" rows="15" cols="80"></textarea>

        <br><br>

        <button type="submit">Uložit</button>
    </form>

    <hr>

    <h3>Načíst soubor</h3>

    <form method="get" action="load.php">
        <input type="text" name="filename" placeholder="soubor.txt">
        <button type="submit">Načíst</button>
    </form>
</body>
</html>
 