<?php
// DIC configuration
use Psr\Container\ContainerInterface;

return [
    // add Monolog as a dependency
    \Monolog\Logger::class => function (ContainerInterface $c){
        $settings = $c->get('settings')['logger'];

        $logger = new Monolog\Logger($settings['name']);
        $logger->pushProcessor(new Monolog\Processor\UidProcessor());
        $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));

        return $logger;
    },

    // add PhpRenderer as a dependency
    \Slim\Views\PhpRenderer::class => function (ContainerInterface $c){
        $settings = $c->get('settings')['renderer'];

        return new Slim\Views\PhpRenderer($settings['template_path']);
    }
];