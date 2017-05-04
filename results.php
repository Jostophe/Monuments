<html>
<head>
	<meta charset="utf-8"/>
	<link rel="stylesheet" type="text/css" href="style2.css"/>
	<title>Monuments trouvés :</title>
</head>
<body>
<h1>Monuments trouvés :</h1>
<form action="returned.php" method="POST">
<table>
<tr><th>Région</th><th>Département</th><th>Ville</th><th>Edifice</th><th>Monument</th>
<th><input type="submit" value='Returned'/></th>
</tr>
<?php
if (array_key_exists('Région', $_GET)) {
    $reg=$_GET['Région'];
} else {
    $reg=NULL;
}

if (array_key_exists('descr', $_GET)) {
    $description=$_GET['descr'];
} else{
    $description=NULL;
}

if (array_key_exists('offset', $_GET)) {
    $offset = $_GET['offset'];
} else {
    $offset = 0;
}

$query = 'SELECT "REG", "DPT", "COM", "EDIF", "DENO", "MATR"'.
    'FROM monuments WHERE 1 ';
    
if ($reg) {
    $query = $query . 'AND "REG" = \'' . $reg . '\' ' ;
}

if ($description) {
    $query = $query . 'AND ( "DPT" LIKE \'%' . $description . '%\' ' .
        'OR "COM" LIKE \'%' . $description . '%\') ';
}

$query = $query . "LIMIT 20 " . "OFFSET " . $offset ;

#echo $query;

$db = new SQLite3('DATA.db');
$results = $db->query($query);

while ($row = $results->fetchArray()) {
	$reg = $row[0];
	echo "<tr>";
	echo "<td>",$reg,"</td>";
	echo "<td>",$row[1],"</td>";
	echo "<td>",$row[2],"</td>";
	echo "<td>",$row[3],"</td>";
	echo "<td>",$row[4],"</td>";
	echo "<td><input type='radio' name='id' value='",$row[5],"'/></td>";
	echo "</tr>\n";
}

?>
</table>
</form>
<?php
echo "<a href='results.php?";
if ($reg) {
    echo 'Région=',$reg,'&';
}
if ($description) {
    echo 'descr=',$description,'&';
}
echo 'offset=', intval($offset) - 20;
echo "'>&lt;&lt;</a>";

echo "<a href='results.php?";
if ($reg) {
    echo 'Région=',$reg,'&';
}
if ($description) {
    echo 'descr=',$description,'&';
}
echo 'offset=', intval($offset) + 20;
echo "'>&gt;&gt;</a>";
?>
<br>
<a href="http://www.google.fr">Faire une recherche</a>
</body>
</html>
