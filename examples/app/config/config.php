<?php
return [
    'modules' => [
        'backend' => [
            'className' => 'Module\Backend\Module',
            'path' => 'modules/backend/Module.php'
        ],
        'frontend' => [
            'className' => 'Module\Frontend\Module',
            'path' => 'modules/frontend/Module.php'
        ],
        'api' => [
            'className' => 'Module\API\Module',
            'path' => 'modules/api/Module.php'
        ],
    ],
    'database' => [
        'adapter'  => 'Mysql',
        'host'     => 'psfc.loc',
        'username' => 'mysql',
        'password' => 'mysql',
        'dbname'   => 'adult_fight_club',
    ],
    'application' => [
        'debug' => false,
        'defaultController' => 'index',
        'defaultAction' => 'index',
        'defaultModule' => 'backend',
        'defaultNamespace' => 'Module\Backend\Controllers',
    ],
    'loader' => [
        'Common\Models' => '/models/',
        'Common\Services' => '/services/',
    ],
    'volt' => [
        'compiledPath' => 'cache/volt/',
        'compiledExtension' => '.compiled',
        'compileAlways' => true,
    ],
    'environment' => [
        'error_reporting' => -1,
    ],
];