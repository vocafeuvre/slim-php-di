<?php

use Doctrine\DBAL\Tools\Console\Helper\ConnectionHelper;
use Doctrine\ORM\Tools\Console\Helper\EntityManagerHelper;
use Doctrine\ORM\EntityManager;
use Symfony\Component\Console\Helper\HelperSet;

// require our already set up app from bootstrap.php
$app = require_once __DIR__ . '/src/bootstrap.php';

// get the entity manager from the app's container
$entityManager = $app->getContainer()->get(EntityManager::class);

return new HelperSet([
    'em' => new EntityManagerHelper($entityManager),
    'db' => new ConnectionHelper($entityManager->getConnection())
]);