function PDF() {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementsByClassName("news")[0].innerHTML = xmlhttp.responseText;
      }
  };
  var username = localStorage['username'];
  var pass = localStorage['pass'];
  xmlhttp.open("POST", "PDF.php?username="+username+"&pass="+pass, true);
  xmlhttp.send();
}
