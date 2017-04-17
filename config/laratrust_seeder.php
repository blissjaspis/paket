<?php

return [
    'role_structure' => [
        'administrator' => [
            'paket' => 'c,r,u,d',
            'laporan' => 'c,r,u,d',
            'user' => 'c,r,u,d'
        ],
        'user' => [
            'laporan' => 'c,r,u'
        ],
    ],
    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
