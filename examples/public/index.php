<?php
$config = [];

$bootstrap = new \Kachit\Phalcon\Bootstrap\Mvc($config);
$application = $bootstrap->registerApplication();