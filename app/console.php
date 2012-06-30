<?php

include(__DIR__ . '/../src/KarmaSole.php');
include(__DIR__ . '/../src/KcyProxy.php');

$handle = fopen('php://stdin', 'r');
$count = 0;
$conf = include(__DIR__ . '/../conf/config.php');
$kcy = new KarmaSole(new KcyProxy($conf['short_key'], $conf['short_user']));

while (!feof($handle)) {
    $buffer = fgets($handle);
    $result = $kcy->short($buffer);
    $count++;
    echo "\n $count : $buffer --> $result \n\n";
}
fclose($handle);