<?php

class KarmacracyProxy
{
    private $host = 'http://karmacracy.com/api/v1/';
    private $key;

    const HTTP_OK = 200;

    public function __construct($key)
    {
        $this->key = $key;
    }

    public function info($kcy)
    {
        $queryString = array(
            'appkey' => $this->key
        );

        $kcy = str_replace('http://kcy.me/','',$kcy);

        $data = $this->get($this->host . "kcy/$kcy/", $queryString);
        return $data['data'];
    }

    private function get($url, $queryString)
    {
        $s = curl_init();
        $curlopt_url = $url . '?' . http_build_query($queryString);
        echo $curlopt_url;
        curl_setopt($s, CURLOPT_URL, $curlopt_url);
        curl_setopt($s, CURLOPT_RETURNTRANSFER, true);
        $out = curl_exec($s);
        $status = curl_getinfo($s, CURLINFO_HTTP_CODE);
        curl_close($s);

        if ($status != self::HTTP_OK) {
            throw new \Exception("http error: {$status}", $status);
        }
        return json_decode($out, true);
    }
}
