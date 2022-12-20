# Laskutustietokanta
Aloimme tietokanta projektin. Minulla on mennyt useampi päivä nettisivujen tekoon replitillä. Ongelmia oli myös tiedon siirossa githubin suuntaan. Loin uuden reposition githubiin.
Jotenkin yhteys toimii nyt. rupean suunnittelemaan tietokantoja ( 27.9)
Tänään tutkittu php toimintaa replitillä. Esimerkiksi https:// codeshack.io 
Laskutustietokannan toteutus
Ensiksi kun haluat kirjautua tietokantaprojektiini luo yhteys php käyttäliittymään
Asenna PHP: https://windows.php.net/download#php-8.1
VS16 x64 Non Thread Safe 

Pura kansioon, jossa säilytät php-tiedostojasi ja nimeä purettu kansio esim. nimellä php.

Avaa command prompt ja mene kansioon, jossa php -tiedostosi sijaitsevat. Kirjoita php\php -S localhost:

Palvelin on nyt käynnistetty. Voita avata osoitteen localhost

php/php.ini-development > muuta nimi > php.ini > avaa tiedosto

extension=mysqli > poista kommentti

extension_dir = "ext" > poista kommentti
Tämän kun olet tehdyt etsi kansion polku ja kopioi polku. Mene command prompt ja C\ cd ja polku (osoite) kansioon. sen jälkeen kirjoita php\php lovalhost: ja portti mistä tieto kulkee.
Sen jälkeen voit avatat visual coden ja

Kun kirjaudut Mysqual workbench   mene kohtaan Data Export. Etsi sieltä ninav_db tietokanta. Tietokannasta löytyy Tablet Kartoittaja, Asiakas, Kartoituskohde ja lasku. 
Hahmoittelin tietokanta tableja paperille ja miten visuaalisesti toteuttaisin tietokantani. Toteutus ei mennyt ihan niin.
![Tietokanta](tietokanta1.jpg)
Tässä kuva tietokannastani. Tähän asti sain toteutettua työni.
Tässä ovat tietokantani php filet.
Ensimmäiseki tulee index.php sivu, jossa kirjaudutaan sivustolle, kun on rekisteröitynyt aikaisemmin itsensä tällä sivulla tai muuten sivussa on linkki rekistöröintisivulle.
```
<html> 
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
Yhteys php-lomakkeelta tietokantaan luodaan näin:
```
<?php

$servername = "hyvis.mysql.database.azure.com";
$username = "db_projekti";
$password = "Sivyh2022";
$dbname = "ninav_db";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
```


Lomakkeelta lähetetty tieto käsitellään kasittely2.php. Koodi tarkastaa tietokannasta löytyykö kirjattu nimi ja salasana Kartoittaja tablesta.
```
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
```


