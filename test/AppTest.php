<?php
include(__DIR__ . '/../src/KarmaSole.php');
include(__DIR__ . '/../src/KcyProxy.php');
include(__DIR__ . '/../src/CurlClient.php');
include(__DIR__ . '/../src/KarmacracyProxy.php');

class AppTest extends PHPUnit_Framework_TestCase
{
    public function test_karmasole_obtiene_toda_la_info_de_un_link_compartido()
    {
        $conf = include(__DIR__ . '/../conf/config.php');
        $kcy = new KarmaSole(new KcyProxy($conf['short_key'], $conf['short_user']));
        $info = $kcy->short("http://programania.net");

        $this->assertTrue(count($info['humans']) > 0);
        $this->assertTrue(isset($info['mykclicks']));
        $this->assertTrue(isset($info['mykcytype']));
    }

    public function test_karmacracy_proxy_retorna_info()
    {
        $proxy = new KarmacracyProxy('katayuno');
        $info = $proxy->info("http://kcy.me/9iic");

        $this->assertTrue(count($info['kcy']['kcyedhumans']) > 0);
        $this->assertTrue(isset($info['kcy']['mykclicks']));
        $this->assertTrue(isset($info['kcy']['mykcytype']));
    }
}
