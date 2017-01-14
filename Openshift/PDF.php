
<?php

require('fpdf.php');

class pdf extends fpdf{
  // Simple table

  function Header()
  {
    // Logo
    $this->Image('pictures/logo.jpg',25,6,20);
    $this->Image('pictures/logo.jpg',170,6,20);
  }

  function BasicTable($header, $data){
    // Header
  foreach($header as $col) $this->Cell(30,6,$col,1,0, 'C');
    $this->Ln();
    // Data
    foreach($data as $row){
      foreach($row as $col)
        $this->Cell(30,5,$col,1,0,'C');
        $this->Ln();
    }
  }
}

//Kreira PDF objekt
$pdf=new PDF();

$pdf->Header =
//Postavke dokumenta
$pdf->SetAuthor('CarMagazine');
$pdf->SetTitle('Svi korisnici');

//Postavlja font za cijeli dokument
$pdf->SetFont('Courier','B',20);
$pdf->SetTextColor(0,0,100);

//Postavljanje stranice
$pdf->AddPage('P');

$pdf->SetDrawColor(0,0,0);
$pdf->Cell(0,10,'Registrovani korisnici',0,0,'C',0);

$pdf->SetTextColor(0,0,0);

$pdf->SetXY (10,40);
$pdf->SetFontSize(8);

#citanje podataka iz baze ----------------------------------------------
$veza = new PDO("mysql:dbname=".getenv("MYSQL_DATABASE").";host=".getenv("MYSQL_SERVICE_HOST"), getenv("MYSQL_USER"), getenv("MYSQL_PASSWORD"));
$veza->exec("set names utf8");
$korisnici = $veza->prepare("select username, ime, prezime, grad, adresa, email, uloga from user");
$korisnici->execute();

$redovi = array();
$headings = array('username', 'ime', 'prezime', 'grad', 'adresa', 'mail', 'role');

foreach ($korisnici as $k) {
  array_push($redovi, array($k['username'], $k['ime'], $k['prezime'], $k['grad'], $k['adresa'], $k['email'], $k['uloga']));
}

$pdf->BasicTable($headings, $redovi);
date_default_timezone_set("Europe/Belgrade");

$pdf->SetTextColor(0,0,100);
$pdf->SetFont('Courier','B',14);
$pdf->Cell(195,20,'CarMagazine',0,1,'L');
$pdf->SetFont('Courier','',12);
$pdf->Cell(40,10,'Dokument je kreiran:'.' '.date("d.m.Y").'.',0,2,'L');
$pdf->Cell(40,10,'Broj registrovanih korisnika: '.($korisnici->rowCount()).'.',0,2,'L');


$pdf->Output('sviKorisnici.pdf','I');



?>
