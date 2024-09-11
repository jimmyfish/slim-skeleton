<?php

use DI\Container;
use Doctrine\ORM\ORMSetup;
use Slim\Factory\AppFactory;
use Doctrine\ORM\EntityManager;
use Doctrine\DBAL\DriverManager;
use App\Repository\Customer\CustomerRepository;
use Symfony\Component\Cache\Adapter\ArrayAdapter;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use App\Repository\Customer\CustomerRepositoryInterface;
use DI\ContainerBuilder;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

$settings = require __DIR__ . '/config/app.php';

$containerBuilder = new ContainerBuilder();

$containerBuilder->addDefinitions([
    EntityManager::class => function () use ($settings) {
        $cache = $settings['doctrine']['dev_mode'] ? new ArrayAdapter() : new FilesystemAdapter(directory: $settings['doctrine']['cache_dir']);
        $config = ORMSetup::createAttributeMetadataConfiguration([__DIR__ . '/src/Entity'], $settings['doctrine']['dev_mode'], null, $cache);
        $connection = DriverManager::getConnection($settings['doctrine']['connection']);

        return  new EntityManager($connection, $config);
    },
    CustomerRepositoryInterface::class => function ($container) {
        return new CustomerRepository($container->get(EntityManager::class));
    }
]);

$container = $containerBuilder->build();

AppFactory::setContainer($container);
$app = AppFactory::create();

// for dependency injection
// $app = \DI\Bridge\Slim\Bridge::create($container);

$app->addRoutingMiddleware();
$app->addErrorMiddleware(true, true, true);

$app->add(function ($request, $handler) {
    $response = $handler->handle($request);

    return $response
        ->withHeader('Access-Control-Allow-Origin', '*')
        ->withHeader('Access-Control-Allow-Headers', 'X-Requested-With, Content-Type, Accept, Origin, Authorization')
        ->withHeader('Access-Control-Allow-Methods', 'GET, POST, PUT, DELETE, PATCH, OPTIONS');
});

require __DIR__ . '/routes/api.php';

return $app;
