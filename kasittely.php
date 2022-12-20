<?php
include 'rekisterointi.php';
$servername = "hyvis.mysql.database.azure.com";
$username = "db_projekti";
$password = "Sivyh2022";
$dbname = "ninav_db";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli ($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
  die("connection failed: " .$conn-> connect_error);
 }

    
    
echo $_POST['Nimi'];
echo $_POST['Salasana'];

$nimi = $_POST['Nimi'];
$salasana = $_POST['Salasana'];

$stmt = $conn->prepare('INSERT INTO kartoittaja(nimi,salasana)VALUES(?,?)');
$stmt->bind_param('ss',$nimi,$salasana,);
$stmt-> execute();
header("Location: index.php");
die();
?>
