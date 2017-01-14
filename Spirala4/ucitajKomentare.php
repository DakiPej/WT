<?php
    $veza = new PDO("mysql:dbname=carmagazine;host=localhost;charset=utf8", "Daki", "12345678");
    $veza->exec("set names utf8");
    $rezultat = $veza->query("");
    if (!$rezultat) {
         $greska = $veza->errorInfo();
         print "SQL greška: " . $greska[2];
         exit();
    }


    foreach ($rezultat as $komentar) {
         #print $vijest['naslov']." ".$vijest['tekst']." ".$vijest['autor']." ".date("d.m.Y. (h:i)", $vijest['vrijeme2'])."<br>";
    }
   ?>
