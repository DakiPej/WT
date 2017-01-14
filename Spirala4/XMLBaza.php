<?php

  $veza = new PDO("mysql:dbname=carmagazine;host=localhost;charset=utf8", "Daki", "12345678");
  $veza->exec("set names utf8");

  try{
    $vijesti = $veza->prepare("INSERT INTO vijesti (id, naslov, tekst, autor, slika) VALUES (?, ?, ?, ?, ?)");
    $korisnici = $veza->prepare("INSERT INTO user (username, lozinka, ime, prezime, grad, adresa, email, uloga) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $pregledAuta = $veza->prepare("INSERT INTO pregledauta (id, naslov, tekst, autor, slika) VALUES (?, ?, ?, ?, ?)");

    #upis korisnika u bazu podataka
    $dir = "users/";
    $dh  = opendir($dir);
    while (false !== ($filename = readdir($dh))) {
        if(strpos($filename,".xml")) $files[] = $filename;
    }

    $i = count($files)-1;
    for($i; $i>=0; $i--) {
      $citaj = simplexml_load_file("Users/".$files[$i]);
      $korisnici->execute(array
                          (str_replace(".xml", "", $files[$i]),
                          $citaj->password,
                          $citaj->ime,
                          $citaj->prezime,
                          $citaj->grad,
                          $citaj->adresa,
                          $citaj->email,
                          $citaj->role));
    }

    #upis vijesti u bazu podataka
    $citaj = simplexml_load_file("index.xml");
    foreach ($citaj as $c) {
      $id_vijest = explode("_", $c->id);
      $vijesti->execute(array(intval($id_vijest[1]) , $c->p, $c->text, $c->autor, $c->img));
    }

    $citaj = simplexml_load_file("pregledAuta.xml");
    foreach ($citaj as $c) {
      $id_vijest = explode("_", $c->id);
      $pregledAuta->execute(array(intval($id_vijest[1]), $c->p, $c->text, $c->autor, $c->img));
    }
  }
  catch(PDOException $e){
      echo $e->getMessage();
  }
?>
