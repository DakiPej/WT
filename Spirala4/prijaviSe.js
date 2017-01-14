function prijaviSe() {

  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        localStorage["username"] = ime;
        localStorage["pass"] = lozinka;
        alert (xmlhttp.responseText);
      }
  };

  var ime = document.forms["signIn"]["username"].value;
  var lozinka = document.forms["signIn"]["lozinka"].value;
  var sesija = "sesija.php?u="+ime+"&l="+lozinka;
  xmlhttp.open("GET", sesija, true);
  xmlhttp.send();
}
