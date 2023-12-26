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

];