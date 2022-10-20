<?php
$servername = "hyvis.mysql.database.azure.com";
$username = "db_projekti";
$password = "Sivyh2022";
$dbname = "ninav_db";

$conn = new mysqli ($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
    die("connection failed: " .$conn-> connect_error);
 }
    $sql = "SELECT kartoittaja FROM kirjaudu";
    $result = $conn->query($sql);
    
    if ($result->num_rows >0){
        while ($row = $result->fetch_assoc()){ 
            echo $row["kartoittaja"];
        }
      }
        
        
    

 
 $conn->close();


?>


<html>
  <head>
    <body>
      <title> Laskutusohjelma</title>
      <link rel= "stylesheet"href="laskutus.css">
      <meta http-equiv="content-type" content="text html" charset="utf-8"/>
  </head>
    <div> 
      <h1>LASKUTUSOHJELMA</h1>
      <form action id="tietoja">
          <div class="otsikko2">Kirjaudu sisään</div><br>
          <label for="nimi"> Nimi </label>
          <input class="lomake" type="text" id="Nimi"><br>
          <label for="salasana"> Salasana </label>
          <input class="lomake" type="text" id="Salasana"><br>
          <input class="lomaketieto"type="submit"value="Kirjaudu">
        </form>
  <a href="kirjaus.php"> lomake</a><br>
  <img src ="este merkit.jpg" class= "estemerkit"/>
   </div>
    <a href= "rekisterointi.php"> Rekisteröidy</a>
  </Body>
</html>
