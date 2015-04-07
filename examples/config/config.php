<?php
return [
    //Application modules list
    'modules' => [
        'foo' => [
            'className' => 'Module\Foo\Module',
            'path' => 'foo/Module.php',
            'routes' => 'foo/config/routes.php'
        ],
    ],

    //DI services
    'services' => [
        'database',
        'session',
        'volt',
        'router',
        'loader',
    ],

    //Concrete service settings
    'session' => [
        'adapter'  => 'Files',
    ],

    'database' => [
        'adapter'  => 'Mysql',
        'host'     => 'localhost',
        'username' => 'user',
        'password' => 'password',
        'dbname'   => 'database',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        ]
    ],

    //Application settings
    'application' => [
        'debug' => false,
        'defaultController' => 'index',
        'defaultAction' => 'index',
        'defaultModule' => 'foo',
        'defaultNamespace' => 'Module\Foo\Controllers',
    ],

    'router' => [
        'removeExtraSlashes' => true,
        'enableDefaultRoutes' => true,
    ],

    //Additional libraries load path
    'loader' => [
        'namespaces' => [
            'Common\Models' => 'models/',
            'Common\Services' => 'services/',
        ]
    ],

    'cache' => [
        'frontend' => [
            'adapter' => 'Data',
        ],
        'backend' => [
            'adapter' => 'File',
            'cacheDir' => '',
        ],
    ],

    'volt' => [
        'compiledPath' => 'volt/',
        'compiledExtension' => '.compiled',
        'compileAlways' => true,
    ],

    'environment' => [
        'error_reporting' => -1,
    ],
];