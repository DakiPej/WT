function ucitajVijesti() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementsByClassName("news")[0].innerHTML = xmlhttp.responseText;
      }
  };
  var username = localStorage['username'];
  var pass = localStorage['pass'];
  xmlhttp.open("POST", "ucitajVijesti.php?username="+username+"&pass="+pass, true);
  xmlhttp.send();
}

function ucitajVijestiHot() {
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementsByClassName("hot")[0].innerHTML = xmlhttp.responseText;
      }
  };

  xmlhttp.open("POST", "ucitajVijestiHot.php?username="+localStorage['username']+"&pass="+localStorage['pass'], true);
  xmlhttp.send();
}

function ucitajVijestiPregledAuta() {
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementsByClassName("main")[0].innerHTML = xmlhttp.responseText;
      }
  };

  xmlhttp.open("POST", "ucitajVijestiPregledAuta.php?username="+localStorage['username']+"&pass="+localStorage['pass'], true);
  xmlhttp.send();
}
