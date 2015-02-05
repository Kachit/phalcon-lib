<?php
/* @var Composer\Autoload\ClassLoader $autoloader */
$autoloader = include __DIR__ . '/../vendor/autoload.php';
$autoloader->add('Kachit\Phalcon\Tests', __DIR__);
$autoloader->add('Kachit\Phalcon\Testable', __DIR__);

$di = new Phalcon\DI\FactoryDefault();
$di->set('config', function (){
    new Phalcon\Config();
});
$factory = new Kachit\Phalcon\ServiceProvider\Factory($di);
$session = $factory->getProvider('session');