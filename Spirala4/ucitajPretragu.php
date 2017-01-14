<?php
$pretraga = $_GET["pretraga"];
$user = $_GET['user'];
$pass = md5($_GET['pass']);

$veza = new PDO("mysql:dbname=carmagazine;host=localhost;charset=utf8", "Daki", "12345678");
$veza->exec("set names utf8");
$korisnici = $veza->prepare("select * from user where username = '".$user."' and lozinka = '".$pass."' and role = 'admin'");
$korisnici->execute();
$count = $korisnici->rowCount();

  $query = "select username, ime, prezime
            from user
            where username LIKE '%".$pretraga."%'
              or ime LIKE '%".$pretraga."%'
              or prezime LIKE '%".$pretraga."%'";

  $results = $veza->prepare($query);
  $results->execute();

  $hint="";

  foreach ($results as $r) {
    if($hint == "") $hint = $r['ime']." ".$r['prezime'];
    else $hint = $hint." ".$r['ime']." ".$r['prezime'];
  }

  if ($hint=="" || $pretraga == "") {
    $response="Nema prijedloga";
  } else {
    $response=$hint;
  }
  echo $response;
/*
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
echo $response;*/
?>
