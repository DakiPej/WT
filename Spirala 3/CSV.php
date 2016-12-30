<?php

function array_to_csv_download($array, $filename = "export.csv", $delimiter=",") {
    // open raw memory as file so no temp files needed, you might run out of memory though
    $f = fopen('php://output', 'w');

    $headings = array('id', 'img', 'naslov', 'text');

    fputcsv($f, $headings, $delimiter);

    // loop over the input array
    foreach ($array as $line) {
        // generate csv lines from the inner arrays
        fputcsv($f, $line, $delimiter);
    }
    // reset the file pointer to the start of the file
    // tell the browser it's going to be a csv file
    header('Content-Type: application/csv');
    // tell the browser we want to save it instead of displaying it
    header('Content-Disposition: attachment; filename="'.$filename.'";');
    // make php send the generated csv lines to the browser
    fpassthru($f);
}

$array = array();

$xml=simplexml_load_file("index.xml") or die("Error: Cannot create object"  );

foreach($xml as $v){
    if(empty($v->id)) {
        // Do nothing
    }
    else{
        array_push($array, array($v->id, $v->img, $v->p, $v->text));
    }
}

array_to_csv_download(
    $array,
    "vijesti.csv"
);
