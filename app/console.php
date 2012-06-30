<?php

include( __DIR__ .'/../src/Karmacracy.php');

$handle = fopen('php://stdin', 'r');
$count = 0;
$karmacracy = new Karmacracy();
while(!feof($handle)) {
    $buffer = fgets($handle);
    $result = $karmacracy->short($buffer);
    echo $count++, ": ", $result;
}
fclose($handle);