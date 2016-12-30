function ucitajVijestText(id) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementsByClassName("main")[0].innerHTML = "";
        document.getElementsByClassName("vijestElement")[0].innerHTML = xmlhttp.responseText;
      }
  };

  var username = localStorage['username'];
  var pass = localStorage['pass'];
  xmlhttp.open("POST", "ucitajVijestText.php?username="+username+"&pass="+pass+"&id="+id, true);
  xmlhttp.send();
}
