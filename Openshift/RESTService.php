<?php
function zag() {
    header("{$_SERVER['SERVER_PROTOCOL']} 200 OK");
    header('Content-Type: text/html');
    header('Access-Control-Allow-Origin: *');
}
function rest_get($request, $data) {
  $veza = new PDO("mysql:dbname=".getenv("MYSQL_DATABASE").";host=".getenv("MYSQL_SERVICE_HOST"), getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"));
  $veza->exec("set names utf8");
  $sqlquery="select naslov, tekst, autor from vijesti";
  if(isset($_REQUEST['param'])){
    $sqlquery=$sqlquery." where autor ='".$_REQUEST['param']."';";
  }
  $vijesti = $veza->prepare($sqlquery);

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
