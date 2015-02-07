<?php
/* @var Composer\Autoload\ClassLoader $autoloader */
$autoloader = include __DIR__ . '/../vendor/autoload.php';

$config = [
    'session' => [
        'adapter' => 'files'
    ],
    'database' => [
        'adapter'  => 'Mysql',
        'host'     => 'psfc.loc',
        'username' => 'mysql',
        'password' => 'mysql',
        'dbname'   => 'mysql',
    ],
];

$di = new Phalcon\DI\FactoryDefault();
$di->set('config', function () use ($config){
    return new Phalcon\Config($config);
});
$factory = new Kachit\Phalcon\ServiceProvider\Factory($di);
$provider = $factory->getProvider('database');
$provider->register();

$session = $di->get('db');
var_dump($session);