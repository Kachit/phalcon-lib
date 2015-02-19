<?php
return [
    'module' => [
        'loader' => [
            'namespaces' => [
                'Module\Backend\Controllers' => __DIR__ . '/../controllers/',
                'Module\Backend\Models' => __DIR__ . '/../models/',
            ],
        ],

        'view' => [
            'viewsDir' => __DIR__ . '/../views/',
            'engines' => [
                '.volt' => 'volt',
            ]
        ],

        'services' => [
            'foo' => 'bar',
        ],
    ],
];