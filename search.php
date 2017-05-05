<html>
<head>
   <meta charset="utf-8"/>
   <title>Monuments</title>
   <link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body background="back.jpg">
<h1> Trouve un monument près de chez toi ?</h1>
<p>La France regorge de monuments historiques dans toutes ses communes, mais savez vous qu'il existe différents objets mobiliers propriété publique qui sont classés au titre des monuments historiques ? Découvrez lesquels sont près de chez vous !</p>
<form method="GET" action="results.php">
<select name="Région">
<option value="" selected></option>
<?php
$db = new SQLite3('DATA.db');

$results = $db->query(
    'SELECT DISTINCT "REG","REG" FROM monuments ORDER BY "REG"'
);

while ($row = $results->fetchArray()) {
    if ($row[0]) {
        echo "<option value='", $row[1],"'>", $row[0], "</option>\n";
    }
}
?>
</select>
<p>Ville / Code Postal : </p> 
<input type="text" name="descr"/></br>
<input type="submit" name="Go" value="GO !"/>
</form>
</body>
</html>
