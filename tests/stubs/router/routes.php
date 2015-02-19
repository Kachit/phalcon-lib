<?php
return [
    'routes' => [
        [
            'pattern' => '/:controller/:action/:params',
            'name' => 'fifi',
            'params' => [
                'controller' => 1,
                'action' => 2,
                'params' => 3,
            ]
        ],
    ],

    'groups' => [
        [
            'module' => 'api',
            'namespace' => 'Module\API\Controllers',
            'name' => 'api',
            'prefix' => '/api',
            'routes' => [
                [
                    'pattern' => '/:controller/:int',
                    'methods' => ['GET'],
                    'params' => [
                        'controller' => 1,
                        'action' => 'get',
                        'id' => 2,
                    ]
                ],

                [
                    'pattern' => '/:controller',
                    'methods' => ['GET'],
                    'name' => 'get-all',
                    'params' => [
                        'controller' => 1,
                        'action' => 'index',
                    ]
                ],

                [
                    'pattern' => '/:controller',
                    'methods' => ['POST'],
                    'params' => [
                        'controller' => 1,
                        'action' => 'add',
                    ]
                ],

                [
                    'pattern' => '/:controller/:int',
                    'methods' => ['PUT'],
                    'params' => [
                        'controller' => 1,
                        'action' => 'edit',
                        'id' => 2,
                    ]
                ],

                [
                    'pattern' => '/:controller/:int',
                    'methods' => ['DELETE'],
                    'params' => [
                        'controller' => 1,
                        'action' => 'delete',
                        'id' => 2,
                    ]
                ],
            ]
        ],
    ]
];
