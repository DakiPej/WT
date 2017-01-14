function ucitajKomentare() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementsByClassName("allComments")[0].innerHTML = xmlhttp.responseText;
      }
  };

  xmlhttp.open("POST", "ucitajKomentare.php", true);
  xmlhttp.send();
}
