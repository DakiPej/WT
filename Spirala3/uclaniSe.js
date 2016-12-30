function uclaniSe() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert(xmlhttp.responseText);
      }
  };

  var ime = document.forms["signUp"]["ime"].value;
  var prezime = document.forms["signUp"]["prezime"].value;
  var grad = document.forms["signUp"]["grad"].value;
  var adresa = document.forms["signUp"]["adresa"].value;
  var username = document.forms["signUp"]["korisnickoIme"].value;
  var email = document.forms["signUp"]["mail"].value;
  var pass = document.forms["signUp"]["lozinka"].value;

  var parametri = "ime="+ime+"&prezime="+prezime+"&grad="+grad+"&adresa="+adresa+"&username="+username+"&email="+email+"&password="+pass;

  xmlhttp.open("post", "uclaniSe.php?"+parametri, true);
  xmlhttp.send();
}
