<?php

return [
    'roles' => [
        'developer',
        'administrator',
        'user',
    ],
    'permissions' => [
        'setting'   => ['developer', 'administrator'],
        'passport'  => ['developer'],
        'user'      => ['developer', 'administrator'],
        'event'     => ['developer', 'administrator'],
        'subscribe' => ['developer', 'administrator', 'user'],
        'acl'       => ['developer', 'administrator'],
    ],
    'actions' => [
        'index', 'show',
        'create', 'store',
        'edit', 'update',
        'destroy',
    ],
];
