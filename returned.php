<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style.css"/>
		<title>Objets plus disponibles</title>
</head>
<body>
<h1>Objets plus disponibles</h1>
<?php
if (!array_key_exists('id',$_POST)){
	echo "<p>Tu n'as rien selectionné !</p>";
} else {
	$id=$_POST['id'];
	$delete = 'DELETE FROM monuments WHERE "REG" = \'' . $id . '\'';
	$db = new SQLite3('DATA.db');
	$results = $db->exec($delete);
	echo "<p>L'objet est supprimé de la base !</p>";
}
?></body>
<html>
