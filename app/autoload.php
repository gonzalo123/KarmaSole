<?php
require_once __DIR__ . '/../vendor/symfony/class-loader/Symfony/Component/ClassLoader/UniversalClassLoader.php';
use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->register();

$loader->registerNamespace('KarmaSole', __DIR__ . '/../vendor/karmaSole/karmaSole/lib');
$loader->registerNamespace('Symfony\\Component\\Console', __DIR__ . '/../vendor/symfony/console');

require_once __DIR__ . '/../vendor/pimple/pimple/lib/Pimple.php';


