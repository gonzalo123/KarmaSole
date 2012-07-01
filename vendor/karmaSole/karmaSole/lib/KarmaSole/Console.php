<?php
namespace KarmaSole;

class Console
{
    private $proxy;
    private $kProxy;

    public function __construct(\Pimple $container)
    {
        $this->kProxy = $container['kProxy'];
        $this->proxy  = $container['proxy'];
    }

    function shorten($url)
    {
        $info = $this->proxy->info($this->kProxy->shortUrl($url));
        return array(
            "shorturl"  => $info['kcy']['shorturl'],
            "mykcytype" => $info['kcy']['mykcytype'],
            "mykcytype" => $info['kcy']['mykcytype'],
            "mykclicks" => $info['kcy']['mykclicks'],
            "humans"    => $info['kcy']['kcyedhumans']['human']
        );
    }
}