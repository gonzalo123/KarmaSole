<?php
use KarmaSole\Console;
use KarmaSole\Proxy;
use KarmaSole\Container;

class KarmasoleTest extends PHPUnit_Framework_TestCase
{
    public function test_karmasole_obtiene_toda_la_info_de_un_link_compartido()
    {
        $container = $this->getContainer();
        $kcy       = new Console($container);
        $info      = $kcy->shorten("http://programania.net");

        $this->assertTrue(count($info['humans']) > 0);
        $this->assertTrue(isset($info['mykclicks']));
        $this->assertTrue(isset($info['mykcytype']));
    }

    public function test_karmacracy_proxy_retorna_info()
    {
        $container = $this->getContainer();
        $proxy     = new Proxy\Karmacracy($container);
        $info      = $proxy->info("http://kcy.me/9iic");

        $this->assertTrue(count($info['kcy']['kcyedhumans']) > 0);
        $this->assertTrue(isset($info['kcy']['mykclicks']));
        $this->assertTrue(isset($info['kcy']['mykcytype']));
        $this->assertTrue(isset($info['kcy']['shorturl']));
    }

    private function getContainer()
    {
        $container         = new Container();
        $container['conf'] = array(
            'short_key'  => '{{your_short_key}}',
            'short_user' => '{{your_short_user}}',
            'karma_key'  => '{{your_karma_key}}'
        );
        return $container;
    }
}
