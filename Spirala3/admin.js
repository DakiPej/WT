function ucitajPretragu(pretraga) {
  var xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("livesearch").innerHTML = "";
        document.getElementById("livesearch").style.border="1px solid #A5ACB2";
        document.getElementById("livesearch").style.fontSize = "small";
        var niz =  this.responseText.split(" ");
        for(var i=0; i<niz.length; i = i+2){
          document.getElementById("livesearch").innerHTML = document.getElementById("livesearch").innerHTML + "<p>" + niz[i] + " " + niz[i+1] + "</p><br>";
          if(i>20) break;
        }
      }
  };
  xmlhttp.open("POST", "ucitajPretragu.php?pretraga="+pretraga+"&user="+localStorage['username']+"&pass="+localStorage['pass'], true);
  xmlhttp.send();
}

function ucitajSve(){
  var pretraga = document.forms["form"]["pretraga"].value;
  var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        var niz =  this.responseText.split(" ");
        var text = " ";
        for(var i=0; i<niz.length; i = i+2){
           text = text + "<p>" + niz[i] + " " + niz[i+1] + "</p><br>";
        }
        var prozor = window.open("", "Pretraga po " + pretraga,"width=200,height=500");
        prozor.document.write(text);
      }
  };

  xmlhttp.open("POST", "ucitajPretragu.php?pretraga="+pretraga+"&user="+localStorage['username']+"&pass="+localStorage['pass'], false);
  xmlhttp.send();
}
