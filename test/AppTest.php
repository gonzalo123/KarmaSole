<?php

include(__DIR__ . '/../src/Karmacracy.php');


class AppTest extends PHPUnit_Framework_TestCase
{

    public function test_de_prueba()
    {
        $kcy = new Karmacracy();
        $result = $kcy->short("http://google.com");
        $this->assertEquals("http://www.google.com", $result);
    }

}
