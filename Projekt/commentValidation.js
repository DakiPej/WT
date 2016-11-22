function commentV() {
  var b = true;
  document.getElementById("validation").innerHTML = "";

  var _username = document.forms["formComment"]["username"].value;
  var regexUsername = /^[a-z|A-Z|0-9]{3,25}$/;
  if(_username == "" || _username == undefined || !regexUsername.test(_username)){
    var usernameStyle = document.getElementsByName("username");
    var i;
    for(i = 0; i<usernameStyle.length; i++){
      usernameStyle[i].style.backgroundColor = "red";
    }
    document.getElementById("validation").innerHTML = "Korisnicko ime mora imati 3 karaktera <br>"
    b=false;
  }

  var commentText = document.forms["formComment"]["commentText"].value;
  if(commentText.length < 1){
    var commentTextStyle = document.getElementsByName("commentText");
    var i;
    for(i = 0; i<commentTextStyle.length; i++){
      commentTextStyle[i].style.backgroundColor = "red";
    }
    b=false;
  }
  return b;
}

function subscribeV() {
  var _test = 0;
  document.getElementById("validation").innerHTML = "";

  var ime = document.forms["signUp"]["ime"].value;
  var imeR = /^[a-z|A-Z]{3,15}$/;
  if(ime == "" || ime == undefined || !imeR.test(ime)){
    var tmp = document.getElementById("ime");
    tmp.style.backgroundColor = "red";
    document.getElementById("validation").innerHTML += "Ime mora imati barem 3 karaktera <br>";
    _test = 1;
  }

  var prezime = document.forms["signUp"]["prezime"].value;
  var prezimeR = /^[a-z|A-Z]{3,15}$/;
  if(prezime == "" || prezime == undefined || !prezimeR.test(prezime)){
    var tmp = document.getElementById("prezime");
    tmp.style.backgroundColor = "red";
    document.getElementById("validation").innerHTML += "Prezime mora imati barem 3 karaktera <br>";
    _test = 1;
  }

  var grad = document.forms["signUp"]["grad"].value;
  var gradR = /^[a-z|A-Z]{3,20}$/;
  if(grad == "" || grad == undefined || !gradR.test(grad)){
    var tmp = document.getElementById("grad");
    tmp.style.backgroundColor = "red";
    document.getElementById("validation").innerHTML += "Naziv grada mora imati barem 3 karaktera <br>";
    _test = 1;
  }

  var adresa = document.forms["signUp"]["adresa"].value;
  var adresaR = /^[a-z|A-Z]{3,15}$/;
  if(adresa == "" || adresa == undefined || !adresaR.test(adresa)){
    var tmp = document.getElementById("adresa");
    tmp.style.backgroundColor = "red";
    document.getElementById("validation").innerHTML += "Adresa mora imati barem 3 karaktera <br>";
    _test = 1;
  }

  var korIme = document.forms["signUp"]["korisnickoIme"].value;
  var korImeR = /^[a-z|A-Z|0-9]{3,20}$/;
  if(korIme == "" || korIme == undefined || !korImeR.test(korIme)){
    var tmp = document.getElementById("korisnickoIme");
    tmp.style.backgroundColor = "red";
    document.getElementById("validation").innerHTML += "korisnicko ime mora imati barem 3 karaktera <br>";
    _test = 1;
  }

  var lozinka = document.forms["signUp"]["lozinka"].value;
  var lozinkaR = /^[a-z|A-Z|0-9]{8,20}$/;
  if(lozinka == "" || lozinka == undefined || !lozinkaR.test(lozinka)){
    var tmp = document.getElementById("lozinka");
    tmp.style.backgroundColor = "red";
    document.getElementById("validation").innerHTML += "Lozinka mora imati barem 8 karaktera <br>";
    _test = 1;
  }

  if(_test == 1){return false;}
  return true;
}


function signInV() {
  var _test = 0;
  document.getElementById("validation").innerHTML = "";

  var ime = document.forms["signIn"]["username"].value;
  var imeR = /^[a-z|A-Z]{3,15}$/;
  if(ime == "" || ime == undefined || !imeR.test(ime)){
    var tmp = document.getElementById("username");
    tmp.style.backgroundColor = "red";
    document.getElementById("validation").innerHTML += "Ime mora imati barem 3 karaktera <br>";
    _test = 1;
  }

  var lozinka = document.forms["signIn"]["lozinka"].value;
  var lozinkaR = /^[a-z|A-Z|0-9]{8,20}$/;
  if(lozinka == "" || lozinka == undefined || !lozinkaR.test(lozinka)){
    var tmp = document.getElementById("lozinka");
    tmp.style.backgroundColor = "red";
    document.getElementById("validation").innerHTML += "Lozinka ima minimalno 8 karaktera";
    _test = 1;
  }
  if(_test == 1) return false;
  else return true;
}
