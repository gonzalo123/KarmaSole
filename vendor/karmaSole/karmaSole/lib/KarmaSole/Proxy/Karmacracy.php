<?php
namespace KarmaSole\Proxy;

use KarmaSole\Curl;

class Karmacracy
{
    private $host = 'http://karmacracy.com/api/v1/';
    private $key;

    public function __construct(\Pimple $container)
    {
        $this->key        = $container['conf']['karma_key'];
        $this->curlClient = $container['CurlClient'];
    }

    public function info($kcy)
    {
        $cleanKcy = str_replace('http://kcy.me/', NULL, $kcy);
        $data     = $this->curlClient->get($this->host . "kcy/$cleanKcy/", array('appkey' => $this->key));
        return $data['data'];
    }
}