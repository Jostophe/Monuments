<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>Donne ton avis !</title>
	<link rel="stylesheet" type="text/css" href="style.css"/>
  </head>
  <body background="back.jpg">
    
	<?php
	if(ISSET($_POST['Nom']) AND ISSET($_POST['Avis'])){
		$db = new SQLite3('reviews.db');
		$add = 'INSERT INTO AVIS ("Nom", "Avis") VALUES("'.$_POST["Nom"].'","'.$_POST["Avis"].'")' ;
		$db->exec($add);
		
		echo "<p>";
		echo "Merci <b>" .$_POST["Nom"]."</b>, ton avis a été ajouté !<br/>";
		echo '<a href="search.php">Retour à la page de recherche</a>';
		echo "</p>";
	}
	else{
	?>
	
   <h1>Participe au développement du site et donne ton avis !</h1>
	<form action="reviews.php" method="POST">
	<p>Nom :</p>
    <input type="text" name="Nom"/><br/>
    <p>Ton avis :</p>
    <textarea name ="Avis" rows="10" cols="80"></textarea>
    <input type="submit" name="submit" value="Submit"/>
    </form>
	
  </body>
</html>
<?php
}
?>