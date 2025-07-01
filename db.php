<?php
   $servername = "localhost";
   $benutzername = "root";
   $passwort ="";
   $datenbank = "artikelphp";

   $conn = new mysqli($servername, $benutzername, $passwort, $datenbank);

   
   if($conn->connect_error){
                           //string    +  string2
       die("Verbindung fehlgeschlagen:" . $conn->connect_error);
   }

   if(isset($_POST['insert'])){
      $Bezeichnung = $_POST['bezeichnung'];
      $Preis = $_POST['preis'];
      $Kategorie = $_POST['kategorie'];
      $Lagerbestand = $_POST['lagerbestand'];

      $sql = $conn->prepare("INSERT INTO artikel VALUES (NULL,?,?,?,?)");  
      $sql->bind_param("sss", $bezeichnung, $preis, $kategorie, $lagerbestand); 

      if($sql->execute()){
          header("location: index.php");  
          exit();
      }else{
          echo "Fehler:" .$sql->error;     
      }
   }
?>
