<?php
  $errors = array();
  $ime = $_GET['ime'];
  $prezime = $_GET['prezime'];
  $grad = $_GET['grad'];
  $adresa = $_GET['adresa'];
  $username = $_GET['username'];
  $email = $_GET['email'];
  $password = $_GET['password'];
  //$c_password = $_GET['c_password'];

  if(file_exists('users/' . $username . '.xml')){
      $errors[] = 'Korisnicko ime postoji';
  }
  if($ime == ''){
      $errors[] = 'Ime je prazno';
  }
  if($prezime == ''){
      $errors[] = 'Prezime je prazno';
  }
  if($grad == ''){
      $errors[] = 'Naziv grada je prazan';
  }
  if($adresa == ''){
      $errors[] = 'Adresa je prazna';
  }
  if($username == ''){
      $errors[] = 'Korisnicko ime je prazno';
  }
  if($email == ''){
      $errors[] = 'Email je prazan';
  }
  if($password == ''){
      $errors[] = 'Lozinka je prazna';
  }
//  if($password != $c_password){
//      $errors[] = 'Lozinke se ne podudaraju';
//  }
  if(count($errors) == 0){
    $veza = new PDO("mysql:dbname=carmagazine;host=localhost;charset=utf8", "Daki", "12345678");
    $veza->exec("set names utf8");
    $user = $veza->prepare("INSERT INTO user (username, lozinka, ime, prezime, grad, adresa, email, uloga) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$user) {
      $greska = $veza->errorInfo();
      print "SQL greška: " . $greska[2];
      exit();
    }
    $user->execute(array($username, md5($password), $ime, $prezime, $grad, $adresa, $email, "user"));
    echo "Korisnik uspjesno kreiran.";
    die;
  }
  else echo "Greska prilikom kreiranja korisnika!";
?>
