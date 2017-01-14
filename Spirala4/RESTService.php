<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) {
  $veza = new PDO("mysql:dbname=carmagazine;host=localhost;charset=utf8", "Daki", "12345678");
  $veza->exec("set names utf8");
  $vijesti = $veza->prepare("select naslov, tekst, autor from vijesti");
  $vijesti->execute();
  $data = array();
  foreach ($vijesti as $v) {
    $data[] = array("naslov"=>$v['naslov'], "tekst"=>$v['tekst'], "autor"=>$v['autor']);
    #print "{ \"vijesti\": " . json_encode($vijesti->fetchAll()) . "}";
  }
  print "{ \"vijesti\": " . json_encode($data) . "}";
}
function rest_error($request) { }

$method  = $_SERVER['REQUEST_METHOD'];
$request = $_SERVER['REQUEST_URI'];

switch($method) {
    case 'GET':
        zag(); $data = $_GET; rest_get($request, $data); break;
    default:
        header("{$_SERVER['SERVER_PROTOCOL']} 404 Not Found");
        rest_error($request); break;
}
?>
