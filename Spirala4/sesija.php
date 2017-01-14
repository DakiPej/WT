<?php
  $error = false;
  $username = $_GET['u'];
  $password = md5($_GET['l']);

  $veza = new PDO("mysql:dbname=carmagazine;host=//mysql:3306/;charset=utf8", "Daki", "12345678");
  $veza->exec("set names utf8");

  $korisnici = $veza->prepare("select * from user where username = '".$username."' and lozinka = '".$password."'");
  $korisnici->execute();
  $count = $korisnici->rowCount();

  if($count == 1)  echo "Dobrodosli, ".$username;
  else echo "Greska u korisnickom imenu ili passwordu";
/*
if(file_exists('Users/' . $username . '.xml')){
    $xml = new SimpleXMLElement('Users/' . $username . '.xml', 0, true);
    if($password == $xml->password){
        session_start();
        $_SESSION['u'] = $username;
        echo "Dobrodosli, ".$username;
    }
    else {
      echo "Password nije ispravan";
    }
}*/


?>
