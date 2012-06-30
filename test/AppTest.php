<?php
include(__DIR__ . '/../src/Karmacracy.php');
include(__DIR__ . '/../src/KcyProxy.php');

class AppTest extends PHPUnit_Framework_TestCase
{
    public function test_de_prueba()
    {
        $conf = include(__DIR__ . '/../conf/config.php');
        $kcy = new Karmacracy(new KcyProxy($conf['short_key'], $conf['short_user']));
        $result = $kcy->short("http://programania.net");
        $this->assertEquals("http://kcy.me/9iic", $result);
    }

    public function _test_de_prueba2()
    {
        $conf = include(__DIR__ . '/../conf/config.php');
        $kcy = new Karmacracy(new KarmacracyApiProxy($conf['short_key'], $conf['short_user']));
        $result = $kcy->short("http://programania.net");
        $this->assertEquals("http://kcy.me/9iic", $result);
    }
}
