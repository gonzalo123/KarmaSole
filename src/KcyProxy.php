<?php

class KcyProxy
{
    private $host = 'http://kcy.me/api/';
    private $key;

    const HTTP_OK = 200;

    public function __construct($key, $user)
    {
        $this->key = $key;
        $this->user = $user;
        $this->curlClient = new CurlClient();
    }

    public function shortUrl($url)
    {
        $queryString = array(
            'u' => $this->user,
            'key' => $this->key,
            'url' => $url,
            'format' => 'json'
        );

        $data = $this->curlClient->get($this->host, $queryString);
        return $data['data']['url'];
    }
}
