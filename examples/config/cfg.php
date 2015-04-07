<?php
return [
    //Application settings
    'application' => [
        'debug' => false,
        'defaultController' => 'index',
        'defaultAction' => 'index',
        'defaultModule' => 'foo',
        'defaultNamespace' => 'Module\Foo\Controllers',
    ],

    'environment' => [
        'develop' => [
            'error_reporting' => -1,
        ],
        'production' => [
            'error_reporting' => -1,
        ],
    ],

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
        'database' => [
            'className' => '',
            'shared' => true,
            'adapter'  => 'Mysql',
            'host'     => 'localhost',
            'username' => 'user',
            'password' => 'password',
            'dbname'   => 'database',
            'options' => [
                PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            ]
        ],

        'session' => [
            'adapter'  => 'Files',
        ],

        'router' => [
            'removeExtraSlashes' => true,
            'enableDefaultRoutes' => true,
        ],

        //Additional libraries load path
        'loader' => [
            'shared' => true,
            'namespaces' => [
                'Common\Models' => 'models/',
                'Common\Services' => 'services/',
            ]
        ],
    ],
];