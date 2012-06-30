<?php


class CurlClient
{
    const HTTP_OK = 200;

    public function get($url, $queryString)
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

        $kcy = str_replace('http://kcy.me/', '', $kcy);

        $data = $this->curlClient->get($this->host . "kcy/$kcy/", $queryString);
        return $data['data'];
    }


}