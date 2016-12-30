<?php
  if(file_exists('Users/' . $_GET['username'] . '.xml')){
    $xml = new SimpleXMLElement('Users/' . $_GET['username'] . '.xml', 0, true);
    if(md5($_GET['pass']) == $xml->password && $xml->role == "admin"){
      $xml=simplexml_load_file("index.xml");
      $i = count($xml);
      for($i=0; $i<count($xml); $i++){
        if($xml->container[$i]->id == $_GET['id']) unset($xml->container[$i]);
      }
    }
  $xml->asXML("index.xml");
  }
?>
