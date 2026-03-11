<?php

$filename = $_GET['filename'];
$path = "files/" . $filename;

$content = file_get_contents($path);

?>

<form method="post" action="save.php">
<input type="text" name="filename" value="<?php echo $filename; ?>">

<br><br>

<textarea name="content" rows="15" cols="80">
<?php echo $content; ?>
</textarea>

<br><br>

<button type="submit">Uložit</button>

</form>