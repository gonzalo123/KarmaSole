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