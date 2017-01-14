function obrisiMe(id){
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        location.reload();
    }
  };

  xmlhttp.open("POST", "brisemVijest.php?username="+localStorage['username']+"&pass="+localStorage['pass']+"&id="+id, true);
  xmlhttp.send();
}

function editujMe(id){
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        window.open("admin.php  ");
    }
  };
  xmlhttp.open("POST", "editujMe.php?username="+localStorage['username']+"&pass="+localStorage['pass']+"&id="+id, true);
  xmlhttp.send();
}

function potvrdiIzmjene(id){
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        location.reload();
    }
  };

  xmlhttp.open("POST", "potvrdiIzmjene.php?username="+localStorage['username']+"&pass="+localStorage['pass']+"&id="+id, true);
  xmlhttp.send();
}

function dodajVijest(id){
  window.open("admin.php");
}

function generisiCSV(){
  window.location = "CSV.php";
}
function generisiPDF(){
  window.location = "PDF.php";
}

function XMLuBazu(){
  var xmlhttp = new XMLHttpRequest();

  xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        alert("uspjesno prebacen XML u bazu");
        location.reload();
    }
  };

  xmlhttp.open("GET", "XMLBaza.php", true);
  xmlhttp.send();
}
