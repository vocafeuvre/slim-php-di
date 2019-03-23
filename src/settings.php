<?php
return [
    'settings' => [
        'displayErrorDetails' => true, // set to false in production
        'addContentLengthHeader' => false, // Allow the web server to send the content-length header
        'outputBuffering' => 'append',
        'httpVersion' => '1.1',
        'responseChunkSize' => 4096,
        'determineRouteBeforeAppMiddleware' => false,
        'routerCacheFile' => false,

        // Renderer settings
        'renderer' => [
            'template_path' => __DIR__ . '/../templates/',
        ],

        // Monolog settings
        'logger' => [
            'name' => 'slim-app',
            'path' => isset($_ENV['docker']) ? 'php://stdout' : __DIR__ . '/../logs/app.log',
            'level' => \Monolog\Logger::DEBUG,
        ],

        // Doctrine settings
        'doctrine' => [
            'dev_mode' => getenv('APP_MODE') === 'development', // if true, metadata caching is disabled
            'metadata_dirs' => [__DIR__ . '/Api/Models'], // directories which contain annotated entity classes
            'connection' => [
                'driver' => 'pdo_mysql',
                'host' => getenv('DB_HOST'),
                'dbname' => getenv('DB_NAME'),
                'user' => getenv('DB_USERNAME'),
                'password' => getenv('DB_PASSWORD'),
                'port' => getenv('DB_PORT'),
                'charset' => 'utf-8',
            ]
        ]
    ],
];
