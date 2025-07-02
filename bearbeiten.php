<?php
include ("db.php");

if(isset($_GET['artikelID'])){
	$sql = $conn->query("SELECT * FROM artikel WHERE artikelID=".$_GET['artikelID']."");
	$info = $sql->fetch_assoc();	// ...fetch_array(); wuerde auch funktionieren

	$artID = $info['artikelID'];
	$bez = $info['Bezeichnung'];
	$preis = $info['Preis'];
	$kategorie = $info['Kategorie'];
	$lagerbestand = $info['Lagerbestand'];
}
?>

<html>
<head>
</head>
<body>
    <h2>Artikel bearbeiten</h2>

    <form action="db.php" method="POST">
       <label for="bezeichnung">Bezeichnung:</label>
	   <input type="text" name="bezeichnung" value="<?=$bez;?>" ><br>
       <label for="preis">Preis:</label>
       <input type="text" name="preis" value="<?=$preis;?>">"<br>
		<select name="kategorie">
			<option value="Sport"<?php if ($kategorie == 'Sport') echo ' selected="selected"'; ?>>Sport und Freizeit</option>
			<option value="Lebensmittel"<?php if ($kategorie == 'Lebensmittel') echo ' selected="selected"'; ?>>Lebensmittel</option>
			<option value="Diverses"<?php if ($kategorie == 'Diverses') echo ' selected="selected"'; ?>>Diverses</option>
		</select><br>
       <label for="lagerbestand">Lagerbestand:</label>
	   <input type="text" name="lagerbestand" value="<?=$lagerbestand;?>"><br>
	   <input type="hidden" name="artikelID" value="<?=$artID;?>"><br>

       <input type="submit" name="bearbeiten" value="Bearbeiten">
    </form>

</body>
</html>
