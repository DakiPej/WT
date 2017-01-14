<?php
  $user = $_GET["username"];
  $pass = md5($_GET["pass"]);
  $x = 0;

  $veza = new PDO("mysql:dbname=carmagazine;host=localhost;charset=utf8", "Daki", "12345678");
  $veza->exec("set names utf8");

  $korisnici = $veza->prepare("select * from user where username = '".$user."' and lozinka = '".$pass."'");
  $korisnici->execute();
  $count = $korisnici->rowCount();
  $admin = false;
  if($count == 1) $admin = true;

  $vijesti = $veza->prepare("select id, naslov, tekst, slika from vijesti");
  $vijesti->execute();
  foreach($vijesti as $c) {
    if($x == 0) echo "<div class='row'>";
    echo "<div id=vijest_".$c['id']." class='container'>";
    echo "<img src='".$c['slika']."' id=vijest_".$c['id']." onclick='ucitajVijestText(this.id)'/>";
    echo"<p id=vijest_".$c['id']." onclick='ucitajVijestText(this.id)'>".$c['tekst']."</p>";

    if($admin){
      echo "<input id=vijest_".$c['id']." type='submit' value='Obrisi' onclick='obrisiMe(this.id)'>";
      echo "<input id=vijest_".$c['id']." type='submit' value='Edituj' onclick='editujMe(this.id)'>";
    }
    echo "</div>";
    $x++;
    if($x == 3) {
      echo "</div>"; $x=0;
    }
  }
  if($x != 0)echo "</div>";

  if($admin){
    echo "<input type='submit' value='Generisi PDF' onclick='generisiPDF()'>";
    echo "<input type='submit' value='Generisi CSV' onclick='generisiCSV()'>";
    echo "<input type='submit' value='Nova vijest' onclick='dodajVijest()'>";
    echo "<input type='submit' value='XML u Bazu' onclick='XMLuBazu()'>";
  }
?>
