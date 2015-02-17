<?php
return [
    'routes' => [
        [
            'pattern' => '/:controller/:action/:int',
            'params' => [
                'controller' => 'foo',
                'action' => 'bar',
            ],
        ],
        [
            'pattern' => 'admin/:controller/:action/:int',
            'params' => [
                'module' => 'admin',
                'controller' => 'index',
                'action' => 'index',
            ],
        ],
    ],
];