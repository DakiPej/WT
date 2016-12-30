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
      $xml = new SimpleXMLElement('<user></user>');
      $xml->addChild('password', md5($password));
      $xml->addChild('ime', $ime);
      $xml->addChild('prezime', $prezime);
      $xml->addChild('grad', $grad);
      $xml->addChild('adresa', $adresa);
      $xml->addChild('email', $email);
      $xml->addChild('role', 'user');
      $xml->asXML('users/' . $username . '.xml');
      echo "Korisnik uspjesno kreiran.";
      die;
  }
  else echo "Greska prilikom kreiranja korisnika!";
?>
