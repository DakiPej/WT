Stranica sa novostima iz automobilske industrije

# Spirala 3
## I  - Šta je uradeno?
Koristeci PHP, uradjena je serializacija za sve podatke. Omogucen je unos (registracija) novih korisnika kao obicne
korisnike, unos, brisanje i prikazivanje vijesti (unos i brisanje je omoguceno samo za podatke iz index.xml datoteke).
Radjena je i validacija. 

Adminu je onoguceno skidanje podataka koji se prikazuju na pocetnoj stranici (index.html) u obliku csv-a.

Takodjer, adminu je omoguceno skidanje podataka u obliku pdf-a u kojem se prikazuju svi registrovani korisnici (bez 
prikaza njihove lozinke).

Uradjena je pretraga po imenu i prezimenu korisnika te klikom na dugme, u novom prozoru se prikazuju odgovarajuci rezultati pretrage. 

DODATAK: prilikom prijave na stranicu, ukoliko korisnik ima administratorske privilegije, njegova index.html stranica ce biti nesto
drugacija (prikazuju se odgovarajuci elementi za pravljenje nove vijesti, generisanje pdf-a, csv-a i brisanje vijesti na dnu stranice 
index.html).Pretraga korisnika je uradjena u admin.php podstranici koja se otvori prilikom zahtjeva za generisanjem nove vijesti.

## II  - Šta nije uradeno?
Nije uradjena izmjena podataka, XSS zastita, zadatak za dodatni poene.

## III i IV Bugovi
Bugovi nisu uoceni.

## V  - Lista fajlova u formatu NAZIVFAJLA
admin.css - css za admin.php (minimalan dizajn)

folder Users - folder sa xml datotekama u kojima se nalaze informacije korisnika.

admin.js - pretraga korisnika za zadatak 4

generisiPDF.js - visak

obrisiMe.js - (los naziv za file) XMLHttpRequest za brisanje, dodavanje vijesti i generisanje csv i pdf dokumenta

prijaviSe.js - priajva korisnika

ucitajVijesti.js - ucitavanje vijesti na stranicu (glavne i sporeden vijesti na index.hmtl
i pregledAuta.html)

uclaniSe.js - kreiranje novog korisnika (na ovaj nacin je moguce kreirati samo obicnog user-a) 

admin.php - panel za admina gdje je omogucena pretraga korisnika i generisanje nove nijesti

brisemVijest.php - brisanje vijesti

CSV.php - generisanje CSV-a

editujMe.php - visak

PDF.php - generisanje PDF-a

ucitajPretragu.php - pretraga korisnika po imenu i prezimenu

ucitajVijesti.php/ ucitajVijestiHot.php/ ucitajVijestiPregledAuta.php - ucitavanje podataka na stranicu

ucitajVijestiText.php - ucitavanje odgovarajuce vijesti

uclaniSe.php - generisanje novog korisnika

hotNews.xml/ index.xml /pregledAuta.xml - xml-ovi sa podacima
