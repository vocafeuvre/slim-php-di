<?php
// Application middleware

$jwtSettings = $app->getContainer()->get('settings')['jwt'];

$app->add(new \Tuupola\Middleware\JwtAuthentication([
    'path' => $jwtSettings['path'],
    'ignore' => $jwtSettings['ignore'],
    'secret' => $jwtSettings['secret'],
    'relaxed' => $jwtSettings['relaxed']
]));
