<?php
    $veza = new PDO("mysql:dbname=".getenv("MYSQL_DATABASE").";host=".getenv("MYSQL_SERVICE_HOST"), getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"));
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
