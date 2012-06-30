<?php

include(__DIR__ . '/../src/KarmaSole.php');
include(__DIR__ . '/../src/KcyProxy.php');
include(__DIR__ . '/../src/CurlClient.php');
include(__DIR__ . '/../src/KarmacracyProxy.php');

$handle = fopen('php://stdin', 'r');
$count = 0;
$conf = include(__DIR__ . '/../conf/config.php');
$kcy = new KarmaSole($conf['short_key'], $conf['short_user'],$conf['karma_key']);

function printter($buffer, $result){
    $text =  "\n";
    $text .= " $buffer";
    $text .= "mykcytype" . $result["mykcytype"] . "\n";
    $text .= "mykclicks" . $result["mykclicks"] . "\n";
    foreach ($result["humans"] as $human){
        $text .= "$human \n";;
    }

    $text .= "\n\n";
    return $text;
}

while (!feof($handle)) {
    $buffer = fgets($handle);
    $result = $kcy->short($buffer);
    $count++;
    echo printter($buffer, $result);
}
fclose($handle);