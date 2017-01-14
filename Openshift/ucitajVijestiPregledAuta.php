<?php
$user = $_GET["username"];
$pass = md5($_GET["pass"]);
$x = 0;

$veza = new PDO("mysql:dbname=".getenv("MYSQL_DATABASE").";host=".getenv("MYSQL_SERVICE_HOST"), getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"));
$veza->exec("set names utf8");

$korisnici = $veza->prepare("select * from user where username = '".$user."' and lozinka = '".$pass."'");
$korisnici->execute();
$count = $korisnici->rowCount();
$admin = false;
if($count == 1) $admin = true;
$vijesti = $veza->prepare("select id, naslov, tekst, slika from pregledauta");
$vijesti->execute();

  foreach($vijesti as $c) {
    if($x == 0) echo "<div class='row'>";
    echo "<div class='container'>";
    echo "<div class='picture'><img src='".$c['slika']."'/></div>";
    echo "<div class='text'><p>".$c['tekst']."</p></div>";
    if($admin){
      echo "<input id='".$c['id']."' type='submit' value='Obrisi' onclick='obrisiMe(this.id)'>";
      echo "<input id='".$c['id']."' type='submit' value='Edituj' onclick='editujMe(this.id)'>";

    }
    echo "</div>";
    $x++;
    if($x == 2) {echo "</div>"; $x=0;}
  }
  if($x != 0) echo "</div>";
  if($admin){
    echo "<input type='submit' value='Generisi PDF' onclick='PDF()'>";
    echo "<input type='submit' value='Generisi CSV' onclick='CSV()'>";
    echo "<input type='submit' value='Nova vijest' onclick='dodajVijest()'>";

  }
?>
