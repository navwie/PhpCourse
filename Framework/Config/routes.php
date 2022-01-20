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
    '^changeDataAdmin$' => [
        'controller' => 'Admin',
        "action" => "changeDataAdmin"
    ],
    '^addProduct$' => [
        'controller' => 'Admin',
        "action" => "addProduct"
    ],
    '^verification$' => [
        'controller' => 'registration',
        "action" => "verification"
    ],
    '^createJewelry$' => [
        'controller' => 'jewelry',
        "action" => "createJewelry"
    ],
    '^changeUser$' => [
        'controller' => 'user',
        "action" => "changeUser"
    ],
    '^changeAdmin$' => [
        'controller' => 'admin',
        "action" => "changeAdmin"
    ],
    '^changeJewelry$' => [
        'controller' => 'jewelry',
        "action" => "changeJewelry"
    ],
    '^admin$' => [
        'controller' => 'admin',
        "action" => "index"
    ],
    '^mainUser$' => [
        'controller' => 'User',
        "action" => "main"
    ],
    '^mainAdmin$' => [
        'controller' => 'Admin',
        "action" => "main"
    ],
    '^deleteJewelry$' => [
        'controller' => 'jewelry',
        "action" => "deleteJewelry"
    ],
    '^updateJewelry$' => [
        'controller' => 'jewelry',
        "action" => "updateJewelry"
    ],
    '^adminCatalog$' => [
        'controller' => 'admin',
        "action" => "adminCatalog"
    ],
    '^userCatalog$' => [
        'controller' => 'user',
        "action" => "userCatalog"
    ],
    '^search$' => [
        'controller' => 'jewelry',
        "action" => "search"
    ],
    '^searchAdminPage$' => [
        'controller' => 'admin',
        "action" => "search"
    ],
    '^searchUserPage$' => [
        'controller' => 'user',
        "action" => "search"
    ],
    '^sort$' => [
        'controller' => 'jewelry',
        "action" => "sort"
    ],
    '^sortAdminPage$' => [
        'controller' => 'admin',
        "action" => "sort"
    ],
    '^sortUserPage$' => [
        'controller' => 'user',
        "action" => "sort"
    ],
    '^basket$' => [
        'controller' => 'basket',
        "action" => "basket"
    ],
    '^addProductToBasket$' => [
        'controller' => 'basket',
        "action" => "addProductToBasket"
    ],
    '^deleteProductToBasket$' => [
        'controller' => 'basket',
        "action" => "deleteProductToBasket"
    ],
];
