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
      $bezeichnung = $_POST['bezeichnung'];
      $preis = $_POST['preis'];
      $kategorie = $_POST['kategorie'];
      $lagerbestand = $_POST['lagerbestand'];

      $sql = $conn->prepare("INSERT INTO artikel VALUES (NULL,?,?,?,?)");  
      $sql->bind_param("sdsi", $bezeichnung, $preis, $kategorie, $lagerbestand); 

      if($sql->execute()){
          header("location: index.php");  
          exit();
      }else{
          echo "Fehler:" .$sql->error;     
      }
   }

   if(isset($_POST['delete'])){
      $artikelID = $_POST['delete'];

      $sql = $conn->prepare("DELETE FROM artikel WHERE artikelID=?");  
      $sql->bind_param("i", $artikelID); 

      if($sql->execute()){
          header("location: index.php");  
          exit();
      }else{
          echo "Fehler:" .$sql->error;     
      }
   }
?>
