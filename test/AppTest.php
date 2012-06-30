<?php

include(__DIR__ . '/../src/Karmacracy.php');
include(__DIR__ . '/../src/KarmacracyApiProxy.php');

class AppTest extends PHPUnit_Framework_TestCase
{

    public function test_de_prueba()
    {

        $conf = include(__DIR__ . '/../conf/config.php');
        $kcy = new Karmacracy(new KarmacracyApiProxy($conf['short_key']));
        $result = $kcy->short("http://google.com");
        $this->assertEquals("http://kcy.me/9ihr", $result);
    }

}
