<?php

use Illuminate\Support\Facades\Route;

Route::get('/users1', function () {

    return [
        1 => 'Pascal',
        2 => 'Johan',
        3 => 'Jane',
    ];
});

Route::get('/users2', function () {

    return [
        'data' => [
            'users' => [
                ['id' => 1, 'name' => 'Pascal'],
                ['id' => 2, 'name' => 'Johan'],
                ['id' => 3, 'name' => 'Jane'],
            ],
        ],
    ];
});
