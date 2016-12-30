<?php
$error = false;
$username = $_GET['u'];
$password = md5($_GET['l']);
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
}
else {
  echo "Korisnicko ime ne postoji";
}

?>
