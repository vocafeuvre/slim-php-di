<?php

return [
    'name' => 'App Migrations',
    'migrations_namespace' => 'DB\App\Migrations',
    'table_name' => 'app_migrations',
    'column_name' => 'version',
    'migrations_directory' => __DIR__ . '/db/migrations',
    'all_or_nothing' => true
];