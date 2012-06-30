<?php

class Karmacracy
{
    private $proxy;

    public function __construct(KarmacracyApiProxy $proxy)
    {
        $this->proxy = $proxy;
    }

    function short($url)
    {
        return $this->proxy->shortUrl($url);
    }
}