<?php

return [

    '' => [
        'controller' => 'page',
        'action' => 'main',
    ],

    'product/new' => [
        'controller' => 'page',
        'action' => 'newProduct',
    ],

    'set/new' => [
        'controller' => 'page',
        'action' => 'newSet',
    ],

    'set/{id:\d+}' => [
        'controller' => 'page',
        'action' => 'set',
    ],

    'product/create' => [
        'controller' => 'product',
        'action' => 'create',
    ],

    'product/get' => [
        'controller' => 'product',
        'action' => 'get',
    ],

    'product/delete/{id:\d+}' => [
        'controller' => 'product',
        'action' => 'delete',
    ],

    'set/create' => [
        'controller' => 'set',
        'action' => 'create',
    ],

    'set/get' => [
        'controller' => 'set',
        'action' => 'get',
    ],

    'set/delete/{id:\d+}' => [
        'controller' => 'set',
        'action' => 'delete',
    ],

];