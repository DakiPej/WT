var ajax = new XMLHttpRequest();
	ajax.onreadystatechange = function() {// Anonimna funkcija
		if (ajax.readyState == 4 && ajax.status == 200)
      document.getElementById("page").innerHTML = ajax.responseText;
}

	function loadDiv(l){
  ajax.open("GET", l, true);
	ajax.send();
  document.getElementsByName("link")[0].remove(0);

	return false;
}
