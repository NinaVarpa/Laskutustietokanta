# Laskutustietokanta
Aloimme tietokanta projektin. Minulla on mennyt useampi päivä nettisivujen tekoon replitillä. Ongelmia oli myös tiedon siirossa githubin suuntaan. Loin uuden reposition githubiin.
Jotenkin yhteys toimii nyt. rupean suunnittelemaan tietokantoja ( 27.9)
Tänään tutkittu php toimintaa replitillä. Esimerkiksi https:// codeshack.io 
## Laskutustietokannan toteutus
Ensiksi kun haluat kirjautua tietokantaprojektiini luo yhteys php käyttäliittymään
Asenna PHP: https://windows.php.net/download#php-8.1
VS16 x64 Non Thread Safe 

Pura kansioon, jossa säilytät php-tiedostojasi ja nimeä purettu kansio esim. nimellä php.

Avaa command prompt ja mene kansioon, jossa php -tiedostosi sijaitsevat. Kirjoita php\php -S localhost:

Palvelin on nyt käynnistetty. Voita avata osoitteen localhost

php/php.ini-development > muuta nimi > php.ini > avaa tiedosto

extension=mysqli > poista kommentti

extension_dir = "ext" > poista kommentti
Tämän kun olet tehdyt etsi kansion polku ja kopioi polku. Mene command prompt ja C\ cd ja polku (osoite) kansioon. sen jälkeen kirjoita php\php localhost: ja portti mistä tieto kulkee.
Sen jälkeen voit avatat visual coden ja MySQL Workbenchin.

Kun kirjaudut MySQL workbenchiin, mene kohtaan Data Export. Etsi sieltä xxx_db tietokanta. Tietokannasta löytyy Tablet Kartoittaja, Asiakas, kohde ja lasku. 
Hahmoittelin tietokanta tableja paperille ja miten visuaalisesti toteuttaisin tietokantani. Toteutus ei mennyt ihan niin kuin olin ajatellut.

## Ensimmäinen hahmotelma tietokannastani
![Suunnitelma](pititulla.jpg)

## Tässä toteutunut työ tietokannoistani

![Tietokanta](tietokanta2.jpg)

Tässä kuva tietokannastani. Tähän asti sain toteutettua työni.
Tässä ovat tietokantani php filet.
Ensimmäiseki tulee index.php sivu, jossa kirjaudutaan sivustolle, kun on rekisteröitynyt aikaisemmin itsensä tällä sivulla tai muuten sivussa on linkki rekistöröintisivulle.

## YHTEYS TIETOKANTAAN

Yhteys php-lomakkeelta tietokantaan luodaan näin:
```
<?php

$servername = "xxxxxxx";
$username = "xxxxxx";
$password = "xxxxx";
$dbname = "xxxx";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection       Tarkistaa yhteyden
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
```
## KIRJAANTUMINEN
```
<html>
    <body>
        <h1>LASKUTUSOHJELMA</h1>  
        <form action ="kasittely2.php" method ="post"><br>
          <label for="nimi"> Nimi </label>
          <input type="text" name="Nimi"><br>
          <label for="salasana"> Salasana </label>
          <input type="text" name="Salasana"><br>
          <input type="submit" value="Kirjaudu">
        </form>   
        <a href="kirjaus.php"> lomake</a><br>
        <a href= "rekisterointi.php"> Rekisteröidy</a>
     </Body>
</html>
```

INDEX.PHP lomakkeelta lähetetty tieto käsitellään kasittely2.php. Koodi tarkastaa tietokannasta löytyykö lomakkeelle kirjattu nimi ja salasana Kartoittaja tablesta.Jos tietojasi ei löydy, et voi lisätä asiakasta seuraavalta lomakkeelta.
```
<?php

  $nimi = $_POST["Nimi"];
  $salasana = $_POST["Salasana"];  Muuttujat määritellään näin
  $kart_id;

  

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
```
Kun olet kirjaantunut lomakkeelle sisään kasittely2.php sivun alhaalla on lomake, johon kirjoitetaan asiakas ja kart_id, jolla selviää kuka kartoittaja on kyseessä. ECHO kirjoittaa haun tulokset sivulle näkyviin.

## ASIAKKAAN LISÄÄMINEN
```
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
```
Tältä lomakkeelta lähetetyt tiedot käsitellään lomalleella kasittely3.php
```
<?php
session_start();
$servername = "xxxx";
$username = "xxxx";
$password = "xxxx";
$dbname = "xxxx";


$conn = new mysqli ($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
  die("connection failed: " .$conn-> connect_error);
 }

    
    
echo $_POST['Asiakas'];
echo $_POST['kart_id'];

$asiakas = $_POST['Asiakas'];
$kart_id = $_POST['kart_id'];

$_SESSION["kart_id"] = $kart_id;

$stmt = $conn->prepare('INSERT INTO asiakas(asiakas,kart_id) VALUES (?,?)');
$stmt->bind_param('ss',$asiakas,$kart_id);
$stmt-> execute();

echo "Asikas lisätty kartoittajalle: " . $kart_id . "" . $asiakas;
$stmt->close();
$conn->close();
header("Location: listaus.php");


?>

```
Tämä kysely lisää Asiakas tietokantaa asiakkaan tiedot ja kirjautuneen kartoittajan (kart_id). Samalla koodi tulostaa kartoittajan id ja lisätyn asiakaan.
```
<?php
session_start();

$servername = "xxxxx";
$username = "xxxxx";
$password = "xxxxx";
$dbname = "xxxxx";

$conn = new mysqli ($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
    die("connection failed: " .$conn-> connect_error);
 }


echo " Tässä on sinun asiakkaasi <br><br>:";


    $sql = "SELECT asiakas.asiakas,kartoittaja.nimi FROM asiakas INNER JOIN kartoittaja ON kartoittaja.id = asiakas.kart_id AND kartoittaja.id = {$_SESSION['kart_id']}";
    
    $result = $conn->query($sql);
    
    if ($result->num_rows >0){
        while ($row = $result->fetch_assoc()){ 
            echo $row["asiakas"]."<br>";
            
            
            
          
        }
    }

  
    
   $conn->close();

?>
```
Tällä haulla haetaan kirjautuneen kartoittajan asiakkaat ja tulostetaan alekkain sivulle. Tästä voi jatkaa hyvin laskutusjärjestelmän rakentamista.

## REKISTERÖITYMINEN

Jos et ole rekisteröintynyt aikaisemmin niin rekisteröityminen tapahtuu omalla lomakkeella. Rekisterointi.php sivulla
```
<html>
    <form action ="kasittely.php" method ="post">
          <div class="otsikko2">Rekisteröidy</div><br>
          <label for="nimi"> Nimi </label>
          <input class="lomake" type="text" name="Nimi"><br>
          <label for="salasana"> Salasana </label>
          <input class="lomake" type="text" name="Salasana"><br>
          <br>
          <input class="lomaketieto"type="submit"value="Rekisteröidy">
        </form>
    </html>
```
Tiedot käsitellään kasittely.php sivulla`.
```
<?php
include 'rekisterointi.php';
$servername = "xxxxx";
$username = "xxxxxx";
$password = "xxxxxx";
$dbname = "xxxxx";

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$conn = new mysqli ($servername, $username, $password, $dbname);
 if ($conn->connect_error) {
  die("connection failed: " .$conn-> connect_error);
 }

    
    
echo $_POST['Nimi'];
echo $_POST['Salasana'];

$nimi = $_POST['Nimi'];
$salasana = $_POST['Salasana'];     Muuttujat määritellään näin

$stmt = $conn->prepare('INSERT INTO kartoittaja(nimi,salasana)VALUES(?,?)');
$stmt->bind_param('ss',$nimi,$salasana,);
$stmt-> execute();
header("Location: index.php");
die();
?>
```
Tällä koodilla syötetään lomakkeelle kirjoitetut tiedot, kartoittajan nimi ja salasana, Kartoittaja tietokantaan. ID numero luodaan automaattisesti tietokantaan.
