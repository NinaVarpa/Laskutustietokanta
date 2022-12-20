<?php

$servername = "hyvis.mysql.database.azure.com";
$username = "db_projekti";
$password = "Sivyh2022";
$dbname = "ninav_db";


$conn = new mysqli ($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
  die("connection failed: " .$conn-> connect_error);
 }

    
    
echo $_POST['Asiakas'];
echo $_POST['kart_id'];

$asiakas = $_POST['Asiakas'];
$kart_id = $_POST['kart_id'];



$stmt = $conn->prepare('INSERT INTO asiakas(asiakas,kart_id) VALUES (?,?)');
$stmt->bind_param('ss',$asiakas,$kart_id);
$stmt-> execute();

echo "Asikas lisätty kartoittajalle: " . $kart_id . "" . $asiakas;
$stmt->close();
$conn->close();
header("Location: listaus.php");


?>
