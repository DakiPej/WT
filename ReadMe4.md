Stranica sa novostima iz automobilske industrije

# Spirala 4
## I i II - Šta je uradeno i šta nije uradeno?
Napravljena je MySQL baza sa tri povezane tabele (vijesti, user i komentari) i tabela pregledVijesti.

Napravljena je skripta koja prebacuje podatke iz index.xml, pregledAuta.xml i svih korisnika u bazu
pomocu klika na dugme koje je moguce vidjeti na dnu stranice index.html samo ako je korisnik logovan kao admin
(usernamme: Daki, password:12345678). Skripta ce ubaciti podatke iz XMLa kojih nema u bazi.

Sve .php skripte (osim skripte za citanje hotVijesti) citaju/snimaju podatke iz/u bazu podataka.

Napravljen je hosting stranice na OpenShift (bez baze podataka)
link: http://carmagazinegit-car-magazine.44fs.preview.openshiftapps.com/

Napravljena je metoda REST koja vraca podatke u obliku JSON-a (testirano u RESTService.html)

## III i IV Bugovi


## V  - Lista fajlova u formatu NAZIVFAJLA

XMLBaza.php - prebacuje sve iz XMLa u bazu

RESTService.php - servis za vracanje vijesti sa naslovom, tekstom i autorom

#DODATAK 

REST servisu se prosljedjuje parametar "param" (opcionalno) za prikupljanje vijesti odredjenog autora.
REST servis vraca podatke o naslovima, autorima i tekstovima vijesti. U slucaju da se proslijedi i parametar "param"
koji treba da ima naziv nekog autora, vracaju se podaci o vijestima proslijedenog autora. 

Prilozene su 3 screenshota u folderu "REST_Service_Screenshot" koji demonstriraju rad ovog servisa.
