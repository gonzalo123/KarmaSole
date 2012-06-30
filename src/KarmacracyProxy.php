<?php
class KarmacracyProxy
{
    private $host = 'http://karmacracy.com/api/v1/';
    private $key;

    public function __construct($key)
    {
        $this->key = $key;
        $this->curlClient = new CurlClient();
    }

    public function info($kcy)
    {
        $queryString = array(
            'appkey' => $this->key
        );
        $cleanKcy = str_replace('http://kcy.me/', '', $kcy);
        $data = $this->curlClient->get($this->host . "kcy/$cleanKcy/", $queryString);
        return $data['data'];
    }
}