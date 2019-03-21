<?php

use \DI\ContainerBuilder;

require __DIR__ . '/../vendor/autoload.php';

$app = new class() extends \DI\Bridge\Slim\App { 
    protected function configureContainer(ContainerBuilder $builder){
        // add settings
        $builder->addDefinitions(__DIR__ . '/settings.php');

        // add dependencies
        $builder->addDefinitions(__DIR__ . '/dependencies.php');
    }
};

// add middleware
require __DIR__ . '/middleware.php';

// add routes
require __DIR__ . '/routes.php';

return $app;