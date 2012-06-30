<?php

class Karmacracy
{
    private $proxy;

    public function __construct(KcyProxy $proxy)
    {
        $this->proxy = $proxy;
    }

    function short($url)
    {
        return $this->proxy->shortUrl($url);
    }
}