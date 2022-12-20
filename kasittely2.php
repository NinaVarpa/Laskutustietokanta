<?php

$servername = "hyvis.mysql.database.azure.com";
$username = "db_projekti";
$password = "Sivyh2022";
$dbname = "ninav_db";


 

  $nimi = $_POST["Nimi"];
  $salasana = $_POST["Salasana"];
  $kart_id;

  $conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM kartoittaja WHERE nimi='{$nimi}' AND salasana='{$salasana}'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo $row["id"]. "<br>";
    $kart_id = $row["id"];
  }
} else {
  header("Location: asiakas.php");
  echo "0 results";
}

echo "Lisää asiakas kartoittajalle: " . $kart_id . " " . $nimi;
$conn->close();



?>  
<html>
  <body>
    <form action ="kasittely3.php" method ="post"><br>
      <label for="asiakas"> Asiakas</label>
      <input type="text" name="Asiakas"><br>
      <input type = "Hidden" name="kart_id" value=<?php echo $kart_id ?>>
      <input type="submit" value="Lisää asiakas">
    </form>
  </body>

</html>

