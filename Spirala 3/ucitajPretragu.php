<?php
$pretraga = $_GET["pretraga"];
$user = $_GET['user'];
$pass = $_GET['pass'];
if(file_exists('users/'.$user.'.xml')){
  $xml = new SimpleXMLElement('Users/'.$user.'.xml', 0, true);
  if(md5($pass) == $xml->password && $xml->role == "admin") {//korisnik je admin
  }
  else exit; //korisnik NIJE ADMIIIIIN
}

$hint="";
$dir = "users/";
$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
    if(strpos($filename,".xml")) $files[] = $filename;
}

$i = count($files)-1;
for($i; $i>=0; $i--) {

  $citaj = simplexml_load_file("Users/".$files[$i]);
  if(strlen($pretraga)>0)
    if(strpos($citaj->ime, $pretraga) || strpos($citaj->prezime, $pretraga)){
      if($hint == "") $hint = $citaj->ime." ".$citaj->prezime;
      else $hint = $hint." ".$citaj->ime." ".$citaj->prezime;
    }
}
if ($hint=="") {
  $response="Nema prijedloga";
} else {
  $response=$hint;
}
echo $response;
?>
