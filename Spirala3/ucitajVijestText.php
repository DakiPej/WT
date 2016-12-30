<?php
  $user = $_GET["username"];
  $pass = $_GET["pass"];
  $id = $_GET["id"];
  $citaj = simplexml_load_file("index.xml");

  foreach($citaj as $c) {
    if($c->id == $id){

      echo "<div class='elementPicture'><img src='";
      echo $c->img;
      echo "'></div>";

      echo "<div class='elementTitle'><p>";
      echo $c->p;
      echo "</p></div>";

      echo "<div class='elementText'><p>";
      echo $c->text;
      echo "</p></div>";
    }
  }
?>
