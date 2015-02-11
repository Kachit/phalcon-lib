phalcon-lib
===========
[![Coverage Status](https://coveralls.io/repos/Kachit/phalcon-lib/badge.svg)](https://coveralls.io/r/Kachit/phalcon-lib)
[![Build Status](https://travis-ci.org/Kachit/phalcon-lib.svg?branch=master)](https://travis-ci.org/Kachit/phalcon-lib)
[![License](https://poser.pugx.org/leaphly/cart-bundle/license.svg)](https://packagist.org/packages/leaphly/cart-bundle)

My Phalcon library

Launch web application

```php
<?php
$config = require 'path/to/config/mvc/file.php';
$bootstrap = new Kachit\Phalcon\Bootstrap\Mvc($config);

$application = $bootstrap->registerApplication();

echo $application->handle()->getContent();
```

Launch console application

```php
<?php
$config = require 'path/to/config/cli/file.php';
$bootstrap = new Kachit\Phalcon\Bootstrap\Cli($config);

$application = $bootstrap->registerApplication();

$application->handle();
```
