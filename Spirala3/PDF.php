
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

$dir = "users/";

$dh  = opendir($dir);
while (false !== ($filename = readdir($dh))) {
    if(strpos($filename,".xml")) $files[] = $filename;
}

$korisnici = array();
$headings = array('ime', 'prezime', 'grad', 'adresa', 'mail', 'role');
$i = count($files)-1;
for($i; $i>=0; $i--) {
  $citaj = simplexml_load_file("Users/".$files[$i]);
  array_push($korisnici, array($citaj->ime, $citaj->prezime, $citaj->grad, $citaj->adresa, $citaj->email, $citaj->role));
}
$pdf->BasicTable($headings, $korisnici);


date_default_timezone_set("Europe/Belgrade");

$pdf->SetTextColor(0,0,100);
$pdf->SetFont('Courier','B',14);
$pdf->Cell(195,20,'CarMagazine',0,1,'L');
$pdf->SetFont('Courier','',12);
$pdf->Cell(40,10,'Dokument je kreiran:'.' '.date("d.m.Y").'.',0,2,'L');
$pdf->Cell(40,10,'Broj registrovanih korisnika: '.(count($files)).'.',0,2,'L');


$pdf->Output('sviKorisnici.pdf','I');



?>
