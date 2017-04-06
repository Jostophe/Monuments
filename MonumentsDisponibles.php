<html>
<head>
   <meta charset="utf-8"/>
     <title>Les différents monuments en France</title>
</head>
<body>
<h1>Trouve les monuments près de chez toi !</h1>
<form method="POST" action="MonumentsTrouves.php">
<select name="Région">
<option value="" selected></option>
<?php
$f = fopen("Data.csv","r");
$entete = fgetcsv($f, 0, "|");

$region = array();

while ($ligne = fgetcsv($f, 0, "|")) {
    if ($ligne[2]) {
        $gare[$ligne[2]] = $ligne[3];
    }
}

foreach ($region as $nom => $REG) {
    echo "<option value='$REG'>", $nom, "</option>\n";
}
?>
</select>
<p>Déscription d&apos;objet : </p> 
<input type="text" name="descr"/></br>
<input type="submit" name="Go" value="Trouve mon tresor"/>
</form>
</body>
</html>
