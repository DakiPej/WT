<?php
  $id = $_GET["id"];
  $user = $_GET["username"];
  $pass = md5($_GET["pass"]);

  $veza = new PDO("mysql:dbname=carmagazine;host=localhost;charset=utf8", "Daki", "12345678");
  $veza->exec("set names utf8");

  $id_niz = explode("_", $id);
  $vijesti = $veza->prepare("select naslov, tekst, slika from vijesti where id = ".intval($id_niz[1]));
  $vijesti->execute();

  foreach($vijesti as $c) {
    echo "<div class='elementPicture'><img src='";
    echo $c['slika'];
    echo "'></div>";

    echo "<div class='elementTitle'><p>";
    echo $c['naslov'];
    echo "</p></div>";

    echo "<div class='elementText'><p>";
    echo $c['tekst'];
    echo "</p></div>";
  }

echo "<div class='comments'>
    <div class='allComments'>
    </div>
    <div class='leaveComment'>
      <form class='formComment' name='formComment' onsubmit='return commentV();' method='post'>
        <div class='commentRow'>
          <label>Korisnicko ime</label>
          <br>
          <input type='text' name='username' onkeydown='changeColor(this);' required>
          <br>
        </div>
        <div class='commentRow'>
          <label>Komentar</label>
          <br>
          <textarea name='commentText' rows='8' cols='40' onkeydown='changeColor(this);' required></textarea>
          <br>
        </div>
        <div class='commentRow'>
          <div id='validation'>   </div>
          <input type='submit' name='Posalji' value='Posalji'>
        </div>
      </form>
    </div>
  </div>";

?>
