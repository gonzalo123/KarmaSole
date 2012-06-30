<?php

class KarmaSole
{
    private $proxy;

    public function __construct(KcyProxy $proxy)
    {
        $this->proxy = $proxy;
    }

    function short($url)
    {
        $kcy = $this->proxy->shortUrl($url);
        list($info, $humanTxts) = $this->getInfoOfKcy($kcy);
        return array(
            "mykcytype" => $info['kcy']['mykcytype'], "mykclicks" => $info['kcy']['mykclicks'], "humans" => $humanTxts
        );
    }

    private function getInfoOfKcy($kcy)
    {
        $proxy = new KarmacracyProxy('katayuno');
        $info = $proxy->info($kcy);
        $humanTxts = $this->normalizeHumanInformation($info);
        return array($info, $humanTxts);
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