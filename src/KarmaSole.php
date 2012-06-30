<?php

class KarmaSole
{
    private $proxy;
    private $kProxy;

    public function __construct($kcyKey,$kcyUser,$karmaKey)
    {
        $this->proxy = new KcyProxy($kcyKey, $kcyUser);
        $this->kProxy = new KarmacracyProxy($karmaKey);
    }

    function short($url)
    {
        $kcy = $this->proxy->shortUrl($url);
        $info = $this->kProxy->info($kcy);
        $humanTxts = $this->normalizeHumanInformation($info);
        return array(
            "mykcytype" => $info['kcy']['mykcytype'], "mykclicks" => $info['kcy']['mykclicks'], "humans" => $humanTxts
        );
    }

    private function normalizeHumanInformation($info)
    {
        $humans = $info['kcy']['kcyedhumans']['human'];
        $humanTxts = array();
        foreach ($humans as $human) {
            $humanTxt = "user: " . $human["username"] . " - ";
            $humanTxt .= "rank : " . $human["kcyrank"];
            $humanTxts[] = $humanTxt;
        }
        return $humanTxts;
    }

}