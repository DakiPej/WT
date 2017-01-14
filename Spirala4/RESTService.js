function dajVijesti(){
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (xhttp.readyState == 4 && xhttp.status == 200) {
      vijesti = JSON.parse(xhttp.responseText);
      upis = "";
      for(var i = 0; i<vijesti.vijesti.length; i++){
        upis += "Naslov vijesti: " + vijesti.vijesti[i].naslov + "<br>Tekst vijesti: " + vijesti.vijesti[i].tekst + "<br><br>Autor: " + vijesti.vijesti[i].autor + "<br><br><br><br>";
      }
      document.getElementsByClassName("REST")[0].innerHTML = upis;
    }
  };
  xhttp.open("GET", "RESTService.php", true);
  xhttp.send();
}
