<html>
<head>
   <meta charset="utf-8"/>
   <title>SQLITE TEST</title>
</head>
<body>
<?php
    $db = new SQLite3('sql.db');
    $db->exec('INSERT INTO R VALUES (3)');

    echo "hahaha, blahblah blah";

    $results = $db->query('SELECT A+A FROM R');
    echo "<ul>"; 
    while ($row = $results->fetchArray()) {
        echo "<li>";
        echo $row[0];
        echo "</li>\n";
    }
    echo "</ul>\n";
?>
</body>
</html>
