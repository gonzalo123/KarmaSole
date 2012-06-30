<?php

class KarmacracyApiProxy
{
    private $host = 'http://kcy.me/api/';
    private $key;

    const HTTP_OK = 200;

    public function __construct($key, $user)
    {
        $this->key = $key;
        $this->user = $user;
    }

    public function shortUrl($url)
    {
        $queryString = array(
            'u' => $this->user,
            'key' => $this->key,
            'url' => $url,
            'format' => 'json'
        );

        $data = $this->get($this->host, $queryString);
        return $data['data']['url'];
    }

    private function get($url, $queryString)
    {
        $s = curl_init();
        curl_setopt($s, CURLOPT_URL, $url . '?' . http_build_query($queryString));
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
