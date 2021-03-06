My Phalcon library
===========
[![Coverage Status](https://coveralls.io/repos/Kachit/phalcon-lib/badge.svg)](https://coveralls.io/r/Kachit/phalcon-lib)
[![Build Status](https://travis-ci.org/Kachit/phalcon-lib.svg?branch=master)](https://travis-ci.org/Kachit/phalcon-lib)
[![Total Downloads](https://poser.pugx.org/kachit/phalcon-lib/downloads.svg)](https://packagist.org/packages/kachit/phalcon-lib)
[![Latest Stable Version](https://poser.pugx.org/kachit/phalcon-lib/v/stable.svg)](https://packagist.org/packages/kachit/phalcon-lib)
[![License](https://poser.pugx.org/leaphly/cart-bundle/license.svg)](https://packagist.org/packages/leaphly/cart-bundle)

Launch web application
------------------------

```php
<?php
$config = 'path/to/config/mvc/file.php';
$bootstrap = new Kachit\Phalcon\Bootstrap\Mvc($config);

$application = $bootstrap->registerApplication();

echo $application->handle()->getContent();
```

Launch console application
------------------------

```php
<?php
$config = 'path/to/config/cli/file.php';
$bootstrap = new Kachit\Phalcon\Bootstrap\Cli($config);

$application = $bootstrap->registerApplication();

$application->handle();
```
