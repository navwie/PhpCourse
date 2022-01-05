<?php

return [
    '^$' => [
        'controller' => 'main',
        "action" => "main"
    ],
    '^login$' => [
        'controller' => 'authentication',
        "action" => "login"
    ],
    '^loginService$' => [
        'controller' => 'authentication',
        "action" => "loginService"
    ],
    '^logOut$' => [
        'controller' => 'authentication',
        "action" => "logOut"
    ],
    '^profile$' => [
        'controller' => 'authentication',
        "action" => "profile"
    ],
    '^register$' => [
        'controller' => 'registration',
        "action" => "register"
    ],
    '^changeDataUser$' => [
        'controller' => 'User',
        "action" => "changeDataUser"
    ],
    '^addProduct$' => [
        'controller' => 'User',
        "action" => "addProduct"
    ],
    '^verification$' => [
        'controller' => 'registration',
        "action" => "verification"
    ],
    '^addBook$' => [
        'controller' => 'jewelry',
        "action" => "addBook"
    ],
    '^changeUser$' => [
        'controller' => 'user',
        "action" => "changeUser"
    ],

];
