<?php
/* @var Composer\Autoload\ClassLoader $autoloader */
$autoloader = include __DIR__ . '/../vendor/autoload.php';
$autoloader->add('Kachit\Phalcon\Tests', __DIR__);
$autoloader->add('Kachit\Phalcon\Testable', __DIR__);