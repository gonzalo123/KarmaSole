<?php
include(__DIR__ . '/../src/KarmaSole.php');
include(__DIR__ . '/../src/KcyProxy.php');
include(__DIR__ . '/../src/KarmacracyProxy.php');

class AppTest extends PHPUnit_Framework_TestCase
{
    public function test_de_prueba()
    {
        $conf = include(__DIR__ . '/../conf/config.php');
        $kcy = new KarmaSole(new KcyProxy($conf['short_key'], $conf['short_user']));
        $result = $kcy->short("http://programania.net");
        $this->assertEquals("http://kcy.me/9iic", $result);
    }

    public function test_de_prueba2()
    {
       $proxy = new KarmacracyProxy('katayuno');
        $info = $proxy->info("http://kcy.me/9iic");

        //var_dump($info);

        $this->assertTrue(count($info['kcy']['kcyedhumans']) > 0);


        /*
         *
         *   array(1) {
               ["human"]=>
               array(1) {
                 [0]=>
                 array(3) {
                   ["username"]=>
                   string(10) "gonzalo123"
                   ["img"]=>
                   string(65) "http://gravatar.com/avatar/6aa6fe484173856751a24135b4dd4586/?s=80"
                   ["kcyrank"]=>
                   string(3) "126"
                 }
               }
             }
             ["kclicks"]=>
             NULL
             ["mykclicks"]=>
             string(1) "0"
             ["mykcytype"]=>
             string(1) "2"
             ["traffic"]=>
             array(3) {
               ["kcyverse"]=>
               array(1) {
                 ["referer"]=>
                 array(0) {
         */
    }
}
