<?php
  $user = $_GET["username"];
  $pass = $_GET["pass"];
  $citaj = simplexml_load_file("index.xml");
  $x = 0;
//ucitajVijestText(this.id)
  foreach($citaj as $c) {
    if($x == 0) echo "<div class='row'>";
    echo "<div id='".$c->id."' class='container'>";
    echo "<img src='".$c->img."' id='".$c->id."' onclick='ucitajVijestText(this.id)'/>";
    echo"<p id='".$c->id."' onclick='ucitajVijestText(this.id)'>".$c->p."</p>";

    if(file_exists('users/'.$user.'.xml')){
      $xml = new SimpleXMLElement('Users/'.$user.'.xml', 0, true);
      if(md5($pass) == $xml->password && $xml->role == "admin") {
        echo "<input id='".$c->id."' type='submit' value='Obrisi' onclick='obrisiMe(this.id)'>";
        echo "<input id='".$c->id."' type='submit' value='Edituj' onclick='editujMe(this.id)'>";
      }
    }
    echo "</div>";
    $x++;
    if($x == 3) {
      echo "</div>"; $x=0;
    }
  }
  if($x != 0)echo "</div>";

  if(file_exists('users/'.$user.'.xml')){
    $xml = new SimpleXMLElement('Users/'.$user.'.xml', 0, true);
    if(md5($pass) == $xml->password && $xml->role == "admin") {
      echo "<input type='submit' value='Generisi PDF' onclick='generisiPDF()'>";
      echo "<input type='submit' value='Generisi CSV' onclick='generisiCSV()'>";
      echo "<input type='submit' value='Nova vijest' onclick='dodajVijest()'>";
    }
  }
?>
