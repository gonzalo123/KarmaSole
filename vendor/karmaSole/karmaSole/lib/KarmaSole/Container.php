<?php
namespace KarmaSole;

class Container extends \Pimple
{
    public function __construct()
    {
        $this['proxy'] = function($c) {
            return new Proxy\Karmacracy($c);
        };

        $this['kProxy'] = function($c) {
            return new Proxy\Kcy($c);
        };

        $this['CurlClient'] = function($c) {
            return new Curl\Client();
        };
    }
}