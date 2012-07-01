<?php
namespace KarmaSole\Proxy;

class Kcy
{
    private $host = 'http://kcy.me/api/';
    private $key, $user, $curlClient;

    const HTTP_OK = 200;

    public function __construct(\Pimple $container)
    {
        $this->key        = $container['conf']['short_key'];
        $this->user       = $container['conf']['short_user'];
        $this->curlClient = $container['CurlClient'];
    }

    public function shortUrl($url)
    {
        $queryString = array(
            'u'      => $this->user,
            'key'    => $this->key,
            'url'    => $url,
            'format' => 'json'
        );

        $data = $this->curlClient->get($this->host, $queryString);
        return $data['data']['url'];
    }
}