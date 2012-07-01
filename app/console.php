#!/usr/bin/env php
<?php
include(__DIR__ . '/autoload.php');

use KarmaSole\KarmaCommand;
use KarmaSole\Container;
use Symfony\Component\Console\Application;

$container = new Container();
$container['conf'] = include(__DIR__ . '/../conf/config.php');

$application = new Application();
$application->add(new KarmaCommand($container));
$application->run();