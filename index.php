<?php
include("db.php");
?>

<html>
<head>

   <title>Artikelverwaltung</title>
</head>
<body>
    <h2>Artikel hinzufügen</h2>

    <form action="db.php" method="POST">
       <label for="bezeichnung">Bezeichnung:</label>
       <input type="text" name="bezeichnung"><br>
       <label for="preis">Preis:</label>
       <input type="text" name="preis"><br>
		<select name="kategorie">
			<option value="Sport">Sport und Freizeit</option>
			<option value="Lebensmittel">Lebensmittel</option>
			<option value="Diverses">Diverses</option>
		</select><br>
       <label for="lagerbestand">Lagerbestand:</label>
       <input type="text" name="lagerbestand"><br>

       <input type="submit" name="insert" value="Hinzufügen">
    </form>

    <table>
       <tr>
           <th>NO.</th>
           <th>Bezeichnung:</th>
           <th>Preis:</th>
           <th>Kategorie:</th>
           <th>Lagerbestand:</th>
	   </tr>
       <?php
         
           $kontaktsql = $conn->query("SELECT * FROM artikel;");
           while($zeile = $kontaktsql->fetch_assoc()){
                           echo "<tr>";
              echo "<td>" .$zeile['artikelID']."</td>";
              echo "<td>" .$zeile['Bezeichnung']."</td>";
              echo "<td>" .$zeile['Preis']."</td>";
              echo "<td>" .$zeile['Kategorie']."</td>";
              echo "<td>" .$zeile['Lagerbestand']."</td>";
              
              echo "</tr>";
           }
		?>
    </table>
</body>
</html>
