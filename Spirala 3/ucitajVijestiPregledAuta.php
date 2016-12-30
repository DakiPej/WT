<?php
  $user = $_GET["username"];
  $pass = $_GET["pass"];
  $citaj = simplexml_load_file("pregledAuta.xml");
  $x = 0;
  foreach($citaj as $c) {
    if($x == 0) echo "<div class='row'>";
    echo "<div class='container'>";
    echo "<div class='picture'><img src='".$c->img."'/></div>";
    echo "<div class='text'><p>".$c->p."</p></div>";
    if(file_exists('users/'.$user.'.xml')){
      $xml = new SimpleXMLElement('Users/'.$user.'.xml', 0, true);
      if(md5($pass) == $xml->password && $xml->role == "admin") {
        echo "<input id='".$c->id."' type='submit' value='Obrisi' onclick='obrisiMe(this.id)'>";
        echo "<input id='".$c->id."' type='submit' value='Edituj' onclick='editujMe(this.id)'>";
      }
    }
    echo "</div>";
    $x++;
    if($x == 2) {echo "</div>"; $x=0;}
  }
  if($x != 0) echo "</div>";
  if(file_exists('users/'.$user.'.xml')){
    $xml = new SimpleXMLElement('Users/'.$user.'.xml', 0, true);
    if(md5($pass) == $xml->password && $xml->role == "admin") {
      echo "<input type='submit' value='Generisi PDF' onclick='PDF()'>";
      echo "<input type='submit' value='Generisi CSV' onclick='CSV()'>";
      echo "<input type='submit' value='Nova vijest' onclick='dodajVijest()'>";
    }
  }
?>
