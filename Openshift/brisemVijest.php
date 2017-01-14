<?php
  #brisanje iz XML-a
  /*if(file_exists('Users/' . $_GET['username'] . '.xml')){
    $xml = new SimpleXMLElement('Users/' . $_GET['username'] . '.xml', 0, true);
    if(md5($_GET['pass']) == $xml->password && $xml->role == "admin"){
      $xml=simplexml_load_file("index.xml");
      $i = count($xml);
      for($i=0; $i<count($xml); $i++){
        if($xml->container[$i]->id == $_GET['id']) unset($xml->container[$i]);
      }
    }
  $xml->asXML("index.xml");
}*/

  $veza = new PDO("mysql:dbname=".getenv("MYSQL_DATABASE").";host=".getenv("MYSQL_SERVICE_HOST"), getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"));
  $veza->exec("set names utf8");

  try{
    $id_vijest = explode("_", $_GET['id']);
    $vijesti = $veza->prepare("delete v from vijesti as v, user as u where
                                            v.id=".$id_vijest[1]." and
                                            u.username = '".$_GET['username']."' and
                                            u.lozinka = '".md5($_GET['pass'])."' and
                                            u.uloga = 'admin'");
    $vijesti->execute();
  }
  catch(PDOException $e){
      echo $e->getMessage();
  }

?>
