<?php

return [
    'lifetime' => [
        'min' => env('LIFETIME_LINK_MIN', 1),
        'max' => env('LIFETIME_LINK_MAX', 1440) // minutes
    ],
    'route_name' => 'tlink-show',
    'token_length' => 8
];
