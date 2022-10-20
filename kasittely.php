<?php
include 'rekisterointi.php'

//mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli ($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
  die("connection failed: " .$conn-> connect_error);
 }

    
    
//echo $_POST['Nimi'];
//echo $_POST['Salasana'];
//echo $_POST['Tunnus'];
//echo $_POST['Osoite'];
//echo $_POST['Tunnusid']
$nimi = $_POST['Nimi'];
$salasana = $_POST['Salasana'];
$tunnus = $_POST['Tunnus'];
$osoite = $_POST['Osoite'];
$tunnusid =$_POST['Tunnusid']
//stmt = $conn->prepare('INSERT INTO kartoittaja (Tunnus, nimi, osoite, tunnusid,salasana)VALUES (?,?,?,?,?)');
//$stmt->bind_param('sssss', $Tunnus,$nimi,$osoite,$tunnusid,$salasana);
//$stmt-> execute();
//header("Location: index.php");
//die();
?>
