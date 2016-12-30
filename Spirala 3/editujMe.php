<?php
$user = $_GET['username'];
$pass = $_GET['pass'];
$id = $_GET['id'];

if(isset($_REQUEST['naslov']) || isset($_REQUEST['vijest'])){
  if(strlen($_REQUEST['naslov']) < 5) {
    echo "Naslov mora imati barem 5 slova (radi jednostavnosti prikaza funkcionalnosti)";
    exit;
  }
  if(strlen($_REQUEST['vijest']) < 5) {
    echo "Vijest mora imati barem 5 slova (radi jednostavnosti prikaza funkcionalnosti)";
    exit;
  }
}
else{
  echo "Polja za naslov i vijest ne smiju biti prazna.";
  exit;
}

$path = "pictures/";
if (!empty($_FILES["myFile"])) {

  $myFile = $_FILES["myFile"];

  if ($myFile["error"] !== UPLOAD_ERR_OK) {
    echo "<p>Greska prilikom ucitavanja slike.</p>";
    exit;
  }

  // ensure a safe filename
  $name = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);

  // don't overwrite an existing file
  $i = 0;
  $parts = pathinfo($name);
  while (file_exists($path.$name)) {
    $i++;
    $name = $parts["filename"]."-".$i.".".$parts["extension"];
  }

  // preserve file from temporary directory
  $success = move_uploaded_file($myFile["tmp_name"], $path.$name);
  if (!$success) {
    echo "<p>Slika nije spasena.</p>";
    exit;
  }

  // set proper permissions on the new file
  chmod($path . $name, 0644);
}

  $dom = new DomDocument();
  $dom->load('index.xml');
  $news = $dom->getElementsByTagName('news');

  $container = $dom->createElement('container');
  $img = $dom->createElement('img');
  $p = $dom->createElement('p');
  $text = $dom->createElement('text');

  $img->nodeValue = $path.$name;
  $p->nodeValue = $_REQUEST['naslov'];
  $text->nodeValue = $_REQUEST['vijest'];

  $container->appendChild($img);
  $container->appendChild($p);
  $container->appendChild($text);


  $info = simplexml_load_file('index.xml');
  $velicina = sizeof($info) - 1;

  $id = $dom->createElement('id');
  $niz = explode("_", $info->container[$velicina]->id);
  $id->nodeValue ="vijest_".strval(intval($niz[1]) + 1);
  $container->appendChild($id);

  $news[0]->appendChild($container);
  $dom->save('index.xml');

  echo "Vijest uspjesno objavljena.";
?>
