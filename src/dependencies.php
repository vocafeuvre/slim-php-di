<?php
// DIC configuration
use Psr\Container\ContainerInterface;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\Driver\AnnotationDriver;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Cache\ArrayCache;
use Doctrine\Common\Cache\ApcCache;

use App\Service\AuthService;
use App\Repository\UserRepository;

use App\Transformer\UserTransformer;
use App\Helper\Deserializer;

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
    },

    // add Doctrine 2 as a dependency
    EntityManager::class => function (ContainerInterface $c){
        $isDevMode = $c->get('settings')['doctrine']['dev_mode'];

        // recommended cache to use if in production is ApcCache
        $cache = $isDevMode ? new ArrayCache : new ApcCache;

        $config = Setup::createAnnotationMetadataConfiguration(
            $c->get('settings')['doctrine']['metadata_dirs'],
            $isDevMode
        );

        $config->setMetadataDriverImpl(
            new AnnotationDriver(
                new AnnotationReader,
                $c->get('settings')['doctrine']['metadata_dirs']
            )
        );

        $config->setMetadataCacheImpl($cache);
        $config->setQueryCacheImpl($cache);

        return EntityManager::create(
            $c->get('settings')['doctrine']['connection'],
            $config
        );
    },

    // add our app's own services here
    AuthService::class => function (ContainerInterface $c, UserRepository $repo, UserTransformer $transformer) {
        return new AuthService($repo, $transformer, $c->get('settings')['jwt']['secret']);
    },

    // add our app's repositories here
    UserRepository::class => function (EntityManager $em) {
        return $em->getRepository('App\Entity\User');
    },

    // add our app's helpers here
    Deserializer::class => function (ContainerInterface $c) {
        return new Deserializer();
    },

    // add our app's transformers here
    UserTransformer::class => function (ContainerInterface $c) {
        return new UserTransformer();
    }
];