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

Mysqual workbench kun kirjaudut  mene kohtaan Data Export. Etsi sieltä ninav_db tietokanta. Tietokannasta löytyy Tablet Kartoittaja, Asiakas, Kartoituskohde ja lasku. 
