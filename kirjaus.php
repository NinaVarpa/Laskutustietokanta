<?php
$servername = "hyvis.mysql.database.azure.com";
$username = "db_projekti";
$password = "Sivyh2022";
$dbname = "ninav_db";

$conn = new mysqli ($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
    die("connection failed: " .$conn-> connect_error);
 }
 $conn = new mysqli ($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
    die("connection failed: " .$conn-> connect_error);
 }
    $sql = "SELECT * FROM Asiakas";
    $result = $conn->query($sql);
    
    if ($result->num_rows >0){
        while ($row = $result->fetch_assoc()){ 
            echo $row["nimi"];
        }
    }

  
    
   $conn->close();


?>



<html>
  <head>
    <title> Lasku</title>
    <link rel= "stylesheet"href="lomake.css">
    <meta http-equiv="content-type" content="text html" charset="utf-8"/>
  </head>
  <body>
   
    <div> 
      <h1>Laskun kirjaaminen</h1>
       <form id="asiakas">
          <div class="otsikko2">Asiakastiedot</div><br>
          <label for="animi"> Nimi </label>
          <input class="lomake1" type="text" id="Nimi"> 
          <br>
          <label for="asikasnumero"> Asiakasnumero 
          </label>
          <input class="lomake1" type="text" 
          id="asikasnumero"><br>
          <label for="aosoite"> Lähiosoite</label>
          <input class ="lomake1"type = "text" id= 
          "Lähiosoite"><br><br>
          <div class="otsikko3"> Kohde</div>
          <label for="kohde"> Kartoituskohde</label>
          <input class = "lomake1"type = "text" id= 
          "Kartoituskohde"><br>
          <label for="osoite"> Osoite</label>
          <input class = "lomake1"type = "text" id= 
          "Osoite"><br><br>
          <div class="otsikko4"> Kartoittaja</div><br>
          <label for="kartoittaja"> Kartoittaja</label>
          <input class = "lomake1"type = "text" id= 
          "Kartoittaja"><br>
          <label for="osoite"> Osoite</label>
          <input class = "lomake1"type = "text" id= 
          "Osoite"><br>
       </form>
      <form id ="tiedot">
      <div class="otsikko5"> Laskun tiedot</div><br>
          <label for= "era"> Eräpäivä</label>
          <input class = "lomake1"type = "pvm" id= 
           "eräpäivä"><br>
         <label for= "laskunnro"> Laskunnumero</label>
          <input class = "lomake1"type = "text" id= 
           "Laskunnumero"><br>
          <label for= "summa"> Summa</label>
          <input class = "lomake1"type = "text" id= 
           "Summa"><br>
         <label for= "viite"> Viitenumero</label>
          <input class = "lomake1"type = "text" id= 
           "Viitenumero"><br><br> 
         <input class="laheta"type="submit"value="Lähetä">
       </form>
       <a href="tulostus.html"> lähetä</a><br>
       <a href= "testi.php">testi</a><br>
    </div>
    </body>       
</html>
